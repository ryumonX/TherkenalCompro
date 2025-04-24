<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriArtikel extends Model
{
    use HasFactory;

    protected $table    = 'kategori_artikels';
    protected $fillable = ['title', 'slug'];

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
}
