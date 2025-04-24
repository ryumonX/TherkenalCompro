<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GaleriProduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_galeri_produk_id',
        'title',
        'image',
    ];

    public function heroSection()
    {
        return $this->belongsTo(HeroGaleriProduk::class, 'hero_galeri_produk_id');
    }
}
