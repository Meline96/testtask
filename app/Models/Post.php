<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'description',
        'photo',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
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
}
