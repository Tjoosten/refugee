<?php

namespace App\Http\Controllers;

use App\Trips;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\tripValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\intrestValidation;

class tripController extends Controller
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
        $this->middleware('blocked');
    }

    /**
     * index
     *
     * Get an overview off the trips. To the refugee camps.
     *
     * @param  null $selector
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($selector = null)
    {
        $data['title'] = "";

        // Trips counts
        $data['all'] = Trips::paginate(15);
        $data['calais'] = Trips::where('destination', 1)->get();
        $data['duinkerke'] = Trips::where('destination', 2)->get();

        // Data selection
        if ($selector == 'calais') {
            $data['query'] = $data['calais'];
        } elseif ($selector == 'duinkerke') {
            $data['query'] = $data['duinkerke'];
        } else {
            $data['query'] = $data['all'];
        }

        return view('frontend.trips', $data);
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
        $data = array_add($request->except('_token'), 'user_id', Auth::user()->id);
        Trips::create($data);

        session()->flash('flash_title', '');
        session()->flash('flash_message', '');
        session()->flash('flash_message_important', false);

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
     * @param intrestValidation $request
     * @param int $tripId , The id of the trip.
     */
    public function intrested(intrestValidation $request, $tripId)
    {
        $trip = Trips::findOrfail($tripId);
        $data = $request->all();

        // Mail trip owner
        Mail::queue('emails.intrested_owner', $data, function($message) use ($trip) {
            $message->from('topairy@gmail.com', 'Solidarity for all - TRIPS');
            $message->subject('Iemand heeft intresse om mee te rijden.');
            $message->to($trip->email);
        });

        // Mail intrested person.
        // Mail::queue('emails.intrested_person', $data, function($message) use ($request) {
        //    $message->from('topairy@gmail.com', 'Solidarity for all - TRIPS');
        //    $message->to($request->email);
        // });

        // Set flash message
        session()->flash('flash_title', 'Success!');
        session()->flash('flash_message', 'We hebben de eigenaar een berichtt gestuurd. hij zal spoedig contact met je opnemen');
        session()->flash('flash_message_important', true);

        return Redirect::back();
    }
}
