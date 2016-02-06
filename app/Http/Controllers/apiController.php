<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use League\Fractal\Manager;


class apiController extends Controller
{
    public $fractal;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function index()
    {
        $resource = [
            [
                'name'      => 'Solidarity For All - API',
                'developer' => [
                    'name'  => 'Tim Joosten',
                    'email' => 'Topairy@gmail.com'
                ],
                'bugs' => 'https://www.github.com/Tjoosten/Refugee/Bugs',
                'license' => 'MIT'
            ]];

        return response()->json($resource)
            ->header('Content-Type', 'application/json', 200);
    }
}
