<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
  
  protected $with = array('strain');

  public function strain()
  {
      return $this->belongsTo('App\Models\Strain');
  }

  public function actives()
  {
      return $this->where('status',1)->get();
  }
}
