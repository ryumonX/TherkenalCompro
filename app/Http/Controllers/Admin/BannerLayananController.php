<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerLayanan;
use App\Models\BannerLayananItem;
use Illuminate\Http\Request;

class BannerLayananController extends Controller
{
    // Menampilkan Banner Layanan dan Item yang terkait
    public function index()
    {
        $banner = BannerLayanan::firstOrCreate(
            [],
            [
                'title'       => 'Layanan Unggulan Kami',
                'subtitle'    => 'Subtitle Default',
                'description' => 'Deskripsi default untuk banner layanan.',
            ]
        );
        $items = BannerLayananItem::latest()->get();
        return view('admin.bannerlayanan.index', compact('banner', 'items'));
    }

    // Mengupdate data Banner Layanan
    public function updateBanner(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update Banner Layanan pertama
        BannerLayanan::first()->update($data);

        return back()->with('success', 'Banner layanan diperbarui');
    }

    /* -------- Item CRUD ---------------------------------------------- */

    // Menyimpan item baru di Banner Layanan
    public function storeItem(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image_icon' => 'required|image|max:5120',
        ]);

        // Simpan item baru tanpa relasi langsung ke banner
        $data['image_icon'] = $request->file('image_icon')->store('banner-layanan', 'public');
        BannerLayananItem::create($data);

        return back()->with('success', 'Item banner ditambahkan');
    }

    // Menampilkan form edit item
    public function editItem(BannerLayananItem $item)
    {
        return view('admin.bannerlayanan.edit-item', compact('item'));
    }

    // Mengupdate item Banner Layanan
    public function updateItem(Request $request, BannerLayananItem $item)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image_icon' => 'nullable|image|max:5120',
        ]);

        // Jika ada file gambar baru, simpan ke folder public
        if ($request->hasFile('image_icon')) {
            $data['image_icon'] = $request->file('image_icon')->store('banner-layanan', 'public');
        }

        // Update item
        $item->update($data);
        return back()->with('success', 'Item banner diperbarui');
    }

    // Menghapus item Banner Layanan
    public function destroyItem(BannerLayananItem $item)
    {
        $item->delete();
        return back()->with('success', 'Item banner dihapus');
    }
}
