<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4.6.18.
 * Time: 15.39
 */

namespace App\Cores\FormRequest;

use JeffOchoa\ValidatorFactory;
use Illuminate\Http\Request;

/**
 * Class FormRequest
 * @package App\Cores\FormRequest
 */
trait FormRequest
{

    /**
     * @param $data
     * @param $rules
     * @return mixed
     */
    public function validator($data, $rules)
    {

        $validator = new ValidatorFactory();
        $result = $validator->make($data, $rules);
        $errors = $result->errors()->toArray();

    }
}