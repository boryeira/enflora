<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionDue extends Model
{
  protected $dates = ['start','end','pay_at'];
}
