<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function edit()
    {
        $kontak = Kontak::firstOrCreate([]);
        return view('admin.kontak.index', compact('kontak'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'no_telepon' => 'required|string|max:30',
            'no_telegram'=> 'required|string|max:30',
            'email'      => 'required|email|max:100',
            'alamat'     => 'required|string',
            'jam_kerja'  => 'nullable|string',
            'embed_map'  => 'required|string',
        ]);

        Kontak::first()->update($data);
        return back()->with('success','Informasi kontak diperbarui');
    }
}
