<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = '';

        return view('home');
    }
}
