<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\OrderItemTransformer;

class OrderItem extends Model
{
  public $transformer = OrderItemTransformer::class;
  public function lote()
  {
      return $this->belongsTo('App\Models\Lote');
  }
  public function order()
  {
      return $this->belongsTo('App\Models\Order');
  }
}
