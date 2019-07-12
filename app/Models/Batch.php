<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\BatchTransformer;

class Batch extends Model
{
  public $transformer = BatchTransformer::class;
  
  protected $with = array('strain');

  public function getStatusAttribute($value)
  {
    $rawStatus = [
      '1'=> ['activo','success','1'],
      '2'=> ['consumido','secondary','2'],
    ];
    return $rawStatus[$value];
  }

  public function strain()
  {
      return $this->belongsTo('App\Models\Strain');
  }

  public function actives()
  {
      return $this->where('status',1)->get();
  }

  public function orderItems()
  {
    return $this->hasMany('App\Models\OrderItem');
  }


}
