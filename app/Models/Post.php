<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = [
        'name',
        'description',
        'photo',
    ];

    const ACTIVE = 1;
    const INACTIVE = 0;

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'posts_categories');
    }

    public function categoriesNames()
    {
        $categories = $this->categories();

        if ($categories)
        {
            return implode( ", ", $categories->pluck('title')->all() );
        }
    }

    public function votedUsers()
    {
        return $this->belongsToMany(User::class, 'likes')
            ->wherePivot('is_dislike', self::INACTIVE);
    }

    public function isLiked()
    {
        $userId = Auth::user()->id;

        return $this->votedUsers->find($userId);
    }
}
