<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroGaleriProduk;
use App\Models\GaleriProduk;
use Illuminate\Http\Request;

class GaleriProdukController extends Controller
{
    public function index()
    {
        $hero   = HeroGaleriProduk::firstOrCreate([]);
        $galeri = $hero->galeri;
        return view('admin.galeri-produk.index', compact('hero','galeri'));
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
