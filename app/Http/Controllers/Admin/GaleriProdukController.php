<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroGaleriProduk;
use App\Models\GaleriProduk;
use Illuminate\Http\Request;

class GaleriProdukController extends Controller
{
    public function index(Request $request)
    {
        $hero = HeroGaleriProduk::firstOrCreate(
            [],
            [
                'title'       => 'Galeri Produk Kami',
                'subtitle'    => 'Lihat koleksi produk terbaik dari kami',
                'description' => 'Deskripsi default untuk bagian galeri produk.',
            ]
        );

        // Build gallery query
        $query = $hero->galeri();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $galeri = $query->get();

        return view('admin.galeri-produk.index', compact('hero', 'galeri'));
    }

    public function updateHero(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        HeroGaleriProduk::first()->update($data);
        return back()->with('success', 'Header Galeri Produk diperbarui');
    }

    /* ---------- Galeri CRUD ----------------------------------------- */
    public function storeItem(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $data['image'] = $request->file('image')->store('galeri-produk', 'public');
        HeroGaleriProduk::first()->galeri()->create($data);
        return back()->with('success', 'Foto produk ditambahkan');
    }

    public function editItem(GaleriProduk $item)
    {
        return view('admin.galeri-produk.edit-item', compact('item'));
    }

    public function updateItem(Request $request, GaleriProduk $item)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('galeri-produk', 'public');
        }
        $item->update($data);
        return back()->with('success', 'Foto produk diperbarui');
    }

    public function destroyItem(GaleriProduk $item)
    {
        $item->delete();
        return back()->with('success', 'Foto produk dihapus');
    }
}
