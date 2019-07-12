<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Redirect;
use Storage;
use Image;
use File;

class BatchController extends Controller
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
        $batches = Batch::orderBy('created_at', 'desc')->get();
        return view('batches.index')->with('batches',$batches);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('batches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $batch = new Batch();
      $batch->strain_id = $request->strain;
      $batch->code = $request->code;
      $batch->quantity = $request->quantity;
      $batch->price = $request->price;
      $batch->consumed = 0;
      $batch->status = 1;
      $batch->storage_at = $request->storage;
      $batch->harvested_at = $request->harvest;
      $batch->save();

      if ($request->img) {
        $resize = Image::make($request->img)->fit(680, 450)->encode('jpg');

        //$image->storeAs('public/batches', $batch->id.'.jpg');

        $storage = Storage::put('public/lotes/'.$batch->id.'.jpg', $resize);
        $batch->img = url('/').'/storage/lotes/'.$batch->id.'.jpg';
      } else {
        $batch->img = url('/').'/public/img/lote.jpg';
      }


      
      $batch->save();


      return Redirect::route('Batch.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
          return view('batches.show')->with('batch',$batch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        return view('batches.edit')->with('batch',$batch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        
        $batch->strain_id = $request->strain;
        $batch->code = $request->code;
        $batch->quantity = $request->quantity;
        $batch->price = $request->price;
        $batch->storage_at = $request->storage;
        $batch->harvested_at = $request->harvest;
        $batch->save();
  
        if ($request->img) {
          $resize = Image::make($request->img)->fit(680, 450)->encode('jpg');
  
          //$image->storeAs('public/batches', $batch->id.'.jpg');
          //File::delete('public/batches/'.$batch->id.'.jpg');
          $storage = Storage::put('/public/lotes/'.$batch->id.'.jpg', $resize);
          $batch->img = url('/').'/storage/lotes/'.$batch->id.'.jpg';
          $batch->save();
        } 


        return view('batches.show')->with('batch',$batch);
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        //
    }
}
