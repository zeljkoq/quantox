<?php

namespace App\Transformers;

use App\Cores\Fractals\TransformerInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTransformer
 * @package App\Transformers
 */
class UserTransformer implements TransformerInterface
{
    /**
     * @param Model $model
     * @return array
     */
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