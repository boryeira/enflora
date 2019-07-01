<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use DarkGhostHunter\FlowSdk\Flow;
use App\Models\Order;
use App\Models\Lote as Batch;
use App\Models\OrderItem;
use Auth;

class OrderController extends ApiController
{
    public function index()
    {
        $orders = Auth::user()->orders;

        return $this->showAll($orders);
    }

    public function store(Request $request)
    {
        $total = 0;
        $quantity = 0;
        $order = new Order;
        $order->user_id = Auth::user()->id; 
        $order->status = 2; 
        $order->save();

        foreach($request->items as $item)
        {
            $batch = Batch::find($item['batch_id']);
            $subtotal = $item['quantity']*$batch->price;
            $total = $total + $subtotal; 
            $quantity = $quantity + $item['quantity'];
            $orderItem = new OrderItem;
            $orderItem->lote_id = $batch->id;
            $orderItem->order_id = $order->id;
            $orderItem->quantity = $item['quantity'];
            $orderItem->amount = $subtotal;
            $orderItem->status = 1;
            $orderItem->save();
        }

        $order->amount = $total;
        $order->quantity = $quantity;
        $order->save();



        return response()->json([
            'orderId' => $order->id,
        ]);
    }

    public function show(Order $order)
    {
        return $this->showOne($order);
    }

    public function items(Order $order)
    {
        return $this->showAll($order->items);
    }

    public function payFlow(Order $order)
    {

    //   $flow = Flow::make('production', [
    //           'apiKey'    => '7B19A4CF-F041-40C4-9488-4180L75A6AAA',
    //           'secret'    => '8a8c824cd4550b1ee4d581a1d3404d9d640638b0',
    //       ]);
      $flow = Flow::make('sandbox', [
              'apiKey'    => '367F3C6A-DEB8-46F7-89E5-32CLED2236B9',
              'secret'    => '65d9f9656b478aaa7be72267bc33f40747f47c94',
          ]);

          try {
            $paymentResponse = $flow->payment()->commit([
                'commerceOrder'     => (string)random_int(1000,9000),
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
              return response()->json([
                'error' => $e->getMessage(),
            ]);
          }

        return response()->json([
            'url' => $paymentResponse->getUrl(),
        ]);

    }

}
