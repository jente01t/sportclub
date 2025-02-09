<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'birthday', 
        'foto', 
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'profile_sport');
    }
}
