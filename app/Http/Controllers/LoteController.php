<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;
use Redirect;
use storage;

class LoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = Lote::all();
        return view('lotes.index')->with('lotes',$lotes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $lote = new Lote();
      $lote->strain_id = $request->strain;
      $lote->code = $request->code;
      $lote->quantity = $request->quantiy;
      $lote->price = $request->price;
      $lote->consumed = 0;
      $lote->status = 1;
      $lote->storage_at = $request->storage;
      $lote->harvested_at = $request->harvest;
      $lote->save();

      if ($request->img) {
          request()->file('img')->storeAs('public/lotes', $lote->id.'.jpg');
      }
      $lote->img = url('/').'/storage/lotes/'.$lote->id.'.jpg';
      $lote->save();


      return Redirect::route('lotes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function show(Lote $lote)
    {
          return view('lotes.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function edit(Lote $lote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lote $lote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lote $lote)
    {
        //
    }
}
