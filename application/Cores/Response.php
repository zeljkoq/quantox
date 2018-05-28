<?php

namespace App\Cores;
use App\Transformers\Transform;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Response
{

    public function response($data){
        header('Content-Type: application/json');
        return json_encode($data);
    }

    public function item($model, $transformer){
        return $this->response([
            'model' => $transformer->transform($model),

        ]);
    }

    public function collection($collection, $transformer){
        $collect = [];
        foreach ($collection as $key=>$model){
            $collect += [$key => $transformer->transform($model)];
        }
        return $this->response([
            'model' => $collect,
        ]);
    }
}