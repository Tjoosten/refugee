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
        $this->visit('/register')->seeStatusCode(200);
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
        $this->post('/register', $data)
            ->seeStatusCode(302)
            ->seeInDatabase('users', $user->toArray());
    }

    /**
     * @group authencation
     */
    public function testLoginView()
    {
        $this->visit('/login')->seeStatusCode(200);
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
        $this->post('/login', $data)->seeStatusCode(302);
    }
}
