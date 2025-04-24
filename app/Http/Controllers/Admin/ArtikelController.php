<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('kategori')->latest()->paginate(20);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $kategori = KategoriArtikel::pluck('title','id');
        return view('admin.artikel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        // Upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('artikel', 'public');
        }

        Artikel::create($data);
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel dibuat');
    }

    public function edit(Artikel $artikel)
    {
        $kategori = KategoriArtikel::pluck('title','id');
        return view('admin.artikel.edit', compact('artikel','kategori'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $data = $this->validated($request, $artikel->id);

        // Upload thumbnail
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($artikel->thumbnail && Storage::disk('public')->exists($artikel->thumbnail)) {
                Storage::disk('public')->delete($artikel->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('artikel', 'public');
        } else {
            // Jika tidak ada file yang diupload, tetap gunakan thumbnail yang sudah ada
            $data['thumbnail'] = $artikel->thumbnail;
        }

        $artikel->update($data);
        return back()->with('success', 'Artikel diperbarui');
    }

    public function destroy(Artikel $artikel)
    {
        // Hapus thumbnail jika ada
        if ($artikel->thumbnail && Storage::disk('public')->exists($artikel->thumbnail)) {
            Storage::disk('public')->delete($artikel->thumbnail);
        }

        $artikel->delete();
        return back()->with('success', 'Artikel dihapus');
    }

    /**
     * Upload gambar untuk CKEditor
     */
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');

            // Validasi file
            $request->validate([
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
            ]);

            // Generate nama file unik
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            // Simpan file
            $path = $file->storeAs('artikel/konten', $fileName, 'public');

            // URL untuk akses gambar
            $url = asset('storage/' . $path);

            // Format response sesuai dengan kebutuhan CKEditor
            return response()->json([
                'uploaded' => 1,
                'fileName' => $fileName,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'Gagal mengupload gambar.']
        ]);
    }

    /* ---------------------- Private ----------------------------------- */
    private function validated(Request $request, $ignoreId=null)
    {
        $idRule = $ignoreId ? ",$ignoreId" : '';

        $rules = [
            'kategori_artikel_id' => 'required|exists:kategori_artikels,id',
            'title'               => 'required|string|max:255',
            'preview_description' => 'required|string|max:500',
            'description'         => 'required|string',
            'meta_keyword'        => 'nullable|string|max:255',
            'meta_description'    => 'nullable|string|max:255',
            'post_schedule'       => 'required|date',
            'is_active'           => 'nullable|boolean',
        ];

        // Jika tambah baru, thumbnail wajib
        // Jika edit, thumbnail boleh kosong (tetap pakai yang lama)
        if (!$ignoreId) {
            $rules['thumbnail'] = 'required|image|max:5120';
        } else {
            $rules['thumbnail'] = 'nullable|image|max:5120';
        }

        $data = $request->validate($rules);
        $data['slug'] = Str::slug($data['title'].$idRule);

        // Set is_active jika tidak ada dalam request
        if (!isset($data['is_active'])) {
            $data['is_active'] = 0;
        }

        return $data;
    }
}
