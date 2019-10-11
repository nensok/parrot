<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ?  $this->image : '/profile/default/noimage.png';
        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }
}
