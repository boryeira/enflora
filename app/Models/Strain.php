<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strain extends Model
{
  public function lotes()
  {
      return $this->hasMany('App\Models\Batch');
  }

  public function lotesActive()
  {
      return $this->hasOne('App\Models\Batch')->where('status',1);
  }
}
