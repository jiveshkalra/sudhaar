<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[MainController::class,'index']);
// Route::post('/register',function($username,$password){
//     echo $username,$password;
// });
// Route::post('/registered',[MainController::class,'registered']);
Route::post('/register',[MainController::class,'register']);
