<?php

namespace App\Http\Controllers;

use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        // $this->authorize('edit', $user); <- if you want to handle authorisation here and not in the routes
        return view('profiles.edit', compact('user'));
    }
}
