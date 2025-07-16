<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function edit()
    {
        $tentangKami = TentangKami::firstOrCreate(
            [],
            [
                'title'       => 'Tentang Kami',
                'subtitle'    => 'Subtitle Default',
                'image'       => 'images/placeholder.jpg',
                'description' => 'Kami adalah perusahaan yang bergerak di bidang industri makanan dan minuman.',
            ]
        );
        return view('admin.tentangkami.index', compact('tentangKami'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'image'       => 'nullable|image|max:5120',
            'title'       => 'required|string|max:255',
            'subtitle'    => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $tentangKami = TentangKami::first();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('tentang-kami', 'public');
        }

        $tentangKami->update($data);
        return back()->with('success', 'Konten Tentang Kami diperbarui');
    }
}
