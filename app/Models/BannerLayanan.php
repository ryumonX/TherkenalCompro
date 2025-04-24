<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerLayanan extends Model
{
    use HasFactory;

    protected $table    = 'banner_layanans';
    protected $fillable = ['title', 'subtitle', 'description'];
}
