<?php

namespace App\Http\Controllers\Userpanel;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('userpanel.home');
    }

}
