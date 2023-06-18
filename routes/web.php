<?php

use App\Events\SendMessage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Iterator\FilecontentFilterIterator;

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
Route::get('/index',[MainController::class,'index']);

Route::post('/register_user', [AuthenticationController::class,'register_user']);

Route::get('/user_registered', [AuthenticationController::class,'user_registered']);

Route::get('/auth_error', [AuthenticationController::class,'auth_error']);

Route::post('/login', [AuthenticationController::class,'login']);

Route::get('/logout', [AuthenticationController::class,'logout']);

Route::get('/download_auth', [AuthenticationController::class,'download']);

Route::get('/get_creds', [AuthenticationController::class,'get_creds']);

Route::get('/check_login_status', [AuthenticationController::class,'check_login_status']);
// Route::get('/broadcasting_auth', [AuthenticationController::class,'broadcasting_auth']);

Route::post('/send-message', function(Request $request){
    event(new App\Events\SendMessage($request['message']));
});
// Auth::routes(); 

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
