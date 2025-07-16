<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function edit()
    {
        $kontak = Kontak::firstOrCreate(
            [],
            [
                'no_telepon'  => '081234567890',
                'no_telegram' => '081234567890',
                'email'       => 'admin@example.com',
                'alamat'      => 'Isi alamat lengkap perusahaan di sini.',
                'jam_kerja'   => 'Senin - Jumat, 09:00 - 17:00',
                'embed_map'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.292484050212!2d106.8037617!3d-6.6102797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e53880a26d%3A0x6b2b168c8a1b948!2sTugu%20Kujang!5e0!3m2!1sen!2sid!4v1721105047464!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ]
        );
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
