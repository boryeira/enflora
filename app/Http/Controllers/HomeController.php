<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use Auth;
use Redirect;

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
      if(Auth::guest()) {
        return view('layouts.home');
      }  else {
        return redirect()->route('orders.index');
      }

    }

    public function form()
    {
        return view('layouts.form');
    }
}
