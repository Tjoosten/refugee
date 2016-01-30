<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class homeControllerTest extends TestCase
{
    public function testHomeUri()
    {
        $this->visit('/')->seeStatusCode(200);
    }
}
