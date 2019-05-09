<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lote;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Redirect;


class OrderController extends Controller
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
      if(Auth::user()->role_id == 1) {
        $orders =  Order::all();
        return view('orders.index')->with('orders',$orders);
      } else {
        $oldOrders =  Auth::user()->oldOrders;
        $activeOrder = Auth::user()->activeOrder;
        return view('orders.my')->with('oldOrders',$oldOrders)->with('activeOrder',$activeOrder);
      }
    }

    // public function myOrders()
    // {
    //   $orders =  Order::where('user_id',Auth::user()->id);
    //   //return view()
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if((Auth::user()->activeOrder)&&(Auth::user()->role_id != 1)){
        return Redirect::back()->withErrors(array('activeOrder' => 'Ya tienes una orden activa.'));
      } else {
        return view('orders.create');
      }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $items = $request->all();
      unset($items['_token']);
      if((array_sum($items)>30)||(array_sum($items)<10) ) {
        return Redirect::back()->withErrors(array('quantity' => 'La orden debe ser mayor o igual a 10g y menor a 30g.'));
      }
      if(Auth::user()->role==1)
      {
        $user = Auth::user();
      } else {
        $user = Auth::user();
      }

      $order = new Order;
      $order->user_id = $user->id;
      $order->quantity = array_sum($items);
      $order->save();

      foreach ($items as $key => $item) {
        $lote = Lote::where('code',$key)->get();
        $item = new OrderItem;
        $item->order_id = $order->id;
        $item->lote_id = $key;
        $item->quantity = $item;
        $item->amount = $lote->price*$item;
        $item->status = 1;
        $item->save();
      }

      $order->amount = $order->items->sum('amount');
      if($order->save()) {

      } else {
        return Redirect::back()->withErrors(array('db' => 'error en base de datos'));
      }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
