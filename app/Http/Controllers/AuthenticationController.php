<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;


class AuthenticationController extends Controller
{
    public function user_registered(Request $request)
    {
        Cookie::queue(Cookie::make('from_register', '1', 0.10));
        return redirect("/");
    }
    public function auth_error(Request $request)
    {
        Cookie::queue(Cookie::make('error', $request->error, 0.10));
        return redirect("/");
    }
    public function register_user(Request $request)
    {
        $username = $request->username;
        $auth_key = $request->auth_key;
        $ipAddress = (string) $request->ip();
        $exists = Student::where('username', $username)->orWhere('auth_key', $auth_key)->exists();

        if ($exists) {
            $username_exists = Student::where('username', $username)->exists();
            $auth_key_exists = Student::where('username', $auth_key)->exists();
            if ($username_exists) {
                $error = "duplicate_username";
            } else if ($auth_key_exists) {
                $error = "duplicate_auth_key";
            }
            $respon = [
                'status' => "error",
                'error' => $error
            ];
            return response()->json($respon);
        } else {
            $user = Student::create([
                'username' => $username,
                'ip_address' => $ipAddress,
                'auth_key' => md5($auth_key),
            ]);

            auth()->login($user);
            // Return the JSON response
            return response()->json(['status' => "success"])
                ->cookie('user_credentials', json_encode(['username' => $username, 'auth_key' => $auth_key]), 60, null, null, false, true)
                ->cookie('registered', true, 60);; // Set the cookie as HTTP-only
        };
    }
    public function get_creds(Request $request)
    {
        $userCredentials = json_decode($request->cookie('user_credentials'));

        $username = $userCredentials->username;
        $auth_key = $userCredentials->auth_key;

        // Use the data as needed        
        $respon = [
            'status' => "success",
            'username' => $username,
            'auth_key' => $auth_key
        ];
        // Clear the cookie (optional)
        return response()->json($respon)->cookie('user_credentials', null, -1)->cookie('registered', null, -1);
    }
    public function logout(Request $request)
    {
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function login(Request $request)
    {
        $auth_key = $request['auth_key'];
        $user = Student::where('auth_key', md5($auth_key))->first();
        if (!$user) {
            // Passkey not found, return an error or redirect back to the login page
            return redirect()->back()->withErrors(['auth_key' => 'Invalid Auth Key']);
        }
        auth()->login($user);
        Cookie::queue(Cookie::make('from_login', '1', 0.10));
        return redirect("/");
    }
    public function download()
    {
        $username = auth()->user()->username;
        $authKey = auth()->user()->auth_key;

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
    public function check_login_status(Request $request){
        $isLoggedIn = auth()->check(); // Check if the user is logged in or not
        return response()->json([
            'isLoggedIn' => $isLoggedIn,
        ]);
    }
}
