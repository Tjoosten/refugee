<?php

namespace App\Http\Controllers;

use App\Http\Requests\githubValidator;
use Github\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/**
 * Class bugController
 * @package App\Http\Controllers
 */
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
     * @param githubValidator $input
     */
    public function send(githubValidator $input)
    {
        $client = new Client();
        $client->authenticate('Tjoosten', '0474834880Tim!', $client::AUTH_HTTP_PASSWORD);

        $client->api('issue')->create('Tjoosten', 'Refugee', [
            'title' => $input->title,
            'body'  => $input->body,
        ]);

        // Success: Error created.
        session()->flash('flash_title', 'Bedankt.');
        session()->flash('flash_message', 'Wij hebben je melding geregistreerd.');
        session()->flash('flash_message_important', true);

        return Redirect::back();
    }
}
