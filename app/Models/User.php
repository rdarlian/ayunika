<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'is_admin',
        'tier',
        'period',
        'period_date',
        'theme',
        'invitation_word'
    ];

    public function undangan()
    {
        return $this->hasMany(Undangan::class);
    }
    public function ucapan()
    {
        return $this->hasMany(Ucapan::class);
    }
    public function tamu()
    {
        return $this->hasMany(Tamu::class);
    }
    public function brideimage()
    {
        return $this->hasMany(BrideImage::class);
    }

    public function bridedata()
    {
        return $this->hasMany(BrideImage::class);
    }
    public function groomdata()
    {
        return $this->hasMany(BrideImage::class);
    }
    public function eventdata()
    {
        return $this->hasMany(BrideImage::class);
    }
    public function groomimage()
    {
        return $this->hasMany(GroomImage::class);
    }
    public function coverimages()
    {
        return $this->hasMany(CoverImage::class);
    }
    public function song()
    {
        return $this->hasOne(UserSong::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
