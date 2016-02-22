<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class tripsControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testUriCalais()
    {
        factory(App\Trips::class)->make();
        $this->visit('trips/calais')->seeStatusCode(200);

    }

    public function testUriAll()
    {
        factory(App\Trips::class)->make();
        $this->visit('trips/all')->seeStatusCode(200);
    }

    public function testUriDuinkerke()
    {
        factory(App\Trips::class, 6)->make();
        $this->visit('trips/duinkerke')->seeStatusCode(200);
    }
}
