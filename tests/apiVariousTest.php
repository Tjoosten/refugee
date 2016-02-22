<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class apiVariousTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @group api
     */
    public function testApiHome()
    {
        $user = factory(App\User::class)->create();

        $this->visit('/api?api_token='.$user->api_token)
            ->seeStatusCode(200)
            ->seeJson([
                'license'   => 'MIT',
                'name'      => 'Solidarity For All - API',
                'developer' => [
                    'email'   => 'Topairy@gmail.com',
                    'name'    => 'Tim Joosten',
                ],
            ]);
    }

    /**
     * API Documentation.
     *
     * @group api
     *
     * @link  GET - api/docs/trips
     */
    public function testApiDocsIndex()
    {
        $user = factory(App\User::class)->create();

        $route = $this->actingAs($user);
        $route->visit('/api/docs');
        $route->seeStatusCode(200);
    }

    /**
     * API Documentation.
     *
     * @group api
     *
     * @link  GET - api/docs
     */
    public function testApiDocsTrips()
    {
        $user = factory(App\User::class)->create();

        $route = $this->actingAs($user);
        $route->visit('/api/docs/trips');
        $route->seeStatusCode(200);
    }
}
