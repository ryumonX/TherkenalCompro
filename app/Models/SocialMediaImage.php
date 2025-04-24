<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMediaImage extends Model
{
    use HasFactory;

    protected $fillable = ['social_media_id', 'image'];

    public function socialMedia()
    {
        return $this->belongsTo(SocialMedia::class);
    }
}
