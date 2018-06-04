<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.5.18.
 * Time: 11.15
 */

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;

$capsule->addConnection(array(
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'mini',
    'username' => 'root',
    'password' => 'user123',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
));

$capsule->setAsGlobal();

$capsule->bootEloquent();