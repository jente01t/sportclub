<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{

    protected $fillable = [
        'title',
        'image_path',
        'content',
        'published_at',
        'user_id',
    ];

    function user () {
        return $this->belongsTo(User::class);
    }

    function comments () {
        return $this->hasMany(Comment::class);
    }
}
