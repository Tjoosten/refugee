<?php

namespace App\Http\Controllers;

use App\User;
use App\Trips;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

/**
 * Class aclController
 * @package App\Http\Controllers
 */
class aclController extends Controller
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blocked');
    }

    /**
     * profile
     *
     * [NOTE]: This controller will not be used in the first version.
     * get the profile settings for the user.
     *
     * @since  V1.0.0-rc, only configuration.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $data['title'] = 'profile' . Auth::user()->name;
        $data['query'] = Trips::where('user_id', Auth::user()->id)->get();
        $data['tab']   = 3;

        return view('backend.profile', $data);
    }

    /**
     * changeUserCredentialsView
     *
     * Change the credentails view - GET request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changeUserCredentialsView()
    {
        $data['title'] = 'Account - settings' . Auth::user()->name;
        $data['query'] = Trips::where('user_id',Auth::user()->id)->get();
        $data['tab']   = 1;

        return view('backend.profile', $data);
    }

    /**
     * changeCredentails
     *
     * Change the user credentails. - POST request
     *
     * @param Request $request
     * @return Redirect
     */
    public function changeCredentails(userCredentialsValidator $request)
    {
        // username will not be updated. 
        // Bacause we need the real username. 

        $user           = User::find(Auth::user()->id);
        $user->email    = $request->email;

        if (isset($user->password)) {
            $user->password = $request->password;
        }

        $user->save();

        return Redirect::back();
    }

    /**
     * changeApiCredentialsView
     *
     * [REQUEST] - GET
     *
     * the view for the api credential setting.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changeApiCredentialsView()
    {
        $data['title'] = 'Account settings -' . Auth::user()->name;
        $data['query'] = Trips::where('user_id', Auth::user()->id)->get();
        $data['tab']   = 2;

        return view('backend.profile', $data);
    }

    /**
     * changeApiCredentials
     *
     * [REQUEST] - POST
     *
     * generate or re-generate the api token for the user.
     *
     * @internal int, $userId, The user id of the user.
     */
    public function changeApiCredentials()
    {
        $userId = Auth::user()->id;

        $user            = User::find($userId);
        $user->api_token = str_random(60);
        $user->save();

        return Redirect::back();
    }
}
