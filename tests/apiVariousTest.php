<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class apiVariousTest extends TestCase
{
    /**
     * @group api
     */
    public function testApiHome()
    {
        $user = factory(App\User::class)->create();

        $this->visit('/api?api_token='. $user->api_token)
            ->seeStatusCode(200)
            ->seeJson([
                'license' => 'MIT',
                'name'    => 'Solidarity For All - API',
                'developer' => [
                    'email'   => 'Topairy@gmail.com',
                    'name'    => 'Tim Joosten'
                ],
            ]);
    }
}
