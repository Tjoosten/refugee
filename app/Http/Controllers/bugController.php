<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class bugController extends Controller
{
    // TODO: Knplabs - GITHUB API implementation.

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blocked');
    }

    /**
     * view()
     *
     * Display the bug reporting form.
     * Here users can reports several bugs in the platform.
     */
    public function view()
    {
        $data['title'] = trans('');

        return view('backend.bugReport', $data);
    }

    /**
     * send()
     *
     * Send the bug report to github.
     * And store the user email privately.
     * To add later the function to email the user if the bug is closed.
     */
    public function send()
    {

    }
}
