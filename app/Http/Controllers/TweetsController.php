<?php

namespace App\Http\Controllers;

use App\Tweet;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
        // if validation passes it's saved as an array
        $attributes = request()->validate(['body' => 'required|max:255']);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect('/home');
    }
}
