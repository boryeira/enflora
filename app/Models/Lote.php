<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{

  public function strain()
  {
      return $this->belongsTo('App\Models\Strain');
  }
}
