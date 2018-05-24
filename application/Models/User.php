<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * @package App\Models
 * @access public
 */

class User extends Eloquent
{

    protected $fillable = [
        'email',
        'name',
        'password',
        'remember_me',
    ];

    protected $table = 'users';

    public $timestamps = [];

    /**
     * @return bool Return true if user is logged in
     */

    public static function isLogged()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] == true)
        {
            return true;
        }
        else
        {
            $_SESSION['user'] = false;
            return false;
        }
    }

    /**
     * @return mixed Return current logged user data
     */

    public static function getData()
    {
        return $user = User::where('email', $_SESSION['user_email'])->first();
    }

}
