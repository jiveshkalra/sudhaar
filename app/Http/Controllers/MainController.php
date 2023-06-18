<?php

namespace App\Http\Controllers;

use BeyondCode\LaravelWebSockets\DashboardLogger;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Pusher\Pusher;

class MainController extends Controller
{
    public function index()
    {
        return view('index',[
            'port'=>env("LARAVEL_WEBSOCKETS_PORT"),
            'host'=>env("LARAVEL_WEBSOCKETS_HOST"),
            'authEndpoint'=>"/api/sockets/connect",
            'logChannel' => DashboardLogger::LOG_CHANNEL_PREFIX,
        ]);
    }
    public function connect(Request $request){
        $broadcaster = new PusherBroadcaster(
            new Pusher(
                env("PUSHER_APP_KEY"),
                env("PUSHER_APP_SECRET"),
                env("PUSHER_APP_ID"),
                []
            )
        );
        return $broadcaster->validAuthenticationResponse($request,[]);
    }
}
