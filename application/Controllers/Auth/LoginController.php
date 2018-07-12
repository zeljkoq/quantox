<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.5.18.
 * Time: 09.33
 */

namespace App\Controllers\Auth;

use App\Cores\Controller;
use App\Cores\Views;
use Illuminate\Http\Request;
use JeffOchoa\ValidatorFactory;
use App\Models\User;
use App\Requests\CreateSongRequest\CreateSongRequest;

/**
 * Class LoginController
 * @package App\Controllers\Auth
 */
class LoginController extends Controller
{
    /**
     * Return index with login template
     */
    public function index()
    {
        $this->view('auth/login');
    }

    /**
     * Login user
     * @return true false if user is logged in
     */
    public function login()
    {
        $request = Request::capture();

        $validator = new ValidatorFactory();
        $data = $request->only([
            'email',
            'password'
        ]);
        $rules = [
            'email'    => 'required',
            'password' => 'required',
        ];
        $result = $validator->make($data, $rules);
        $errors = $result->errors()->toArray();

        if (empty($errors)) {

            $user = User::where('email', $request->email)->first();
            if (!empty($user)) {
                if ($user->password == sha1($request->password)) {
                    $_SESSION['user'] = true;
                    $_SESSION['user_email'] = $request->email;
                    redirect('songs');
                }
                $_SESSION['user'] = false;
                redirect('');
            }
            redirect('');
        }
    }

    /**
     * Logout user
     */
    public function logout()
    {
        unset($_SESSION['user']);
        redirect('');
    }

}