<?php

namespace App\Models;

use App\Models\foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class album extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_album',
        'deskripsi',
        'id_users'
    ];

    protected $table = 'album';
    public function foto()
    {
        return $this->hasMany(foto::class, 'id_album', 'id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
}
