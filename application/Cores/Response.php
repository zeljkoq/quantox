<?php

namespace App\Cores;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Response
 * @package App\Cores
 */
class Response
{

    /**
     * @param $data
     * @return string
     */
    public function response($data){
        header('Content-Type: application/json');
        return json_encode($data);
    }

    /**
     * @param $model
     * @param $transformer
     * @param null $message
     * @return string
     */
    public function item($model, $transformer, $message = null){
        return $this->response([
            'model' => $transformer->transform($model),
            'message' => $message,
        ]);
    }

    /**
     * @param $collection
     * @param $transformer
     * @param null $message
     * @return string
     */
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