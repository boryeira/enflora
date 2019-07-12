<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrderItem;

class OrderItemTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(OrderItem $order_item)
    {
        return [
            'id' => (int)$order_item->id,
            'amount' => (string)'$'.number_format($order_item->amount, 0, ',', '.'),
            'amountRaw' => (int)$order_item->amount,
            'quantity' => (string)$order_item->quantity,
            
            'product' => [
                'name' => (string)$order_item->batch->strain->name,
                'img' =>  (string)$order_item->batch->img,
            ],
            'rels' => [

            ],
        ];
    }
}
