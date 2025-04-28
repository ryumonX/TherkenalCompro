<?php

namespace App\Providers;

use App\Models\Breadcrumb;
use App\Models\ConfigWeb;
use App\Models\Kontak;
use App\Models\SocialMedia;
use App\Models\Produk;
use App\Models\Artikel;
use App\Models\HubungiKami;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share common data with all views
        View::composer('*', function ($view) {
            $view->with([
                'configWeb' => ConfigWeb::first(),
                'kontak' => Kontak::first(),
                'breadcrumb' => Breadcrumb::first(),
                'hubungiKami' => HubungiKami::first(),
                'socialMedia' => SocialMedia::active()->with('images')->get(),
                'footerProduk' => Produk::active()->latest()->take(5)->get(),
                'footerArtikel' => Artikel::active()->scheduled()->latest()->take(2)->get(),
            ]);
        });
    }
}
