<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Session;

use App\Models\MUser;
use PHPMailer\PHPMailer\SMTP;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $password = $request->input('password');
        try { 
            $user_data = MUser::where("password", $password)->first();
        } catch(\Illuminate\Database\QueryException $ex){ 
            log::error($ex->getMessage());

            Session::flash('error', "No Database Connection");
            return redirect()->route('login');
        }

        if($user_data){
            // 2. simpan session id, username, fullname
            Session::put('username', $user_data->username);
            Session::put('role', $user_data->role);

            if($user_data['role'] == 1){
                return redirect()->route('schedule.index');
            } else {
                return redirect()->route('member.home');
            }
        } else {
            return redirect()->route('login');
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        //Session::flash('error', "Log Out Successfully");
    }
}
