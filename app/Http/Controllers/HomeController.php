<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $template='home.home';
        return view('dashboard.index',compact('template'));
    }
}
