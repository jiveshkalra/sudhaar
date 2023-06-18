<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::routes(['middleware' => ['auth:sanctum']]); // Add this line

// Broadcast::routes(['middleware' => 'auth:sanctum']);

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('chat.{id}',function($user,$id){
    // return $user !== null;
    if($user->id ==$id){
        return true;
    }
    else{
        return false;
    }
});

// Route::post('/guard/broadcast/auth', function(Request $req){
//     return true;
// })->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->get('/api/user', function (Request $request) {
//     return $request->user();
// });