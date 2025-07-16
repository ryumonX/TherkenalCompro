<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\HeroItem;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /* --- Tampilkan form singleton + daftar item ---------------------- */
    public function index()
    {
        $hero = Hero::firstOrCreate(
            [],
            [
                'title' => 'Selamat Datang di PT. Testing',
                'subtitle' => 'Kami adalah perusahaan yang bergerak di bidang industri makanan dan minuman.',
            ]
        );
        $heroItems  = HeroItem::all();

        return view('admin.hero.index', compact('hero', 'heroItems'));
    }

    /* --- Update teks Hero -------------------------------------------- */
    public function updateHero(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        Hero::first()->update($data);
        return back()->with('success', 'Teks Hero diperbarui');
    }

    /* ---------- CRUD HeroItem ---------------------------------------- */
    public function storeItem(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);
        $heroItem = new HeroItem();
        $heroItem->title = $data['title'];
        $heroItem->subtitle = $data['subtitle'];

        $heroItem->save();

        return back()->with('success', 'Item Hero ditambahkan');
    }

    public function editItem(HeroItem $item)
    {
        return view('admin.hero.edit-item', compact('item'));
    }

    public function updateItem(Request $request, HeroItem $item)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        $item->update($data);
        return back()->with('success', 'Item Hero diperbarui');
    }

    public function destroyItem(HeroItem $item)
    {
        $item->delete();
        return back()->with('success', 'Item Hero dihapus');
    }
}
