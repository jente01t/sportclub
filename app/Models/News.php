<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
