<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Models\SocialMediaImage;
use Illuminate\Http\Request;

class SosialMediaController extends Controller
{
    public function index()
    {
        $platforms = SocialMedia::with('images')->paginate(15);
        return view('admin.sosial-media.index', compact('platforms'));
    }

    public function create()
    {
        return view('admin.sosial-media.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'platform'   => 'required|string|max:50',
            'link_platform'   => 'required|string',
            'slug'       => 'required|string|max:50|unique:social_medias,slug',
            'is_active'  => 'nullable|boolean',
        ]);

        SocialMedia::create($data);
        return redirect()->route('admin.sosial-media.index')->with('success','Platform ditambahkan');
    }

    public function edit($id)
    {
        $sosialMedium = SocialMedia::findOrFail($id);
        return view('admin.sosial-media.edit', ['platform' => $sosialMedium]);
    }

    public function update(Request $request, $id)
    {
        $sosialMedium = SocialMedia::findOrFail($id);
        try {
            \Log::info('Mencoba update sosial media', [
                'id' => $sosialMedium->id,
                'data' => $request->all()
            ]);

            $data = $request->validate([
                'platform'   => 'required|string|max:50',
                'link_platform'   => 'required|string',
                'slug'       => 'required|string|max:50|unique:social_medias,slug,' . $sosialMedium->id,
                'is_active'  => 'nullable|boolean',
            ]);

            $sosialMedium->update($data);

            \Log::info('Update berhasil untuk sosial media ID: ' . $sosialMedium->id);

            return back()->with('success','Platform diperbarui');
        } catch (\Exception $e) {
            \Log::error('Error pada update sosial media: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $sosialMedium = SocialMedia::findOrFail($id);
        $sosialMedium->delete();
        return back()->with('success','Platform dihapus');
    }

    /* ---------- Icon CRUD -------------------------------------------- */
    public function storeIcon(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'required|image|max:5120',
        ]);

        $data['image'] = $request->file('image')->store('sosial-media', 'public');
        $socialMediaImage = new SocialMediaImage();
        $socialMediaImage->image = $data['image'];
        $socialMediaImage->social_media_id = $id;
        $socialMediaImage->save();

        return back()->with('success','Icon ditambahkan');
    }

    public function destroyIcon($id)
    {
        $icon = SocialMediaImage::findOrFail($id);

        $icon->delete();
        return back()->with('success','Icon dihapus');
    }
}