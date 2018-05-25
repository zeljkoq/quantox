<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.5.18.
 * Time: 16.07
 */

namespace App\Cores;

use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;


class Routes
{

    static $routesArr;

    public static function makeRoutes()
    {
        try{

            $dispatcher = new Dispatcher();
            $router = new Router($dispatcher);


            $router->get('songs', 'App\Controllers\SongsController@index')->name('songs');
//            $router->get('getData', 'App\Controllers\SongsController@getData')->name('getData');
//            $router->post('/songs/addsong', 'App\Controllers\SongsController@addSong')->name('addsong');
//            $router->get('editsong/{song_id}', 'App\Controllers\SongsController@editSongIndex')->name('edit.song');
//            $router->post('updatesong/{song_id}', 'App\Controllers\SongsController@updateSong')->name('update.song');
//            $router->get('/deletesong/{song_id}', 'App\Controllers\SongsController@deleteSong')->name('delete.song');
            $router->get('/edit/{song_id}', 'App\Controllers\SongsController@editSongIndex')->name('edit.song');
            $router->get('songs/ajaxGetStats', 'App\Controllers\SongsController@ajaxGetStats')->name('ajaxget');
            $router->get('login', 'App\Controllers\Auth\LoginController@index')->name('login');
            $router->get('logout', 'App\Controllers\Auth\LoginController@logout')->name('logout');
            $router->get('test', 'App\Controllers\SongsController@test')->name('test');


            /*
             * API routes
             */

            $router->get('/api/get', 'App\Controllers\Api\SongsController@getData')->name('api.get.songs');
            $router->post('/api/create', 'App\Controllers\Api\SongsController@addSong')->name('create');
            $router->get('/api/songdata/{song_id}', 'App\Controllers\Api\SongsController@getEachSongData')->name('api.edit.song.data');
            $router->post('/api/update/{song_id}', 'App\Controllers\Api\SongsController@updateSong')->name('api.update.song');
            $router->get('/api/delete/{song_id}', 'App\Controllers\Api\SongsController@deleteSong')->name('api.delete.song');


            /*
             * End API
             */


            /*
             *  Functions routes
             */

            $router->get('destroyMessage', 'App\Controllers\FunctionsController@destroyMessage')->name('destroy.message');

            /*
             * End functions
             */
            $router->get('/', 'App\Controllers\HomeController@index');

            $router->get('register', 'App\Controllers\Auth\RegisterController@index');
            $router->get('userlogin', 'App\Controllers\Auth\LoginController@login');
            $router->post('userregister', 'App\Controllers\Auth\RegisterController@register');

            $router->get('404', 'App\Controllers\ExceptionsController@notFound');

            $routes = $router->getRoutes();

            $routesArr = [];
            foreach ($routes as $route) {
                $as = isset($route->action['as']) ? $route->action['as'] : '';
                $routesArr += [$as => $route->uri];
            }
            self::$routesArr = $routesArr;


            $request = Request::createFromGlobals();
            $response = $router->dispatch($request);
            $response->send();


        }
        catch (\Exception $e) {
            if (strpos($e, 'NotFoundHttpException')) {
                redirect('404');
            }
//            print_r($e->getMessage());
        }
    }

    public static function getRoutes(){
        return self::$routesArr;
    }




}