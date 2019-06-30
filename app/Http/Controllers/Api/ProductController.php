<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Lote;

class ProductController extends ApiController
{
    public function index()
    {
      $lotes = Lote::all();
      $products = $lotes->toArray();
      return response()->json($products);
    }
}
