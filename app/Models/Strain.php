<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strain extends Model
{
  public function lotes()
  {
      return $this->hasMany('App\Models\Lote');
  }

  public function lotesActive()
  {
      return $this->hasOne('App\Models\Lote')->where('status',1);
  }
}
