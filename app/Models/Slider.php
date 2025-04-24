<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['image', 'is_active'];

    /* ---- Scopes --------------------------------------------------------- */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
