<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_id',
        'title',
        'subtitle',
    ];
}
