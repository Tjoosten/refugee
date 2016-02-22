<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTripsControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * Parent constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Test if the user can insert a trip trough the API.
     *
     * Link: [POST]
     */
    public function testInsert()
    {
    }

    public function testUpdate()
    {
    }

    public function testDelete()
    {
        $trip = factory(App\Trips::class)->create();
        $user = factory(App\User::class)->create();

        $uri = '/api/trips/'.$trip->id.'?api_token='.$user->api_token;

        $route = $this->delete($uri);
        $route->seeStatusCode(200);
    }

    public function testDeleteNonExistingParam()
    {
        $user = factory(App\User::class)->create();

        $route = $this->actingAs($user);
        $route->delete('/api/trips/710111?api_token='.$user->api_token);
        $route->seeStatusCode(200);
        $route->seeJsonEquals([
            'status' => [
                'code'    => 50,
                'message' => 'id required',
            ], ]);
    }

    public function testShowSpecific()
    {
    }

    public function testShowAll()
    {
        $route = $this->visit('');
        $route->seeStatusCode(200);
        // $route->seeJson();
    }
}
