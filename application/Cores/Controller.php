<?php

namespace App\Cores;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Blade\Blade;


abstract class Controller
{

      public function __construct()
      {
          $this->blade = new Blade(ROOT . 'application/Views', ROOT . 'application/cache');
      }

      public function view($view, $parameters = null){
           if($parameters){
               echo $this->blade->make($view, $parameters);
           }else{
               echo $this->blade->make($view);
           }
      }

        public function isOwner($userId, Model $model)
        {
            return $model->user_id == $userId;
        }

}
