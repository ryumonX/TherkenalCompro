<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroGaleriProduk extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'description'];

    public function galeri()
    {
        return $this->hasMany(GaleriProduk::class);
    }
}
