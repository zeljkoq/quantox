<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.5.18.
 * Time: 10.23
 */

namespace App\Views\Extensions;

use Illuminate\Routing\RouteCollection;
use Twig_Extension;
use Illuminate\Http\Request;

class PathExtensions extends Twig_Extension
{

    protected $route;

    public function __construct(RouteCollection $route)
    {
        $this->route = $route;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('route', [$this, 'route'])
        ];
    }

    public function route($name)
    {
       return $this->route->match($name)->getPath();
    }

}