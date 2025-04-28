<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Slider;
use App\Models\SocialMedia;
use App\Models\Artikel;
use App\Models\ConfigWeb;
use App\Models\TentangKami;
use App\Models\Kontak;
use App\Models\BannerLayanan;
use App\Models\BannerLayananItem;
use App\Models\Hero;
use App\Models\HeroItem;
use App\Models\HubungiKami;
use App\Models\Keunggulan;
use App\Models\KeunggulanItem;
use App\Models\Breadcrumb;
use App\Models\FormKontak;
use App\Models\GaleriProduk;
use App\Models\HeroGaleriProduk;
use App\Models\KategoriArtikel;
use App\Models\SocialMediaImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            // Model dengan is_active yang perlu difilter
            'sliders' => Slider::active()->latest()->get(),
            'produk' => Produk::active()->latest()->get(),
            'artikel' => Artikel::active()->scheduled()->latest()->get(),
            'kategoriArtikel' => KategoriArtikel::whereHas('artikels', function($q) {
                $q->active()->scheduled();
            })->get(),

            // Model dengan relasi yang memiliki is_active
            'bannerLayananItems' => BannerLayananItem::all(),
            'heroItems' => HeroItem::latest()->get(),
            'keunggulanItems' => KeunggulanItem::all(),
            'galeriProduk' => GaleriProduk::whereHas('heroSection', function($q) {})->latest()->get(),

            // Model singleton (yang biasanya hanya 1 record, tanpa is_active)
            'tentangKami' => TentangKami::first(),
            'bannerLayanan' => BannerLayanan::first(),
            'hero' => Hero::first(),
            'keunggulan' => Keunggulan::first(),
            'heroGaleriProduk' => HeroGaleriProduk::first(),
        ];

        return view('index', $data);
    }

    /**
     * Halaman Detail Artikel
     */
    public function artikelDetail($slug)
    {
        $artikel = Artikel::findBySlug($slug);

        $data = [
            'artikel' => $artikel,
            'artikelTerkait' => Artikel::getRelated($artikel),

            // Data umum yang diperlukan di semua halaman
            'configWeb' => ConfigWeb::first(),
            'socialMedia' => SocialMedia::active()->with('images')->get(),
            'kontak' => Kontak::first(),
            'breadcrumb' => Breadcrumb::first(),
        ];

        return view('artikel-detail', $data);
    }

    /**
     * Halaman Daftar Artikel
     */
    public function artikelIndex(Request $request)
    {
        $query = Artikel::active()->scheduled();

        // Filter berdasarkan pencarian jika ada
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('preview_description', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by kategori jika ada
        if ($request->has('kategori')) {
            $query->whereHas('kategori', function($q) use($request) {
                $q->where('slug', $request->kategori);
            });
        }

        // Tambahkan debug info
        $artikels = $query->latest()->paginate(10);
        $kategories = KategoriArtikel::whereHas('artikels', function($q) {
            $q->active()->scheduled();
        })->get();

        $data = [
            'artikel' => $artikels,
            'kategori' => $kategories,
            'artikelTerbaru' => Artikel::active()->scheduled()->latest()->take(4)->get(),

            // Data umum
            'configWeb' => ConfigWeb::first(),
            'socialMedia' => SocialMedia::active()->with('images')->get(),
            'kontak' => Kontak::first(),
            'breadcrumb' => Breadcrumb::first(),
        ];

        return view('artikel', $data);
    }

    /**
     * Halaman Detail Produk
     */
    public function produkDetail($id)
    {
        $produk = Produk::active()->findOrFail($id);

        $data = [
            'produk' => $produk,
            'produkLainnya' => Produk::active()
                ->where('id', '!=', $produk->id)
                ->latest()
                ->take(4)
                ->get(),

            // Data umum
            'configWeb' => ConfigWeb::first(),
            'socialMedia' => SocialMedia::active()->with('images')->get(),
            'kontak' => Kontak::first(),
            'breadcrumb' => Breadcrumb::first(),
        ];

        return view('produk-detail', $data);
    }

    /**
     * Halaman Daftar Produk
     */
    public function produkIndex()
    {
        $data = [
            'produk' => Produk::active()->latest()->paginate(12),
            'artikel' => Artikel::active()->scheduled()->latest()->get(),

            // Data umum
            'configWeb' => ConfigWeb::first(),
            'socialMedia' => SocialMedia::active()->with('images')->get(),
            'kontak' => Kontak::first(),
            'breadcrumb' => Breadcrumb::first(),
        ];

        return view('produk', $data);
    }

    /**
     * Halaman Kontak
     */
    public function kontak()
    {
        $data = [
            'kontak' => Kontak::first(),
            'hubungiKami' => HubungiKami::first(),

            // Data umum
            'configWeb' => ConfigWeb::first(),
            'socialMedia' => SocialMedia::active()->with('images')->get(),
            'breadcrumb' => Breadcrumb::first(),
        ];

        return view('kontak', $data);
    }

    /**
     * Proses Kirim Pesan Kontak
     */
    public function kirimPesan(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'no_telepon' => 'required|string|max:20',
            'pesan' => 'required|string|max:1000',
        ]);

        FormKontak::create($validated);

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda.');
    }

    /**
     * Halaman Tentang Kami
     */
    public function tentangKami()
    {
        $data = [
            'tentangKami' => TentangKami::first(),
            'keunggulan' => Keunggulan::first(),
            'keunggulanItems' => KeunggulanItem::all(),

            // Data umum
            'socialMedia' => SocialMedia::active()->with('images')->get(),
            'kontak' => Kontak::first(),
            'produk' => Produk::active()->latest()->get(),
            'artikel' => Artikel::active()->scheduled()->latest()->get(),


            // Model singleton (yang biasanya hanya 1 record, tanpa is_active)
            'configWeb' => ConfigWeb::first(),
            'tentangKami' => TentangKami::first(),
            'kontak' => Kontak::first(),
            'bannerLayanan' => BannerLayanan::first(),
            'hero' => Hero::first(),
            'hubungiKami' => HubungiKami::first(),
            'keunggulan' => Keunggulan::first(),
            'breadcrumb' => Breadcrumb::first(),
            'heroGaleriProduk' => HeroGaleriProduk::first(),
        ];

        return view('tentang-kami', $data);
    }
}