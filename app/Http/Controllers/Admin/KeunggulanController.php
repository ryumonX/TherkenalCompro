<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keunggulan;
use App\Models\KeunggulanItem;
use Illuminate\Http\Request;

class KeunggulanController extends Controller
{
    public function index()
    {
        $keunggulan = Keunggulan::firstOrCreate(
            [],
            [
                'title'       => 'Keunggulan Produk Kami',
                'subtitle'    => 'Subtitle Default untuk Keunggulan',
                'description' => 'Deskripsi default untuk bagian keunggulan.',
            ]
        );
        $items      = KeunggulanItem::latest()->get();
        return view('admin.keunggulan.index', compact('keunggulan','items'));
    }

    public function updateIntro(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Keunggulan::first()->update($data);
        return back()->with('success', 'Intro Keunggulan diperbarui');
    }

    /* ---------- Item CRUD -------------------------------------------- */
    public function storeItem(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image'    => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('keunggulan', 'public');

        }

        $keunggulan = new KeunggulanItem();
        $keunggulan->title = $data['title'];
        $keunggulan->subtitle = $data['subtitle'];
        $keunggulan->image = $data['image'];
        $keunggulan->save();

        return back()->with('success', 'Item Keunggulan ditambahkan');
    }

    public function editItem(KeunggulanItem $item)
    {
        return view('admin.keunggulan.edit-item', compact('item'));
    }

    public function updateItem(Request $request, KeunggulanItem $item)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image'    => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('keunggulan', 'public');
        }

        $item->update($data);
        return back()->with('success', 'Item Keunggulan diperbarui');
    }

    public function destroyItem(KeunggulanItem $item)
    {
        $item->delete();
        return back()->with('success', 'Item Keunggulan dihapus');
    }
}
