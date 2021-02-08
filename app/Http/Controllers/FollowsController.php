<?php

namespace App\Http\Controllers;

use App\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        current_user()->toggleFollow($user);

        return back();
    }
}
