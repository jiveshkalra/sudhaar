<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;


class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
  
    public function register(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
            ]
        );

        $apiUrl = 'https://randomuser.me/api/';

        // Make the API request
        $response = Http::get($apiUrl);

        // Check if the response is successful
        if ($response->successful()) {
            // Get the JSON response body
            $data = $response->json();

            // Check if the "results" key exists and has at least one element
            if (isset($data['results']) && count($data['results']) > 0) {
                $results = $data['results'];
                $nameArray = $results[0]['name'];
                // Merge the last two names in the array
                $username = implode(' ', array_slice($nameArray, -2));
                $password = Str::random(10); 

                // Store username and password in the session
                Session::put('username', $username);
                Session::put('password', $password);
                
                Cookie::queue(Cookie::make('from_register', '1', 0.25));
                return redirect('/');
            } else {
                //TODO: CODE FOR ERRROR PAGE
                echo "No results found.";
            }
        } else {
            //TODO: CODE FOR ERRROR PAGE
            echo "Failed to fetch data from the API.";
        }
        return redirect('/');
    }
}
