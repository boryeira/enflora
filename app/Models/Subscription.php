<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
  protected $dates = ['subscription_start','subscription_end'];

  public function dues()
  {
      return $this->hasMany('App\Models\SubscriptionDue');
  }

  public function getStatusAttribute($value)
  {
    $rawStatus = ['1' => 'activa','2'=>'consumida','3'=>'cancelada'];
    return $rawStatus[$value];
  }


}
