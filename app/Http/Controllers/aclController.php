<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class aclController extends Controller
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * changeCredentails
     *
     * Change the user credentails.
     *
     * @param Request $request
     * @param int $id ,   The user his id in the system.
     * @return
     */
    public function changeCredentails(Request $request, $id)
    {
        $user           = User::find($id);
        $user->email    = $request->email;
        $user->password = $request->password;
        $user->save();

        return Redirect::back();
    }
}
