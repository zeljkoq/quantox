<?php
//namespace App\Cores;
//use Illuminate\Routing\RouteCollection;
//
//
//
///**
// * Created by PhpStorm.
// * User: user
// * Date: 17.5.18.
// * Time: 15.28
// */
//class Views
//{
//
//    protected $route;
//
//    public function __construct(RouteCollection $route)
//    {
//        $this->route = $route;
//
//    }
//
////    public static function render($view, $args = [])
////    {
////        extract($args, EXTR_SKIP);
////        $file = APP . "Views/$view";
////        if (is_readable($file)) {
////            require $file;
////        } else {
////            throw new \Exception("$file not found");
////        }
////    }
////
////    public static function renderTemplate($template, $args = [])
////    {
////        static $twig = null;
////        if ($twig === null) {
////            $loader = new \Twig_Loader_Filesystem(APP . 'Views');
////            $twig = new \Twig_Environment($loader, array(
////                'auto_reload' => true,
////                'cache' => APP . 'cache'
////            ));
////            $twig->addExtension(new \Twig_Extension_StringLoader());
////            $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) {
////                return sprintf('../%s', ltrim($asset, '/'));
////            }));
////
////
////        }
////        echo $twig->render($template, $args);
////
////
////    }
//
//
//}