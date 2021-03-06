<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.5.18.
 * Time: 09.33
 */

namespace App\Controllers\Auth;

use App\Cores\Controller;

use Illuminate\Http\Request;
use JeffOchoa\ValidatorFactory;
use App\Models\User;

/**
 * Class RegisterController
 * @package App\Controllers\Auth
 */
class RegisterController extends Controller
{
    /**
     * Return index template for registration
     */
    public function index()
    {
        $this->view('auth/register');
    }

    /**
     * Register user
     */
    public function register()
    {
        $request = Request::capture();

        $validator = new ValidatorFactory();
        $data = $request->only([
            'email',
            'password',
            'name',
            'confirm_password',
        ]);
        $rules = [
            'email'            => 'required',
            'password'         => 'required',
            'name'             => 'required',
            'confirm_password' => 'required',
        ];
        $result = $validator->make($data, $rules);
        $errors = $result->errors()->toArray();

        if (empty($errors)) {

            $params = [
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => sha1($request->password),
            ];


            $user = User::where('email', $request->email)->first();

            if (empty($user)) {
                if ($request->password == $request->confirm_password) {

                    User::create($params);
                    redirect('songs');

                }
                redirect('login');
            }
            redirect('register');
        }
    }
}