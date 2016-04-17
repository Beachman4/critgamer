<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BaseController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getStaff()
    {
        return view('staff');
    }

    public function getTwitch()
    {
        return view('twitch');
    }
}
