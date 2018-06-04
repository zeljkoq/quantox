<?php

namespace App\Transformers;

use Illuminate\Database\Eloquent\Model;

class UserTransformer extends Transformer
{
    public function transform(Model $model){
        return [
            'id' => $model->id,
            'artist' => $model->artist,
            'track' => $model->track,
            'link' => $model->link,
            'admin' => '0',
        ];
    }
}