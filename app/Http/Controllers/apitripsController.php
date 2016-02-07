<?php

namespace App\Http\Controllers;

use App\Trips;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class apitripsController extends Controller
{
    public $fractal; 

    // TODO: Implement fractal Recsources.
    // TODO: Write API documentation.
    // TODO: Set HTTP staus code's with the symfony package.

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->fractal = new Manager();
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

        // $returnData =  Fractal collection resource. 
        //                This also need pagination.

        return response()->json($returnData)
            ->header('Content-Type', 'application/json');
    }

    /**
     * insert()  - POST request.
     *
     * TODO: Load in symfony HTTP Status code library.
     * 
     * @return response() 
     */
    public function insert()
    {
        // MySQL database insert.
        $trip = new Trips(); 

        if ($trip->save()) {
            // Need to write logic
        } elseif (! $trip->save()) {
            Log::error();

            $dataArray = [
                'status' => [
                    'code'    => '',
                    'message' => '',
                ],
            ]; 
        }

        return response()->json($dataArray)
            ->header('Content-Type', 'application/json', 200);
    }

    /**
     * Delete() 
     *
     * This will delete the trip out off the application. 
     *
     * @param  int $id, The trip id. id = increment id -> Database
     * @return responss()
     */
    public function delete($id)
    {
        return response()->json($dataArray)
            ->header('Content-Type', 'application/json', 200);
    }

    /**
     * Update
     *
     * Update a resouce.
     *
     * @param  int $tripId , The user id.
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
