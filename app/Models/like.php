<?php

namespace App\Models;

use App\Models\foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class like extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'id_foto'
    ];
    protected $table = 'likefoto';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
    public function foto()
    {
        return $this->belongsTo(foto::class, 'id_foto', 'id');
    }

}
