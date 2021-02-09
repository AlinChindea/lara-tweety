<?php

namespace App\Http\Controllers;

use App\Tweet;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $tweet->like($tweet);

        return back();
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->dislike($tweet);

        return back();
    }
}
