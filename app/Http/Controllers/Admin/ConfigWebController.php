<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfigWeb;
use Illuminate\Http\Request;

class ConfigWebController extends Controller
{
    public function edit()
    {
        $config = ConfigWeb::firstOrCreate([]);
        return view('admin.config-web.index', compact('config'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'logo'          => 'nullable|image|max:5120',
            'favicon'       => 'nullable|file|mimes:jpg,jpeg,png,gif,ico,svg|max:5120',
            'title'         => 'required|string|max:100',
            'subtitle'      => 'required|string|max:150',
            'website_url'   => 'required|string|max:255',
            'copyright'     => 'required|string|max:150',
        ]);

        $config = ConfigWeb::first();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('config-web', 'public');
        }

        if ($request->hasFile('favicon')) {
            $data['favicon'] = $request->file('favicon')->store('config-web', 'public');
        }

        $config->update($data);
        return back()->with('success', 'Konfigurasi situs diperbarui');
    }
}
