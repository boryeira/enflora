<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
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

}
