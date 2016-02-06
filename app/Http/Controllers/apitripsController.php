<?php

namespace App\Http\Controllers;

use App\Trips;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class apitripsController extends Controller
{
    // TODO: Implement fractal.
    // TODO: write controller responses.

    /**
     * Class constructor
     */
    public function __construct()
    {
    }

    /**
     * index.
     *
     * The index page for the controller.
     * This will load all the al the trips.
     */
    public function index()
    {
        $user = Trips::all();
    }

    /**
     *
     */
    public function insert()
    {

    }

    /**
     *
     */
    public function delete()
    {

    }

    /**
     * Update
     *
     * Update a resouce.
     *
     * @param int $tripId , The user id.
     *
     * @return JSON resporns
     */
    public function update($tripId)
    {
        $trip = Trips::find($tripId);
        $trip->save();

        $returnData = [];

        return response()->json($returnData)
            ->header('Content-Type', 'application/json', 200);
    }
}
