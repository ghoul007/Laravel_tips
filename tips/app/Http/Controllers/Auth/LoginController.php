<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }


    public function isEmail()
    {
        if (filter_var(request()->username, FILTER_VALIDATE_EMAIL))
            return "email";
        else
            return "username";

    }

    public function loginadmin()
    {



        return view('auth.admin.login');
    }

    public function login()
    {


     $prev_url =app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
     switch ($prev_url){
         case 'admin.login':
                 $user_info = ["post.create","admin"];
                 break;
             default:
                 $user_info = ["post.index","web"];
                 break;

     }


        if (Auth::guard($user_info[1])->attempt([$this->isEmail() => request()->username, "password" => request()->password])) {

            return redirect()->intended(route($user_info[0]));
        } else {
            return redirect()->back()->withInput(['username']);


        }

    }


}
