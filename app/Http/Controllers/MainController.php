<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }
    
    public function register(Request $request){
        $request->validate(
            [
                'email' => 'required|email',
            ]
        );
        echo "<pre>";
        print_r($request->all());
    }
}
