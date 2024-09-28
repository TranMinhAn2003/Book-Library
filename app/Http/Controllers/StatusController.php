<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $books=Borrow::with('user','book','book.author')->paginate(20);
        $template='status.index';
        return view('dashboard.index',compact('template','books'));
    }
}
