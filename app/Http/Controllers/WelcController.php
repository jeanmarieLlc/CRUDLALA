<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcController extends Controller
{
    public function index_home(){
        return view('welc');
    }
}
