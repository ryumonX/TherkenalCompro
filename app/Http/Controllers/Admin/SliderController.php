<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /* ----------------------- INDEX ------------------------------------ */
    public function index()
    {
        $sliders = Slider::latest()->paginate(12);
        return view('admin.slider.index', compact('sliders'));
    }

    /* ----------------------- CREATE ----------------------------------- */
    public function create()
    {
        return view('admin.slider.create');
    }

    /* ----------------------- STORE ------------------------------------ */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image'      => ['required', 'image', 'max:5120'],
            'is_active'  => ['nullable', 'boolean'],
        ]);

        // Jika is_active tidak ada dalam request, set nilainya menjadi false
        if (!isset($data['is_active'])) {
            $data['is_active'] = false;
        }

        // simpan file gambar
        $data['image'] = $request->file('image')->store('slider', 'public');

        Slider::create($data);
        return redirect()->route('admin.slider.index')
                         ->with('success', 'Slider berhasil ditambahkan');
    }

    /* ----------------------- EDIT ------------------------------------- */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /* ----------------------- UPDATE ----------------------------------- */
    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'image'      => ['nullable', 'image', 'max:5120'],
            'is_active'  => ['nullable', 'boolean'],
        ]);

        // Jika is_active tidak ada dalam request, set nilainya menjadi false
        if (!isset($data['is_active'])) {
            $data['is_active'] = false;
        }

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            $data['image'] = $request->file('image')->store('slider', 'public');
        }

        $slider->update($data);
        return back()->with('success', 'Slider diperbarui');
    }

    /* ----------------------- DESTROY ---------------------------------- */
    public function destroy(Slider $slider)
    {
        // Hapus gambar dari storage
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();
        return back()->with('success', 'Slider dihapus');
    }
}
