<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CollectionPointsTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     *
     */
    public function testIndexUri()
    {
        $user  = factory(App\User::class)->create();

        $route = $this->actingAs($user);
        $route->visit('/points');
        $route->seeStatusCode(200);
    }

    /**
     *
     */
    public function testInsertUri()
    {

    }

    /**
     *
     */
    public function testInsertViewUri()
    {

    }
}
