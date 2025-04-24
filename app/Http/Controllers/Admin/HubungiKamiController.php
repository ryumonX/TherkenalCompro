<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HubungiKami;
use Illuminate\Http\Request;

class HubungiKamiController extends Controller
{
    public function edit()
    {
        $section = HubungiKami::firstOrCreate([]);
        return view('admin.hubungi-kami.index', compact('section'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'image'       => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hubungi-kami', 'public');
        }

        HubungiKami::first()->update($data);
        return back()->with('success','Section Hubungi Kami diperbarui');
    }
}
