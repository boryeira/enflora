<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Order;

class OrderTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Order $order)
    {
        return [
            'id' => (int)$order->id,
            'amount' => (string)'$'.number_format($order->amount, 0, ',', '.'),
            'amountRaw' => (int)$order->amount,
            'quantity' => (string)$order->quantity,
            'status' => (string)$order->status[2],
            'delivaryDate' => (string)$order->delivery_date,
            'payDate' => (string)$order->pay_date,
            'createdAt' => (string)$order->created_at,
            'status' => [
                'id' => $order->status[2],
                'color' => $order->status[1],
                'text' => $order->status[0],
            ],
            'rels' => [
                'self' => [
                    'href' => route('api.orders.show',['order'=>$order->id]),
                ],
                'owner' => [
                    'id' => (int)$order->user_id,
                ],
                'orderItems' => [
                    'href' => route('api.orders.items',['order'=>$order->id]),
                ],

            ],
        ];
    }
}
