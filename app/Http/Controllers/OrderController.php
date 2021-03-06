<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DarkGhostHunter\FlowSdk\Flow;
use App\Models\User;
use App\Models\Batch;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\Orders\OrderPay;
use App\Mail\Welcome;
use Auth;
use Redirect;
use Exception;
use Session;
use Mail;



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

        $oldOrders =  Auth::user()->oldOrders;
        $activeOrder = Auth::user()->activeOrder;
        return view('orders.my')->with('oldOrders',$oldOrders)->with('activeOrder',$activeOrder);

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
      if((array_sum($items)>30)||(array_sum($items)<=0)) {
        return Redirect::back()->withErrors(array('quantity' => 'La orden debe ser igual o menor a 30g.'));
      }
      if(Auth::user()->role_id==1)
      {
        $user = User::find($request->user);
        unset($items['user']);
      } else {
        $user = Auth::user();
        if((array_sum($items)>30)||(array_sum($items)<5) ) {
          return Redirect::back()->withErrors(array('quantity' => 'La orden debe ser mayor o igual a 5g y menor a 30g.'));
        }
      }

      $order = new Order;
      $order->user_id = $user->id;
      $order->quantity = array_sum($items);
      $order->status = 2;
      $order->save();

      foreach ($items as $key => $q) {
        if($q>0)
        {
          $batch = Batch::where('code',$key)->first();
          $item = new OrderItem;
          $item->order_id = $order->id;
          $item->batch_id = $batch->id;
          $item->quantity = $q;
          $item->amount = $batch->price*$q;
          $item->status = 1;
          $item->save();
          $batch->consumed = $batch->consumed + $q;
          $diference = $batch->quantity - $batch->consumed;
          if(($diference<=10) && ($batch->extract!=1))
          {
            $batch->status = 2;
          }
          $batch->save();
        }
      }

      $order->amount = $order->items->sum('amount');
      if($order->save()) {
        if(Auth::user()->role_id==1)
        {
          return Redirect::route('orders.index');
        }
        //return Redirect::route('orders.index');

      } else {
        return Redirect::back()->withErrors(array('db' => 'error en base de datos'));
      }
      return Redirect::route('orders.index');
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
      foreach ($order->items as  $item) {
        $batch = $item->batch;
        $batch->consumed = $batch->consumed - $item->quantity;
        $batch->save();
        $item->delete();
      }
        $order->delete();
        Session::flash('success','Orden eliminada con Éxito');

        return redirect::back();
    }


    public function status(Order $order, Request $request)
    {
        $status = $request->stage;
        if($status != ''){
          $order->status = $status;
          if($status==3){
            $order->pay_date = now();
          }
          if($status==4){
            $order->delivery_date = now();
          }
          $order->save();
          return redirect::back();
        }
        return redirect::back();

    }


    //todo pago flow
    public function payFlow(Order $order)
    {

      $flow = Flow::make('production', [
              'apiKey'    => '7B19A4CF-F041-40C4-9488-4180L75A6AAA',
              'secret'    => '8a8c824cd4550b1ee4d581a1d3404d9d640638b0',
          ]);
      // $flow = Flow::make('sandbox', [
      //         'apiKey'    => '367F3C6A-DEB8-46F7-89E5-32CLED2236B9',
      //         'secret'    => '65d9f9656b478aaa7be72267bc33f40747f47c94',
      //     ]);

          try {
            $paymentResponse = $flow->payment()->commit([
                'commerceOrder'     => $order->id,
                'subject'           => 'Membresía',
                'amount'            => $order->amount,
                'email'             => $order->user->email,
                'urlConfirmation'   => url('/').'/flow/confirm',
                'urlReturn'         => url('/').'/flow/return',
                'optional'          => [
                    'Message' => 'Tu orden esta en proceso!'
                ]
            ]);
          }
          catch ( Exception $e) {
              //return $e->getMessage();
              return Redirect::back()->withErrors(array('flow' => $e->getMessage()));
          }


        //  dd($paymentResponse->getUrl());
      return Redirect::to($paymentResponse->getUrl());
    }

    public function returnFlow(Request $request)
    {
      // $flow = Flow::make('sandbox', [
      //         'apiKey'    => '367F3C6A-DEB8-46F7-89E5-32CLED2236B9',
      //         'secret'    => '65d9f9656b478aaa7be72267bc33f40747f47c94',
      //     ]);
      $flow = Flow::make('production', [
              'apiKey'    => '7B19A4CF-F041-40C4-9488-4180L75A6AAA',
              'secret'    => '8a8c824cd4550b1ee4d581a1d3404d9d640638b0',
          ]);

      $payment = $flow->payment()->get($request->token);

      $paymentData = $payment->paymentData;
      $order = Order::find($payment->commerceOrder);

      if($paymentData['date']==null){
        return Redirect::route('orders.index')->withErrors(array('flow' =>'no se realizo el pago'));
      } else {
        $order->status = 3;
        $order->pay_date = $paymentData['date'];
        $order->save();
        Session::flash('success','Pago realizado con éxito - fecha '.$paymentData['date']);
        return Redirect::route('orders.index');
      }
      return Redirect::route('orders.index');

    }

    public function confirmFlow(Request $request)
    {
      
      // $flow = Flow::make('sandbox', [
      //         'apiKey'    => '367F3C6A-DEB8-46F7-89E5-32CLED2236B9',
      //         'secret'    => '65d9f9656b478aaa7be72267bc33f40747f47c94',
      //     ]);
      $flow = Flow::make('production', [
              'apiKey'    => '7B19A4CF-F041-40C4-9488-4180L75A6AAA',
              'secret'    => '8a8c824cd4550b1ee4d581a1d3404d9d640638b0',
          ]);

      $payment = $flow->payment()->get($request->token);

      $paymentData = $payment->paymentData;
      $order = Order::find($payment->commerceOrder);

      if($paymentData['date']==null){
        return Redirect::route('orders.index')->withErrors(array('flow' =>'no se realizo el pago'));
      } else {
        if($order->status==2){
          $order->status = 3;
          $order->pay_date = $paymentData['date'];
          $order->save();
        }

       
        return 'ok';
      }
      return 'ok';

    }

    // public function mail()
    // {
    //   $user = User::find(2);
    //   Mail::to($user)->send(new Welcome($user));
    //   return 'mail welcome';
    // }


}
