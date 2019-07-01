<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Lote as batch;

class BatchController extends ApiController
{
    public function index()
    {
      $batches = batch::where('status',1)->get();
      return $this->showAll($batches);
    }
}
