<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.5.18.
 * Time: 11.13
 */

namespace App\Controllers;

/**
 * Class ExceptionsController
 * @package App\Controllers
 */
class ExceptionsController
{
    /**
     * @return string
     */
    public function notFound()
    {
        return '404 not found';
    }
}