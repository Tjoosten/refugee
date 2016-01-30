<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\tripValidation;

class tripController extends Controller
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index controller.
     */
    public function index()
    {

    }

    /**
     * Insert
     *
     * Insert a new trip into the system.
     *
     * @param Requests\tripValidation $request
     */
    public function insert(tripValidation $request)
    {

    }
}
