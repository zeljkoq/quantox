<?php

namespace App\Cores\Fractals;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface TransformerInterface
 * @package App\Cores\Fractals
 */
interface TransformerInterface
{
    /**
     * @param Model $model
     * @return mixed
     */
    public function transform(Model $model);
}