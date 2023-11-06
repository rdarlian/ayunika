<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }


    public function story()
    {
        return $this->hasMany(Story::class);
    }
    public function song()
    {
        return $this->hasMany(Song::class);
    }
    public function image()
    {
        return $this->hasMany(Images::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $guarded = ['id'];
}
