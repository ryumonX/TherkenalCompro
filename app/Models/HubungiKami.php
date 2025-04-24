<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HubungiKami extends Model
{
    use HasFactory;

    protected $table    = 'hubungi_kamis';
    protected $fillable = [
        'image',
    ];
}
