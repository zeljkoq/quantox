<?php
namespace App\Cores\Fractals;

use Illuminate\Database\Eloquent\Model;

interface TransformerInterface {
    public function transform(Model $model);
}