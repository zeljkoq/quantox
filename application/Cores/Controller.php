<?php

namespace App\Cores;


use Illuminate\Database\Eloquent\Model;
use Jenssegers\Blade\Blade;

/**
 * Class Controller
 * @package App\Cores
 */
abstract class Controller
{

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->blade = new Blade(ROOT . 'resources/Views', ROOT . 'configuration/cache');
        $this->response = new Response();
    }



    /**
     * @param $view
     * @param null $parameters
     */
    public function view($view, $parameters = null)
    {
        if ($parameters) {
            echo $this->blade->make($view, $parameters);
        } else {
            echo $this->blade->make($view);
        }
    }

    /**
     * @param $userId
     * @param Model $model
     * @return bool
     */
    public function isOwner($userId, Model $model)
    {
        return $model->user_id == $userId;
    }

    /**
     * @param $data
     * @return string
     */
    public function json($data)
    {
        header('Content-Type: application/json');

        return json_encode($data);
    }

}
