<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Create the controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the chatbox.
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * Return all messages.
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
     * Store a newly created message in storage and broadcast the event.
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create($request->only('message'));

        broadcast(new MessageSent($user, $message))->toOthers();
    }
}
