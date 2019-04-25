<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
      if(Auth::guest())
      {
        return view('layouts.home');
      }  else {
        return view('users.dashboard');
      }
    }
    public function form()
    {
        return view('layouts.form');
    }
}
