<?php

namespace App;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
      if ($this->isFollowing($user)) {
        return $this->unfollow($user);
      }

      return $this->follow($user);
    }

    public function isFollowing(User $user)
    {
        // 1. get a collection of all the users
        // the current user is following and
        // check it contains the given user

        // return $this->follows->contains($user);

        // ☝🏼 downside of fetching a collection of their entire relationship
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows()
    {
        // be explicit about the table name
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }
}
