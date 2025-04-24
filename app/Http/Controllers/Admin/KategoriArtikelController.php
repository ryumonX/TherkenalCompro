<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $kategori = KategoriArtikel::latest()->paginate(15);
        return view('admin.kategori-artikel.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['title' => 'required|string|max:255']);
        $data['slug'] = Str::slug($data['title']);

        KategoriArtikel::create($data);
        return back()->with('success', 'Kategori dibuat');
    }

    public function edit(KategoriArtikel $kategori_artikel)
    {
        return view('admin.kategori-artikel.edit', compact('kategori_artikel'));
    }

    public function update(Request $request, KategoriArtikel $kategori_artikel)
    {
        $data = $request->validate(['title' => 'required|string|max:255']);
        $data['slug'] = Str::slug($data['title']);

        $kategori_artikel->update($data);
        return back()->with('success', 'Kategori diperbarui');
    }

    public function destroy(KategoriArtikel $kategori_artikel)
    {
        $kategori_artikel->delete();
        return back()->with('success', 'Kategori dihapus');
    }
}
