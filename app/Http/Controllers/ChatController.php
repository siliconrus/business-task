<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SocketMessage;


class ChatController extends Controller
{
    /**
     * ChatController constructor.
     * Показываем страницу только авторизованным
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat');
    }

    public function sendMessage(Request $request)
    {
        event(new SocketMessage($request->input('')));
    }
}
