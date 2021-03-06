<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\intrestValidation;
use App\Http\Requests\tripValidation;
use App\Trips;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class tripController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
        $this->middleware('blocked');
    }

    /**
     * index.
     *
     * Get an overview off the trips. To the refugee camps.
     *
     * @param null $selector
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($selector = null)
    {
        $data['title'] = trans();

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
     * Insert.
     *
     * Insert a new trip into the system.
     *
     * @param Requests\tripValidation $request
     */
    public function insert(tripValidation $request)
    {
        $data = array_add($request->except('_token'), 'user_id', Auth::user()->id);

        // Mass assignement. the field names in the forms are equal to the database columns.
        Trips::create($data);

        session()->flash('flash_title', 'Success!');
        session()->flash('flash_message', 'U heeft een rit ingevoegd.');
        session()->flash('flash_message_important', false);

        return Redirect::back();
    }

    /**
     * Delete.
     *
     * Delete a user out of the system.
     * REQUIRED method = softDeletes()
     *
     * @param int $id, The id of the trip.
     */
    public function delete($id)
    {
        $trip = Trips::find($id);

        if (Auth::user()->id != $trip->user_id || Auth::user()->is('admin') || Auth::user()->is('developer')) {
            return Redirect::back();
        }

        Trips::destroy($id);

        session()->flash('flash_title', 'U hebt iets verwijderd!');
        session()->flash('flash_message', 'De rit is verwijderd.');
        session()->flash('flash_message_important', true);

        return Redirect::back();
    }

    /**
     * interested.
     *
     * @param intrestValidation $request
     * @param int               $tripId  , The id of the trip.
     */
    public function intrested(intrestValidation $request, $tripId)
    {
        $trip = Trips::findOrfail($tripId);
        $data = $request->all();

        // Mail trip owner
        Mail::queue('emails.intrested_owner', $data, function ($message) use ($trip) {
            $message->from('topairy@gmail.com', 'Solidarity for all - TRIPS');
            $message->subject('Iemand heeft intresse om mee te rijden.');
            $message->to($trip->email);
        });

        // TODO: Debug the commented code.
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
