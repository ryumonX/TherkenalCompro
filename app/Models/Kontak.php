<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_telepon',
        'no_telegram',
        'email',
        'alamat',
        'jam_kerja',
        'embed_map',
    ];
}
