<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function getStatusAttribute($value)
  {
    $rawStatus = ['1' => 'pendiente','2'=>'confirmado','3'=>'pagado','4'=>'entregado'];
    return $rawStatus[$value];
  }

  public function comments()
  {
      return $this->morphMany('App\Models\Comment', 'commentable');
  }

}
