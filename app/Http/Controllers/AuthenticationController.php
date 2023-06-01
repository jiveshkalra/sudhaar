<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use App\Models\Students;

class AuthenticationController extends Controller
{
    public function register_user(Request $request)
    {
        $username = $request->input('username');
        $auth_key = $request->input('auth_key');
        $ipAddress = (string) $request->ip();
        // dd(gettype($ipAddress));
        $exists = Students::where('username', $username)
            ->orWhere('auth_key', $auth_key)
            ->exists();
        if ($exists) {
            $username_exists = Students::where('username', $username)->exists();
            $auth_key_exists = Students::where('username', $auth_key)->exists();
            if ($username_exists) {
                $error = "duplicate_username";
            } else if ($auth_key_exists) {
                $error = "duplicate_auth_key";
            }
            Cookie::queue(Cookie::make('error', $error, 0.10));

            $respon = [
                'status'=>"error",
                'error' => $error
            ];
        } else {
            $student = new Students;
            $student->username = $username;
            $student->ip_address = $ipAddress;
            $student->auth_key = md5($auth_key);

            $student->save();

            // Store username and password in the session
            Session::put('username', $username);
            Session::put('auth_key', $auth_key);
            Cookie::queue(Cookie::make('from_register', '1', 0.10));
            
            $respon = [
                'status' => "success",
                'username' =>$username,
                'auth_key' =>$auth_key
            ];
            // Return the JSON response
        }
        return response()->json($respon);
    }
    public function get_session(Request $request)
    {
        $username = Session::get('username');
        $password = Session::get('password');
        $fromLogin = Cookie::get('from_login');
        $fromRegister = Cookie::get('from_register');
        $error = Cookie::get('error');

        return response()->json([
            'username' => $username,
            'password' => $password,
            'fromRegister' => $fromRegister,
            'fromLogin' => $fromLogin,
            'error' => $error,
        ]);
    }
    public function logout(Request $request)
    {
        Session::forget(['username', 'email', 'password']);
        return redirect('/');
    }
    public function login(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];
        $exists = Students::where('username', $username)
            ->where('password', md5($password))
            ->exists();
        if ($exists) {
            $user = Students::where('username', $username)
                ->where('password', md5($password))
                ->first();
            Session::put('username', $user['username']);
            Session::put('email', $user['email']);
            Cookie::queue(Cookie::make('from_login', '1', 0.10));
        } else {
            $error = "invalid_credentials";
            Cookie::queue(Cookie::make('error', $error, 0.10));
        }
        return redirect("/");
    }
}
