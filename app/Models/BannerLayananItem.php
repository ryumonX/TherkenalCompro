<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerLayananItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_icon',
    ];
}
