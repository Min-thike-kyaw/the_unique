<?php

namespace App\Http\Controllers;

use App\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(Request $request)
    {
        $validateData = request()->validate([
            'email' => 'required',
            'user_id' => 'required'
        ]);
        Follower::create($validateData);
        return back();
    }
}
