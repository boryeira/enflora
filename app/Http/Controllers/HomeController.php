<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
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
        // $lotes = Lote::where('status',1)->get();
        // return view('orders.create')->with('lotes',$lotes);
        return view('orders.create');
      }
    }
    public function form()
    {
        return view('layouts.form');
    }
}
