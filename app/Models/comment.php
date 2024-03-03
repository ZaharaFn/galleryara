<?php

namespace App\Models;

use App\Models\foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'id_foto',
        'isi_komentar',
    ];

    


    public function foto()
    {
        return $this->belongsTo(foto::class, 'id_foto', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
}
