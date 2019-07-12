<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\OrderItemTransformer;

class OrderItem extends Model
{
  public $transformer = OrderItemTransformer::class;
  
  public function batch()
  {
      return $this->belongsTo('App\Models\Batch');
  }
  public function order()
  {
      return $this->belongsTo('App\Models\Order');
  }
}
