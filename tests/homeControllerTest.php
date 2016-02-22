<?php


class homeControllerTest extends TestCase
{
    /**
     * Display the index page. - GET.
     */
    public function testHomeUri()
    {
        $route = $this->visit('/');
        $route->seeStatusCode(200);
    }
}
