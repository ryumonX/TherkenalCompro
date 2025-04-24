<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConfigWeb extends Model
{
    use HasFactory;

    protected $table    = 'config_webs';
    protected $fillable = ['logo', 'favicon', 'title', 'subtitle', 'website_url', 'copyright'];
}
