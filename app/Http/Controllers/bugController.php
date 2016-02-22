<?php

namespace App\Http\Controllers;

use Github\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class bugController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blocked');
    }

    /**
     * view().
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
     * send().
     *
     * Send the bug report to github.
     * And store the user email privately.
     * To add later the function to email the user if the bug is closed.
     *
     * @param Request $input
     */
    public function send(Request $input)
    {
        $client = new Client();
        $client->authenticate('Tjoosten', '0474834880Tim!', $client::AUTH_HTTP_PASSWORD);

        if (isset($input->body) || isset($input->title)) {
            $client->api('issue')->create('Tjoosten', 'Refugee', [
                'title' => $input->title,
                'body'  => $input->body,
            ]);

            // Success: Error created.
            session()->flash('flash_title', 'Bedankt.');
            session()->flash('flash_message', 'Wij hebben je melding geregistreerd.');
            session()->flash('flash_message_important', true);
        } else {
            // Error: Issue not created
            session()->flash('flash_title', 'Oh Snapp :(');
            session()->flash('flash_message', 'Wij konden je melding niet registreren.');
            session()->flash('flash_message_important', true);
        }

        return Redirect::back();
    }
}
