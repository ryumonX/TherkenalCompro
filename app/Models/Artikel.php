<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kategori_artikel_id',
        'thumbnail',
        'title',
        'slug',
        'preview_description',
        'description',
        'meta_keyword',
        'meta_description',
        'post_schedule',
        'is_active',
    ];

    protected $casts = [
        'post_schedule' => 'datetime',
    ];

    /* ---- Relationships -------------------------------------------------- */
    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'kategori_artikel_id');
    }

    /* ---- Scopes --------------------------------------------------------- */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeScheduled($query)
    {
        return $query->where('post_schedule', '<=', now());
    }

    /* ---- Static Methods ------------------------------------------------- */

    /**
     * Get artikel by ID
     */
    public static function findActive($id)
    {
        return self::active()->scheduled()->findOrFail($id);
    }

    /**
     * Get artikel by slug
     */
    public static function findBySlug($slug)
    {
        return self::active()->scheduled()->where('slug', $slug)->firstOrFail();
    }

    /**
     * Get related artikels (same category)
     */
    public static function getRelated($artikel, $limit = 3)
    {
        return self::active()->scheduled()
            ->where('kategori_artikel_id', $artikel->kategori_artikel_id)
            ->where('id', '!=', $artikel->id)
            ->latest()
            ->take($limit)
            ->get();
    }

    /**
     * Get latest artikels
     */
    public static function getLatest($limit = 4)
    {
        return self::active()->scheduled()->latest()->take($limit)->get();
    }
}
