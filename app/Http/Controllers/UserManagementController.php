<?php

namespace App\Http\Controllers;

use App\Sessions;
use App\user;
use Bouncer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserManagementController extends Controller
{
    // TODO: set permission check to middleware.

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blocked');
    }

    /**
     * makeAdmin.
     *
     * @param int, $id the id of the user.
     *
     * @return Redirect
     */
    public function makeAdmin($id)
    {
        if (! Auth::user()->is('admin') || Auth::user()->is('developer')) {
            return Redirect::route('trips.index', ['Selector' => 'all']);
        }

        $user = User::find($id);
        Bouncer::assign('admin')->to($user);
        Bouncer::refreshFor($user);

        session()->flash('flash_title', 'success');
        session()->flash('flash_message', 'U hebt een gebruiker admin rechten gegeven');
        session()->flash('flash_message_important', false);

        return Redirect::route('acl');
    }

    /**
     * makeUser.
     *
     * @param $id
     *
     * @return
     */
    public function makeUser($id)
    {
        if (! Auth::user()->is('admin') || Auth::user()->is('developer')) {
            return Redirect::route('trips.index', ['selector' => 'all']);
        }

        $user = User::find($id);
        Bouncer::retract('admin')->from($user);
        Bouncer::refreshFor($user);

        // Flash method
        session()->flash('flash_title', 'Success!!');
        session()->flash('flash_message', 'U hebt een gebruiker, gebruikers permissies gegeven.');
        session()->flash('flash_message_important', true);

        return Redirect::route('acl');
    }

    /**
     * userList.
     *
     * TODO: set pagination to the view.
     *
     * Get the user list of the system.
     */
    public function userList()
    {
        if (! Auth::user()->is('admin') || Auth::user()->is('developer')) {
            return Redirect::route('trips.index', ['selector' => 'all']);
        }

        $data['title'] = trans('sfa.titleUserControl');
        $data['users'] = User::paginate(15);

        // User count.
        $data['all'] = count(User::all());
        $data['active'] = count(User::where('status', 0)->get());
        $data['blocked'] = count(User::where('status', 1)->get());

        return view('backend.userControl', $data);
    }

    /**
     * BlockControl.
     *
     * Block or unblock the user out off the system.
     * Preventing them to login into the system.
     *
     * @param int $status, The status code. 1 = Block | 0 = Unblock.
     * @param int $id      ,     The id off the user.
     */
    public function blockControl($status, $id)
    {
        if (! Auth::user()->is('admin') || Auth::user()->is('developer') || Auth::user()->is('moderator')) {
            return Redirect::route('trips.index', ['selector' => 'all']);
        }

        $user = user::find($id);
        $user->status = $status;
        $user->save();

        $sessionQuery = Sessions::where('user_id', $id)->get();

        if (count($sessionQuery) == 1 && $status == 1) {
            Sessions::where('user_id', $id)->delete();
        }

        // Set flash message data.
        // Displayed when u block a user
        if ($status == 0) {
            // unblock
            $message = 'U hebt een gebruiker terug geactiveerd';
        } elseif ($status == 1) {
            // block
            $message = 'U hebt een gebruiker geblokkeerd';
        } else {
            // unknown
            $message = 'wij konden niet uitmaken welke handeling u wou uitvoeren.';
        }

        session()->flash('flash_title', 'Success!');
        session()->flash('flash_message', $message);
        session()->flash('flash_message_important', '');

        return Redirect::back();
    }

    /**
     * userDelete.
     *
     * Softdelete the user. So he have time to come back.
     *
     * @param int $userId, the id of the user.
     */
    public function deleteUser($userId)
    {
        // User can be a developer or admin.
        if (! Auth::user()->is('admin') || Auth::user()->is('developer')) {
            return Redirect::route('trips.index', ['selector' => 'all']);
        }

        $user = User::find($userId);
        $user->delete();

        session()->flash('flash_title', 'sucess!');
        session()->flash('flash_message', 'U hebt een gebruiker geblokkeerd');
        session()->flash('flash_message_important', false);

        return Redirect::route('trips.index');
    }
}
