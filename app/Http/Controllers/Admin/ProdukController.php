<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::latest();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        $produks = $query->paginate(20)
            ->appends(['search' => $request->search]);
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image'       => 'required|image|max:5120',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'is_active'   => 'required|boolean',
            'price'       => 'required|integer|min:0',
        ]);

        $data['image'] = $request->file('image')->store('produk', 'public');
        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk ditambahkan');
    }

    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'image'       => 'nullable|image|max:5120',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'is_active'   => 'required|boolean',
            'price'       => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('produk', 'public');
        }

        $produk->update($data);
        return back()->with('success', 'Produk diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return back()->with('success', 'Produk dihapus');
    }
}
