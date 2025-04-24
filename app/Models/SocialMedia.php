<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table    = 'social_medias';
    protected $fillable = ['platform', 'link_platform', 'slug', 'is_active'];

    /* -------- Relationships ----------------------------- */
    public function images()
    {
        return $this->hasMany(SocialMediaImage::class);
    }

    /* -------- Scopes ------------------------------------ */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /* Optional: use slug in route‑model binding */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
