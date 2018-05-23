<?php


use App\Cores\Routes;

session_start();



/**
 * MINI - an extremely simple naked PHP application
 *
 * @package mini
 * @author Panique
 * @link https://github.com/panique/mini/
 * @license http://opensource.org/licenses/MIT MIT License
 */

error_reporting(E_ALL); ini_set('display_errors', 1);
// TODO get rid of this and work with namespaces + composer's autoloader

// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

// This is the (totally optional) auto-loader for Composer-dependencies (to load tools into your project).
// If you have no idea what this means: Don't worry, you don't need it, simply leave it like it is.
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}
//spl_autoload_register(function ($class_name) {
//    include APP . $class_name . '.php';
//});
// load application config (error reporting etc.)
require APP . 'config/config.php';
require APP . 'config/boot.php';

// FOR DEVELOPMENT: this loads PDO-debug, a simple function that shows the SQL query (when using PDO).
// If you want to load pdoDebug via Composer, then have a look here: https://github.com/panique/pdo-debug
//require APP . 'libs-old/helper.php';


// load application class
require APP . 'Cores/Application.php';
require APP . 'Cores/Controller.php';

// start the application

Routes::makeRoutes();








