<?php

namespace App\Models;

use App\Models\like;
use App\Models\User;
use App\Models\album;
use App\Models\comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'id_album',
        'judul_foto',
        'deskripsi_foto',
        'lokasi_file'
    ];

    protected $table = 'foto';

    //relasi
    public function like()
    {
        return $this->hasMany(like::class, 'id_foto', 'id');
    }

    public function comment()
    {
        return $this->hasMany(comment::class, 'id_foto', 'id');
    }
    public function album()
    {
        return $this->belongsTo(album::class, 'id_album', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
}
