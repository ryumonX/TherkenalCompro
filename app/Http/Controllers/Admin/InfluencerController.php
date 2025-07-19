<?php

namespace App\Http\Controllers\Admin;

use App\Models\Influencer;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfluencerController extends Controller
{
    public function index()
    {
        $influencers = Influencer::latest()->get();
        return view('admin.influencers.index', compact('influencers'));
    }

    public function create()
    {
        return view('admin.influencers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image')->store('influencer', 'public');

        Influencer::create([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.influencers.index')->with('success', 'Influencer berhasil ditambahkan.');
    }

    public function edit(Influencer $influencer)
    {
        return view('admin.influencers.edit', compact('influencer'));
    }

    public function update(Request $request, Influencer $influencer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data['name'] = $request->name;

        if ($request->hasFile('image')) {
            // Hapus file lama
            Storage::disk('public')->delete($influencer->image);
            // Simpan file baru
            $data['image'] = $request->file('image')->store('influencer', 'public');
        }

        $influencer->update($data);

        return redirect()->route('admin.influencers.index')->with('success', 'Influencer diperbarui.');
    }

    public function destroy(Influencer $influencer)
    {
        Storage::disk('public')->delete($influencer->image);
        $influencer->delete();

        return redirect()->route('admin.influencers.index')->with('success', 'Influencer dihapus.');
    }
}
