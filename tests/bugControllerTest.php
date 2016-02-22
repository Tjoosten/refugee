<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class bugControllerTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @group bug
     * @return void
     */
    public function testBugReportingMethod()
    {
        $user = factory(App\User::class)->create();

        $route = $this->actingAs($user);
        $route->visit('bug');
        $route->seeStatusCode(200);

    }

    public function testBugSendMethod()
    {

    }
}
