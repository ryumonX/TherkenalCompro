<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\GaleriProduk;
use App\Models\FormKontak;
use App\Models\User;
use App\Models\ConfigWeb;
use App\Models\TentangKami;
use App\Models\Breadcrumb;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan pesan hanya dari hari ini
        $today = Carbon::today();
        $pesanHariIni = FormKontak::whereDate('created_at', $today)
                                 ->latest()
                                 ->take(5)
                                 ->get();

        // Statistik Jumlah Data
        $data = [
            'totalProduk' => Produk::count(),
            'totalArtikel' => Artikel::count(),
            'totalKategori' => KategoriArtikel::count(),
            'totalGaleri' => GaleriProduk::count(),
            'totalPesan' => FormKontak::count(),
            'totalUser' => User::count(),

            // Pesan Terbaru Hari Ini
            'pesanTerbaru' => $pesanHariIni,
            'adaPesanHariIni' => $pesanHariIni->count() > 0,

            // Artikel Terbaru
            'artikelTerbaru' => Artikel::latest()->take(4)->get(),

            // Produk Terbaru
            'produkTerbaru' => Produk::latest()->take(4)->get(),

            // Status Komponen Website
            'configWebStatus' => ConfigWeb::first() && !empty(ConfigWeb::first()->title),
            'tentangKamiStatus' => TentangKami::first() && !empty(TentangKami::first()->title),
            'breadcrumbStatus' => Breadcrumb::first() && !empty(Breadcrumb::first()->title),
            'kontakStatus' => Kontak::first() && (!empty(Kontak::first()->email) || !empty(Kontak::first()->no_telepon)),
        ];

        return view('dashboard', $data);
    }
}