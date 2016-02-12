<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class homeControllerTest extends TestCase
{
    /**
     * Display the index page. - GET
     */
    public function testHomeUri()
    {
        $route = $this->visit('/');
        $route->seeStatusCode(200);
    }
}
