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

Broadcast::routes(['middleware' => 'auth:api']);

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('private.chat.{id}',function($user,$id){
    return $user !== null;
});

Route::post('/guard/broadcast/auth', function(Request $req){
    return true;
})->middleware('broadcast');

// Route::middleware('auth:sanctum')->get('/api/user', function (Request $request) {
//     return $request->user();
// });