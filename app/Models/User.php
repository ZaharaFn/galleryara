<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\foto;
use App\Models\like;
use App\Models\album;
use App\Models\comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'email',
        'password',
        'nama_lengkap',
        'alamat',
        'profile'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function foto()
    {
        return $this->hasMany(foto::class, 'id_users', 'id');
    }
    public function like()
    {
        return $this->hasOne(like::class, 'id_users', 'id');
    }
    public function comment()
    {
        return $this->hasMany(comment::class, 'id_users', 'id');
    }
    public function album()
    {
        return $this->hasMany(album::class, 'id_users', 'id');
    }
}
