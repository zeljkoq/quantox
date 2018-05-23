<?php


namespace App\Controllers;

use App\Cores\Controller;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $this->view('home/index');
    }

}
