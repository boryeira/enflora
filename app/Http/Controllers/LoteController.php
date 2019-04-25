<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;
use Redirect;

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
      $lote->consumed = 0;
      $lote->status = 1;
      $lote->storage_at = $request->date;
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
