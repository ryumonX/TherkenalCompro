<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['image', 'title', 'description', 'is_active', 'price'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
