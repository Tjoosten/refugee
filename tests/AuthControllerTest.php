<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthControllerTest extends TestCase
{
    /**
     * @group authencation
     */
    public function testRegisterView()
    {
        $route = $this->visit('/register');
        $route->seeStatusCode(200);
    }

    /**
     * @group authencation
     */
    public function testRegisterMethod()
    {
        // database seed.
        $user = factory(App\User::class)->create();

        // testing variables.
        $data['name']     = $user->name;
        $data['email']    = $user->email;
        $data['password'] = bcrypt($user->password);
        $data['password_confirmation'] = bcrypt($user->password);

        // test login method.
        $route = $this->post('/register', $data);
        $route->seeStatusCode(302);
        $route->seeInDatabase('users', $user->toArray());
    }

    /**
     * @group authencation
     */
    public function testLoginView()
    {
        $route = $this->visit('/login');
        $route->seeStatusCode(200);
    }

    /**
     * @group authencation
     */
    public function testLoginMethod()
    {
        // Database seed
        $user = factory(App\User::class)->create();

        // testing variables
        $data['name']     = $user->name;
        $data['password'] = $user->password;

        // test login method.
        $url = $this->post('/login', $data);
        $url->seeStatusCode(302);
    }
}
