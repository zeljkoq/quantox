<?php

namespace App\Cores;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\UrlGenerator;
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
    public function __construct(UrlGenerator $generator)
    {
        $this->blade = new Blade(ROOT . 'resources/Views', ROOT . 'configuration/cache');
        $this->response = new Response();
        $this->generator = $generator;
//        dd($this->generator->to());
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

    public function to($path, $status = 302, $headers = [], $secure = null)
    {
        return $this->createRedirect($this->generator->to($path, [], $secure), $status, $headers);
    }
    public function getUrlGenerator()
    {
        return $this->generator;
    }



}
