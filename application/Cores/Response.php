<?php

namespace App\Cores;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Response
{

    public function response($data){
        header('Content-Type: application/json');
        return json_encode($data);
    }

    public function item($model, $transformer, $message = null){
        return $this->response([
            'model' => $transformer->transform($model),
            'message' => $message,
        ]);
    }

    public function collection($collection, $transformer, $message = null){
        $collect = [];
        foreach ($collection as $key=>$model){
            $collect += [$key => $transformer->transform($model)];
        }
        return $this->response([
            'model' => $collect,
            'message' => $message,
        ]);
    }
}