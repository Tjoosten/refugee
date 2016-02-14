<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserManagementTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * UserManagementTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Test the redirect if a user is blocked.
     *
     * @group acl
     */
    public function testBlockedMiddleware()
    {
        $user = factory(App\User::class)->create(['status' => 1]);

        $route = $this->actingAs($user);
        $route->visit('/profile');
        $route->seeStatusCode(200);
    }

    /**
     * @group acl
     *
     * Test the redirect route if the user,
     * - Has the wrong permissions.
     *
     * 1 = block
     * 0 = unblock
     */
    public function testBlockHandlingIncorrectUser()
    {
        $user = factory(App\User::class)->create(['status' => 0]);

        $route = $this->actingAs($user);
        $route->seeInDatabase('users', ['id' => $user->id, 'status' => $user->status]);
        $route->visit('/acl/block/1/' . $user->id);
        $route->seeStatusCode(200);
    }

    /**
     * @group acl
     *
     * Test the block feature off a user.
     * - Has the correct permission.
     *
     * 1 = Block
     * 0 = Unblock
     */
    public function testBlockHandlingCorrectUser()
    {
        $user = factory(App\User::class)->create();
        Bouncer::assign('admin')->to($user);

        $route = $this->actingAs($user);
        $route->visit('/acl/block/1/' . $user->id);
        $route->seeStatusCode(200);
        $route->seeInDatabase('users', ['id' => $user->id, 'status' => 1]);
    }

    /**
     * @group acl
     *
     * Test the redirect route if the user,
     * - Has the wrong permission.
     *
     * 1 = block
     * 0 = unblock
     */
    public function testUnblockHandlingIncorrectUser()
    {
        $user = factory(App\User::class)->create(['status' => 1]);

        $route = $this->actingAs($user);
        $route->visit('/acl/block/0/' . $user->id);
        $route->seeStatusCode(200);
    }

    /**
     * @group acl
     *
     * Test if the user can unblock a user.
     * - Has the incorrect permission.
     *
     * 1 = block
     * 0 = unblock
     */
    public function testUnblockHandlingCorrectUser()
    {

    }
}
