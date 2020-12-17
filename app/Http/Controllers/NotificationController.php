<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        
        $user = User::find(auth()->user()->id);
       return view('notification',compact('user'));
    }
}
