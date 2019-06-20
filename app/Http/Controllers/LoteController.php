<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Redirect;
use Storage;
use Image;
use File;

class LoteController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = Lote::orderBy('created_at', 'desc')->get();
        return view('lotes.index')->with('lotes',$lotes);
    }
    public function batches()
    {
      $lotes = Lote::all();
      $batches = $lotes->toArray();
      return response()->json($batches);
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
      $lote->quantity = $request->quantity;
      $lote->price = $request->price;
      $lote->consumed = 0;
      $lote->status = 1;
      $lote->storage_at = $request->storage;
      $lote->harvested_at = $request->harvest;
      $lote->save();

      if ($request->img) {
        $resize = Image::make($request->img)->fit(680, 450)->encode('jpg');

        //$image->storeAs('public/lotes', $lote->id.'.jpg');

        $storage = Storage::put('public/lotes/'.$lote->id.'.jpg', $resize);
        $lote->img = url('/').'/storage/lotes/'.$lote->id.'.jpg';
      } else {
        $lote->img = url('/').'/public/img/lote.jpg';
      }


      
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
          return view('lotes.show')->with('lote',$lote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function edit(Lote $lote)
    {
        return view('lotes.edit')->with('lote',$lote);
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
        
        $lote->strain_id = $request->strain;
        $lote->code = $request->code;
        $lote->quantity = $request->quantity;
        $lote->price = $request->price;
        $lote->storage_at = $request->storage;
        $lote->harvested_at = $request->harvest;
        $lote->save();
  
        if ($request->img) {
          $resize = Image::make($request->img)->fit(680, 450)->encode('jpg');
  
          //$image->storeAs('public/lotes', $lote->id.'.jpg');
          //File::delete('public/lotes/'.$lote->id.'.jpg');
          $storage = Storage::put('public/lotes/'.$lote->id.'.jpg', $resize);
          $lote->img = url('/').'/storage/lotes/'.$lote->id.'.jpg';
          $lote->save();
        } 


        return view('lotes.show')->with('lote',$lote);
  
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
