<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function __construct()
    {
        parent::__construct();
    }

    public function testProfileTrips()
    {
        $user = factory(App\User::class)->create();

        $route = $this->actingAs($user);
        $route->visit('/profile');
        $route->seeStatusCode(200);
    }

    public function testProfileSettingsAccount()
    {
        $user = factory(App\User::class)->create();

        $route = $this->actingAs($user);
        $route->visit('/profile/edit');
        $route->seeStatusCode(200);
    }

    public function testProfileSettingsApi()
    {
        $user = factory(App\User::class)->create();

        $route = $this->actingAs($user);
        $route->visit('/profile/edit/api');
        $route->seeStatusCode(200);
    }
}
