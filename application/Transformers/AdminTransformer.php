<?php

namespace App\Transformers;


use App\Cores\Fractals\TransformerInterface;
use Illuminate\Database\Eloquent\Model;

class AdminTransformer implements TransformerInterface
{
    public function transform(Model $model){
        return [
            'id' => $model->id,
            'artist' => $model->artist,
            'track' => $model->track,
            'link' => $model->link,
            'admin' => '1',
        ];
    }
}