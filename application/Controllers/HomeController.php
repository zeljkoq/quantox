<?php


namespace App\Controllers;

use App\Cores\Controller;

/**
 * Class HomeController
 * @package App\Controllers
 * @access public
 */
class HomeController extends Controller
{
    /**
     * Return index template for home
     */
    public function index()
    {
        $this->view('home/index');
    }
}
