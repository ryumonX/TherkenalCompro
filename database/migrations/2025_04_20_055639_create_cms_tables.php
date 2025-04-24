<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | 1. Slider
        |--------------------------------------------------------------------------
        */
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->boolean('is_active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        /*
        |--------------------------------------------------------------------------
        | 2–4. Hero & “Tentang Kami” blocks
        |     – singleton tables, but FK prepared for scalability
        |--------------------------------------------------------------------------
        */
        Schema::create('heros', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->timestamps();
        });

        Schema::create('hero_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->timestamps();
        });

        Schema::create('tentang_kamis', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | 5–6. Banner Layanan
        |--------------------------------------------------------------------------
        */
        Schema::create('banner_layanans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('banner_layanan_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image_icon');
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | 7–9. Produk & Keunggulan
        |--------------------------------------------------------------------------
        */
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->boolean('is_active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('keunggulans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('keunggulan_items', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('subtitle');
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | 10–11. Hero Galeri & Galeri Produk
        |--------------------------------------------------------------------------
        */
        Schema::create('hero_galeri_produks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('galeri_produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hero_galeri_produk_id')
                  ->constrained('hero_galeri_produks')
                  ->cascadeOnDelete();
            $table->string('title');
            $table->string('image');
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | 12. Hubungi Kami (singleton)
        |--------------------------------------------------------------------------
        */
        Schema::create('hubungi_kamis', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | 13–14. Artikel & Kategori
        |--------------------------------------------------------------------------
        */
        Schema::create('kategori_artikels', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_artikel_id')
                  ->constrained('kategori_artikels')
                  ->cascadeOnDelete();
            $table->string('thumbnail');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('preview_description');
            $table->longText('description');
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->dateTime('post_schedule')->index();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        /*
        |--------------------------------------------------------------------------
        | 15. Config Web (singleton)
        |--------------------------------------------------------------------------
        */
        Schema::create('config_webs', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('favicon');
            $table->string('title');
            $table->string('subtitle');
            $table->string('website_url');
            $table->string('copyright');
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | 16–17. Social Media & Social Media Images   (replaces media_sosials …)
        |--------------------------------------------------------------------------
        */
        Schema::create('social_medias', function (Blueprint $table) {
            $table->id();
            $table->string('platform');          // e.g. “Instagram”
            $table->string('link_platform');               // e.g. “https://instagram.com/…”
            $table->string('slug')->unique();    // e.g. “instagram”
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });

        Schema::create('social_media_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_media_id')
                ->constrained('social_medias')
                ->cascadeOnDelete();
            $table->string('image');
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | 18–19. Kontak & Form Kontak
        |--------------------------------------------------------------------------
        */
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('no_telepon');
            $table->string('no_telegram');
            $table->string('email');
            $table->text('alamat');
            $table->text('jam_kerja');
            $table->text('embed_map');
            $table->timestamps();
        });

        Schema::create('form_kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telepon');
            $table->text('pesan');
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | 20. Breadcrumbs (singleton)
        |--------------------------------------------------------------------------
        */
        Schema::create('breadcrumbs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Drop in reverse order to satisfy FK constraints
        Schema::dropIfExists('breadcrumbs');
        Schema::dropIfExists('form_kontaks');
        Schema::dropIfExists('kontaks');
        Schema::dropIfExists('social_media_images');
        Schema::dropIfExists('social_medias');
        Schema::dropIfExists('config_webs');
        Schema::dropIfExists('artikels');
        Schema::dropIfExists('kategori_artikels');
        Schema::dropIfExists('hubungi_kamis');
        Schema::dropIfExists('galeri_produks');
        Schema::dropIfExists('hero_galeri_produks');
        Schema::dropIfExists('keunggulan_items');
        Schema::dropIfExists('keunggulans');
        Schema::dropIfExists('produks');
        Schema::dropIfExists('banner_layanan_items');
        Schema::dropIfExists('banner_layanans');
        Schema::dropIfExists('tentang_kamis');
        Schema::dropIfExists('hero_items');
        Schema::dropIfExists('heros');
        Schema::dropIfExists('sliders');
    }
};
