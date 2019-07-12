<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Batch;

class BatchTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Batch $batch)
    {
        return [
            'id' => (int)$batch->id, 
            'name' => (string)$batch->strain->name, 
            'img' => (string)$batch->img, 
            'price' => (string)'$'.number_format($batch->price, 0, ',', '.'),
            'priceRaw' => (int)$batch->price, 
            'harvestedAt' => (string)$batch->harvested_at, 
        ];
    }
}
