<?php

namespace App\Http\Controllers;

use App\Trips;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use League\Fractal\Manager;

class apitripsController extends Controller
{
    public $fractal;

    // TODO: Implement fractal Recsources.
    // TODO: Write API documentation. <- In Progress
    // TODO: Set HTTP staus code's with the symfony package.

    /**
     * Class constructor.
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
     * Input fields:
     *
     * ['user_id']     = The user id reserved for the system.
     * ['region']      = Region where they wil departure.
     * ['destination'] = The destination address  | 2 = Calais & 1 = Duinkerke
     * ['date']        = The data of arrival.
     * ['name']        = The name of the driver.
     * ['email']       = The email address of the driver.
     * ['telephone']   = The telephone number of the driver.
     * ['places']      = The available places in the car(s).
     *
     * @param Request $request
     *
     * @return response
     */
    public function insert(Request $request)
    {
        // MySQL database insert.
        $trip = new Trips();
        $trip->user_id = auth()->gaurd('api')->user()->id;
        $trip->region = $request->region;
        $trip->destination = $request->destination;
        $trip->date = strtotime($request->date); // UNIX timestamp.
        $trip->name = $request->name;
        $trip->email = $request->email;
        $trip->telephone = $request->telephone;
        $trip->places = $request->places;

        if ($trip->save()) {
            $dataArray = [
                'status' => [
                    'code'    => 200,
                    'message' => 'The trip is created.',
                ],
            ];
        } elseif (! $trip->save()) {
            Log::error();

            $dataArray = [
                'status' => [
                    'code'    => 500, // HTTP - Internal Error
                    'message' => 'Trip inserted.',
                ],
            ];
        }

        return response()->json($dataArray)
            ->header('Content-Type', 'application/json', 200);
    }

    /**
     * Delete().
     *
     * This will delete the trip out off the application.
     *
     * @param Request $request
     * @param int $id , The trip id. id = increment id -> Database
     * @return response
     */
    public function delete(Request $request, $id)
    {
        $validator = validator()->make($request->all(), ['id' => 'required']);

        /** @var mixed $validator */
        if ($validator->fails()) {
            $dataArray = [
                'status' => [
                    'code'    => 50,
                    'message' => 'id required',
                ],
            ];

            return response()->json($dataArray)
                ->header('Content-Type', 'application/json', $dataArray['status']['code']);
        }

        $trip = User::find($id);

        if (auth()->gaurd('api')->user()->id != $trip->user_id) {
            $dataArray = [
                'status' => [
                    'code'    => 400,
                    'message' => 'You cannot delete the trips because it is not yours.',
                ],
            ];
        }

        $dataArray = [

        ];

        return response()->json($dataArray)
            ->header('Content-Type', 'application/json', $dataArray['status']['code']);
    }

    /**
     * Update.
     *
     * Update a resource.
     *
     * @param int $tripId , The user id.
     *
     * @return JSON resporns
     */
    public function update(Request $request, $tripId)
    {
        if (auth()->gaurd('api')->user()->id != $trip->user_id) {
            $returnData = [

            ];

            return response()->json($returnData)
                ->header('Content-Type', 'application/json', 200);
        }

        $trip = Trips::find($tripId);
        $trip->region = $request->region;
        $trip->destination = $request->destination;
        $trip->date = strtotime($request->date); // UNIX timestamp.
        $trip->name = $request->name;
        $trip->email = $request->email;
        $trip->telephone = $request->telephone;
        $trip->places = $request->places;
        $trip->save();

        $returnData = [

        ];

        return response()->json($returnData)
            ->header('Content-Type', 'application/json', 200);
    }
}
