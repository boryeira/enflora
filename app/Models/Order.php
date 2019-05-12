<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function getStatusAttribute($value)
  {
    $rawStatus = [
      '1'=> ['Pendiente','secondary','1'],
      '2'=> ['Confirmado','primary','2'],
      '3'=> ['Pagado','danger','3'],
      '4'=> ['Entregado','success','4']
    ];
    return $rawStatus[$value];
  }

  public function comments()
  {
      return $this->morphMany('App\Models\Comment', 'commentable');
  }

  public function items()
  {
    return $this->hasMany('App\Models\OrderItem');
  }

  public function user()
  {
      return $this->belongsTo('App\Models\User');
  }

}
