<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TentangKami extends Model
{
    use HasFactory;

    protected $table    = 'tentang_kamis';
    protected $fillable = ['image', 'title', 'subtitle','description'];
}
