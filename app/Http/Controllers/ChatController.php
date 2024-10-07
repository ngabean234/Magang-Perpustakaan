<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $title = 'Chat Anggota';
        return view('chat.index', compact('title'));
    }
}
