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

class LoginController extends Controller
{
    public function index()
    {
        $this->view('auth/login');
    }

    public function login()
    {
        $request = Request::capture();


        $validator = new ValidatorFactory();
        $data = $request->only([
            'email',
            'password'
        ]);
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $result = $validator->make($data, $rules);
        $errors = $result->errors()->toArray();

        if (empty($errors)) {

             $user = User::where('email', $request->email)->first();
             if (!empty($user))
             {
                 if($user->password == sha1($request->password))
                 {

                     $_SESSION['user'] = true;
                     $_SESSION['user_email'] = $request->email;
                     redirect('songs');
                 }
                 else
                 {
                     $_SESSION['user'] = false;
                     redirect('');
                 }
             }
             else
             {
                 redirect('');
             }

        } else {

        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect('');
    }

}