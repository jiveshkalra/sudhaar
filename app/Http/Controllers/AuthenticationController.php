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
    public function register(Request $request)
    {
        $request->validate(['email' => 'required|email',]);
        
        $apiUrl = 'https://randomuser.me/api/';
        
        // Make the API request
        $response = Http::get($apiUrl);
        
        // Check if the response is successful
        if ($response->successful()) {
            $data = $response->json();
            
            // Check if the "results" key exists and has at least one element
            if (isset($data['results']) && count($data['results']) > 0) {
                $results = $data['results'];
                $nameArray = $results[0]['name'];
                // Merge the last two names in the array
                $username = implode(' ', array_slice($nameArray, -2));
                $password = Str::random(16);
                $exists = Students::where('username', $username)
                                    ->orWhere('email', $request['email'])
                                    ->exists();
                if ($exists) {
                    $email_exists = Students::where('email', $request['email'])->exists();
                    $username_exists = Students::where('username', $username)->exists();
                    if($email_exists){
                        $error = "email_exists";
                    }
                    else if($username_exists){
                        $error = "username_exists";
                    }
                    //TODO: CODE FOR ERRROR PAGE
                    Cookie::queue(Cookie::make('error', $error, 0.10));
                    return redirect("/");
                } else {
                    $student = new Students;
                    $student->email = $request['email'];
                    $student->username = $username;
                    $student->password = md5($password);
                    $student->save();

                    // Store username and password in the session
                    Session::put('username', $username);
                    Session::put('password', $password);
                    Session::put('email', $request['email']);
                    Cookie::queue(Cookie::make('from_register','1',0.10));
                    return redirect('/');
                }
                
            } else {
                //TODO: CODE FOR ERRROR PAGE
                $error = "server_err";            
                Cookie::queue(Cookie::make('error', $error, 0.10));
                return redirect("/");
            }
        } else {
            //TODO: CODE FOR ERRROR PAGE
            $error = "server_err";
            Cookie::queue(Cookie::make('error', $error, 0.10));
            return redirect("/");
        }
    }
    public function get_session(Request $request){
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
    public function logout(Request $request){
        Session::forget(['username','email','password']);
        return redirect('/');
    }
    public function login(Request $request){
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
            Cookie::queue(Cookie::make('from_login','1',0.10));
        }
        else{
            $error = "invalid_credentials";
            Cookie::queue(Cookie::make('error', $error, 0.10));
        }
        return redirect("/");
    }
}