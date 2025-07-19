<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\BannerLayananController;
use App\Http\Controllers\Admin\BreadcrumbController;
use App\Http\Controllers\Admin\ConfigWebController;
use App\Http\Controllers\Admin\FormKontakController;
use App\Http\Controllers\Admin\GaleriProdukController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HubungiKamiController;
use App\Http\Controllers\Admin\KategoriArtikelController;
use App\Http\Controllers\Admin\KeunggulanController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SosialMediaController;
use App\Http\Controllers\Admin\TentangKamiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InfluencerController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

/* --------------------------------------------------------------------------
| Halaman publik
|--------------------------------------------------------------------------*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::post('/kirim-pesan', [HomeController::class, 'kirimPesan'])->name('kirim-pesan');
Route::get('/produk', [HomeController::class, 'produkIndex'])->name('produk.index');
Route::get('/produk/{id}', [HomeController::class, 'produkDetail'])->name('produk.detail');
Route::get('/artikel', [HomeController::class, 'artikelIndex'])->name('artikel.index');
Route::get('/artikel/{slug}', [HomeController::class, 'artikelDetail'])->name('artikel.detail');


// Dashboard
Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

/* --------------------------------------------------------------------------
| Profil Pengguna
|--------------------------------------------------------------------------*/
Route::middleware('auth')->group(function () {
    Route::get('/profile',  [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* --------------------------------------------------------------------------
| Admin (CMS) – membutuhkan login
|--------------------------------------------------------------------------*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Slider – resource standar (tanpa show)
        |--------------------------------------------------------------------------
        */
        Route::resource('slider', \App\Http\Controllers\Admin\SliderController::class)
            ->except('show')
            ->names('slider');

        /*
        |--------------------------------------------------------------------------
        | Produk – resource standar
        |--------------------------------------------------------------------------
        */
        Route::resource('produk', \App\Http\Controllers\Admin\ProdukController::class)
            ->except('show')
            ->names('produk');


        /*
        |--------------------------------------------------------------------------
        | Hero (singleton) + HeroItem
        |--------------------------------------------------------------------------
        */
        Route::get('hero',           [\App\Http\Controllers\Admin\HeroController::class, 'index'])->name('hero.index');
        Route::post('hero',          [\App\Http\Controllers\Admin\HeroController::class, 'updateHero'])->name('hero.update');

        Route::post('hero/item',                     [\App\Http\Controllers\Admin\HeroController::class, 'storeItem'])->name('hero.item.store');
        Route::get('hero/item/{item}/edit',          [\App\Http\Controllers\Admin\HeroController::class, 'editItem'])->name('hero.item.edit');
        Route::put('hero/item/{item}',               [\App\Http\Controllers\Admin\HeroController::class, 'updateItem'])->name('hero.item.update');
        Route::delete('hero/item/{item}',            [\App\Http\Controllers\Admin\HeroController::class, 'destroyItem'])->name('hero.item.destroy');

        /*
        |--------------------------------------------------------------------------
        | Tentang Kami (singleton)
        |--------------------------------------------------------------------------
        */
        Route::get('tentang-kami',  [\App\Http\Controllers\Admin\TentangKamiController::class, 'edit'])->name('tentang-kami.edit');
        Route::put('tentang-kami',  [\App\Http\Controllers\Admin\TentangKamiController::class, 'update'])->name('tentang-kami.update');

        /* ------------------------------------------------------------------
        | Partner
        |------------------------------------------------------------------*/
        Route::resource('partner', PartnerController::class)
            ->except('show')
            ->names('partner')
            ->middleware('auth');

        /*
        |--------------------------------------------------------------------------
        | Banner Layanan + Item
        |--------------------------------------------------------------------------
        */
        Route::get('banner-layanan',            [\App\Http\Controllers\Admin\BannerLayananController::class, 'index'])->name('banner-layanan.index');
        Route::put('banner-layanan',            [\App\Http\Controllers\Admin\BannerLayananController::class, 'updateBanner'])->name('banner-layanan.update');

        Route::post('banner-layanan/item',                     [\App\Http\Controllers\Admin\BannerLayananController::class, 'storeItem'])->name('banner-layanan.item.store');
        Route::get('banner-layanan/item/{item}/edit',          [\App\Http\Controllers\Admin\BannerLayananController::class, 'editItem'])->name('banner-layanan.item.edit');
        Route::put('banner-layanan/item/{item}',               [\App\Http\Controllers\Admin\BannerLayananController::class, 'updateItem'])->name('banner-layanan.item.update');
        Route::delete('banner-layanan/item/{item}',            [\App\Http\Controllers\Admin\BannerLayananController::class, 'destroyItem'])->name('banner-layanan.item.destroy');

        /* ------------------------------------------------------------------
        | Keunggulan
        |------------------------------------------------------------------*/
        Route::get('keunggulan',                [KeunggulanController::class, 'index'])->name('keunggulan.index')->middleware('auth');
        Route::put('keunggulan',                [KeunggulanController::class, 'updateIntro'])->name('keunggulan.update')->middleware('auth');

        Route::post('keunggulan/item',                     [KeunggulanController::class, 'storeItem'])->name('keunggulan.item.store')->middleware('auth');
        Route::get('keunggulan/item/{item}/edit',         [KeunggulanController::class, 'editItem'])->name('keunggulan.item.edit')->middleware('auth');
        Route::put('keunggulan/item/{item}',              [KeunggulanController::class, 'updateItem'])->name('keunggulan.item.update')->middleware('auth');
        Route::delete('keunggulan/item/{item}',              [KeunggulanController::class, 'destroyItem'])->name('keunggulan.item.destroy')->middleware('auth');



        /* ------------------------------------------------------------------
        | influencers
        |------------------------------------------------------------------*/
        Route::get('/influencers', [InfluencerController::class, 'index'])->name('influencers.index')->middleware('auth');
        Route::get('/influencers/item', [InfluencerController::class, 'create'])->name('influencers.create')->middleware('auth');
        Route::post('/influencers', [InfluencerController::class, 'store'])->name('influencers.store')->middleware('auth');
        Route::get('/influencers/{influencer}/edit', [InfluencerController::class, 'edit'])->name('influencers.edit')->middleware('auth');
        Route::put('/influencers/{influencer}', [InfluencerController::class, 'update'])->name('influencers.update')->middleware('auth');
        Route::delete('/influencers/{influencer}', [InfluencerController::class, 'destroy'])->name('influencers.destroy')->middleware('auth');


        /* ------------------------------------------------------------------
        | Galeri Produk
        |------------------------------------------------------------------*/
        Route::get('galeri-produk',                 [GaleriProdukController::class, 'index'])->name('galeri-produk.index')->middleware('auth');
        Route::put('galeri-produk',                 [GaleriProdukController::class, 'updateHero'])->name('galeri-produk.update')->middleware('auth');

        Route::post('galeri-produk/item',                      [GaleriProdukController::class, 'storeItem'])->name('galeri-produk.item.store')->middleware('auth');
        Route::get('galeri-produk/item/{item}/edit',          [GaleriProdukController::class, 'editItem'])->name('galeri-produk.item.edit')->middleware('auth');
        Route::put('galeri-produk/item/{item}',               [GaleriProdukController::class, 'updateItem'])->name('galeri-produk.item.update')->middleware('auth');
        Route::delete('galeri-produk/item/{item}',               [GaleriProdukController::class, 'destroyItem'])->name('galeri-produk.item.destroy')->middleware('auth');

        /* ------------------------------------------------------------------
        | Kategori Artikel & Artikel
        |------------------------------------------------------------------*/
        Route::resource('kategori-artikel', KategoriArtikelController::class)
            ->except(['show', 'create'])
            ->names('kategori-artikel')
            ->middleware('auth');

        Route::resource('artikel', ArtikelController::class)
            ->except('show')
            ->names('artikel')
            ->middleware('auth');

        // Route upload gambar ke CKEditor
        Route::post('artikel/upload-image', [ArtikelController::class, 'uploadImage'])
            ->name('artikel.upload.image')
            ->middleware('auth');

        /* ------------------------------------------------------------------
        | Sosial Media
        |------------------------------------------------------------------*/
        Route::get('sosial-media', [SosialMediaController::class, 'index'])->name('sosial-media.index');
        Route::get('sosial-media/create', [SosialMediaController::class, 'create'])->name('sosial-media.create');
        Route::post('sosial-media', [SosialMediaController::class, 'store'])->name('sosial-media.store');
        Route::get('sosial-media/{id}/edit', [SosialMediaController::class, 'edit'])->name('sosial-media.edit');
        Route::put('sosial-media/{id}', [SosialMediaController::class, 'update'])->name('sosial-media.update');
        Route::delete('sosial-media/{id}', [SosialMediaController::class, 'destroy'])->name('sosial-media.destroy');

        Route::post('sosial-media/{id}/icon', [SosialMediaController::class, 'storeIcon'])
            ->name('sosial-media.icon.store');
        Route::delete('sosial-media/icon/{icon}', [SosialMediaController::class, 'destroyIcon'])
            ->name('sosial-media.icon.destroy');

        /* ---------------------- Config Web ----------------------*/
        Route::get('config-web',  [ConfigWebController::class, 'edit'])->name('config-web.edit')->middleware('auth');
        Route::put('config-web',  [ConfigWebController::class, 'update'])->name('config-web.update')->middleware('auth');

        /* ---------------------- Kontak --------------------------*/
        Route::get('kontak-info', [KontakController::class, 'edit'])->name('kontak.edit')->middleware('auth');
        Route::put('kontak-info', [KontakController::class, 'update'])->name('kontak.update')->middleware('auth');

        /* ---------------------- Hubungi Kami --------------------*/
        Route::get('hubungi-kami', [HubungiKamiController::class, 'edit'])->name('hubungi-kami.edit')->middleware('auth');
        Route::put('hubungi-kami', [HubungiKamiController::class, 'update'])->name('hubungi-kami.update')->middleware('auth');

        /* ---------------------- Breadcrumb ----------------------*/
        Route::get('breadcrumb', [BreadcrumbController::class, 'edit'])->name('breadcrumb.edit')->middleware('auth');
        Route::put('breadcrumb', [BreadcrumbController::class, 'update'])->name('breadcrumb.update')->middleware('auth');

        /* ---------------------- Inbox Form Kontak ---------------*/
        Route::resource('form-kontak', FormKontakController::class)
            ->only(['index', 'show', 'destroy'])
            ->names('form-kontak')
            ->middleware('auth');

        /* ------------------------------------------------------------------
        | User Management
        |------------------------------------------------------------------*/
        Route::resource('users', UserController::class)
            ->except(['show'])
            ->names('users')
            ->middleware('auth');
    });

/* --------------------------------------------------------------------------
| Auth scaffolding (Laravel Breeze/Fortify, dll.)
|--------------------------------------------------------------------------*/
require __DIR__ . '/auth.php';
