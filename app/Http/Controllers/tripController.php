<?php

namespace App\Http\Controllers;

use App\Trips;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\tripValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class tripController extends Controller
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * index
     *
     * Get an overview off the trips. To the refugee camps.
     */
    public function index()
    {
        $data['title'] = "";

        // Trips counts
        $data['all']       = Trips::paginate(15);
        $data['calais']    = Trips::where('destination', 1)->get();
        $data['duinkerke'] = Trips::where('destination', 2)->get();

        // Data selection
        $data['query'] = Trips::all();

        return view('frontend.trips', $data);
    }

    /**
     * Insert
     *
     * Insert a new trip into the system.
     *
     * TODO: Set flash message.
     *
     * @param Requests\tripValidation $request
     */
    public function insert(tripValidation $request)
    {
        $data = array_add($request->except('_token'), 'user_id', Auth::user()->id);
        Trips::create($data);

        return Redirect::back();
    }

    /**
     * Delete
     *
     * @param int $id, The id of the trip.
     */
    public function delete($id)
    {
        Trips::destroy($id);

        session()->flash('flash_title', 'U hebt iets verwijderd!');
        session()->flash('flash_message', 'De rit is verwijderd.');
        session()->flash('flash_message_important', true);

        return Redirect::back();
    }

    /**
     * intrested
     *
     * @param int $tripId, The id of the trip.
     */
    public function intrested($tripId)
    {
        // TODO: write mail logic.
    }
}
