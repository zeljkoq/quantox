<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.5.18.
 * Time: 11.50
 */

function redirect($name)
{
    if ($name == null)
    {
        echo "<script type='text/javascript'> document.location = '". URL . "'; </script>";
    }
    else
    {
        echo "<script type='text/javascript'> document.location = '". URL . $name . "'; </script>";
    }



}


function route($name, $parameters = null){
    $routes = App\Cores\Routes::getRoutes();

    foreach ($routes as $as=>$url){
        if($as == $name){

            if($parameters){
                foreach ($parameters as $key=>$param){
                    $url = str_replace('{'. $key. '}', $param, $url);
                }
            }
            if(strpos($url, '{') !== false){
                return route('');
            }
            return URL. $url;
        }
    }
}

