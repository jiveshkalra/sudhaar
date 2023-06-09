<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;


class AuthenticationController extends Controller
{   
    public function user_registered(Request $request){
        Cookie::queue(Cookie::make('from_register', '1', 0.10));
        return redirect("/");
    }
    public function auth_error(Request $request){
        Cookie::queue(Cookie::make('error', $request->error, 0.10));
        return redirect("/");
    }
    public function register_user(Request $request)
    {
        $username = $request->username;
        $auth_key = $request->auth_key;
        $ipAddress = (string) $request->ip();
        $exists = Student::where('username', $username)
            ->orWhere('auth_key', $auth_key)
            ->exists();
        if ($exists) {
            $username_exists = Student::where('username', $username)->exists();
            $auth_key_exists = Student::where('username', $auth_key)->exists();
            if ($username_exists) {
                $error = "duplicate_username";
            } else if ($auth_key_exists) {
                $error = "duplicate_auth_key";
            }
            $respon = [
                'status'=>"error",
                'error' => $error
            ];
        } else {
            $student = new Student;
            $student->username = $username;
            $student->ip_address = $ipAddress;
            $student->auth_key = md5($auth_key);

            $student->save();
            Session::start();

            // Store username and password in the session
            Session::put('username', $username);
            Session::put('auth_key', $auth_key);
            Cookie::queue(Cookie::make('username', $username, 10));
            Cookie::queue(Cookie::make('auth_key', $auth_key, 10));
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
    {    Session::start();

        $username = Session::get('username');
        $auth_key = Session::get('auth_key');
        $fromLogin = Cookie::get('from_login');
        $fromRegister = Cookie::get('from_register');
        $error = Cookie::get('error');

        return response()->json([
            'username' => $username,
            'auth_key' => $auth_key,
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
        $auth_key = $request['auth_key'];
        $exists = Student::where('auth_key', md5($auth_key))
            ->exists();
        if ($exists) {
            $user = Student::where('auth_key', md5($auth_key))
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
    public function download()
    {
        Session::start();
        $username = Session::get('username'); 
        $authKey = Session::get('auth_key'); 

        // Generate the file content
        $fileContent = $authKey;

        // Generate the file name
        $fileName = $username . '.txt';
        Storage::disk('local')->put($fileName, $fileContent);

        // Set the file headers for download
        $headers = [
            'Content-type'        => 'text/plain',
            'Content-Disposition' => 'attachment; filename=' . $fileName,
        ];

        // Generate the file and force download
        return response($fileContent, 200, $headers);
    }
}
