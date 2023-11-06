<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }
    use HasFactory;
    protected $fillable = [
        "tgl_story",
        "title_story",
        "description_story",
        "image_story",
        "user_id",
        "slug"
    ];
}
