<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  public function lote()
  {
      return $this->belongsTo('App\Models\Lote');
  }
}
