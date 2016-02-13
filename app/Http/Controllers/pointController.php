<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class pointController extends Controller
{
    public function index()
    {
        $data['title'] = '';

        return view('backend.point', $data);
    }
}
