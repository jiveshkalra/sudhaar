<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

                // Display the merged names
            $password = Str::random(10); // Generate a random password with 10 characters

            } else {
                echo "No results found.";
            }
        } else {
            echo "Failed to fetch data from the API.";
        }
        $data = compact('username','password');
        return view('showuser')->with($data);
    }
}
