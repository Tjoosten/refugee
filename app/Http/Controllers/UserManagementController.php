<?php

namespace App\Http\Controllers;

use App\user;
use App\Sessions;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserManagementController extends Controller
{
    // TODO: Make middleware that checks if the user is blocked.
    //       This needs to be set on every request.
    //       If blocked the middleware needs to be redirect to a page
    //       That displays information and possible reasons.

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * userList
     *
     * Get the user list of the system.
     */
    public function userList()
    {
        $data['title'] = trans('sfa.titleUserControl');
        $data['users'] = User::paginate(15);

        // User count.
        $data['all']     = count(User::all());
        $data['active']  = count(User::where('status', 0)->get());
        $data['blocked'] = count(User::where('status', 1)->get());

        return view('backend.userControl', $data);
    }

    /**
     * BlockControl
     *
     * Block or unblock the user out off the system.
     * Preventing them to login into the system.
     *
     * @param int $status,  The status code. 1 = Block | 0 = Unblock.
     * @param int $id ,     The id off the user.
     */
    public function blockControl($status, $id)
    {
        $user         = user::find($id);
        $user->status = $status;
        $user->save();

        $sessionQuery = Sessions::where('user_id', $id)->get();

        if (count($sessionQuery) == 1 && $status == 1) {
            Sessions::where('user_id', $id)->delete();
        }

        // Set flash message data.
        // Displayed when u block a user
        if () {

        } elseif() {

        }

        session()->flash('', '');
        session()->flash('', '');

        return Redirect::back();
    }

    /**
     * banMessage
     *
     * The view with the error message if a user is banned.
     */
    public function banMessage()
    {
        $data['title'] = 'Banned!';

        return view('errors.blocked');
    }

    /**
     * userDelete
     *
     * Softdelete the user. So he have time to come back.
     *
     * @param $userId
     */
    public function deleteUser($userId)
    {

    }
}
