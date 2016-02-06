<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserManagementTest extends TestCase
{
    /**
     * @group acl
     *
     * Test the redirect route if the user,
     * Has the wrong permissions.
     *
     * 1 = block
     * 0 = unblock
     */
    public function testBlockHandling()
    {
        $userInfo = factory(App\User::class)->create([
            'status' => 0
        ]);

        $route = $this->actingAs($userInfo);
        $route->visit('/acl/block/1/' . $userInfo->id);
        $route->seeStatusCode(200);
    }

    /**
     * @group acl
     *
     * Test the redirect route if the user,
     * Has the worng permission.
     *
     * 1 = block
     * 0 = unblock
     */
    public function testUnblockHandling()
    {

    }
}
