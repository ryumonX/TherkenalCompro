<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormKontak;
use Illuminate\Http\Request;

class FormKontakController extends Controller
{
    public function index(Request $request)
    {
        $query = FormKontak::query();
        // Search by name, email, or message
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function($q) use ($s) {
                $q->where('nama', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('pesan', 'like', "%{$s}%");
            });
        }
        // Order: newest or oldest
        if ($request->order === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }
        // Paginate with query params
        $pesan = $query->paginate(25)
            ->appends($request->only('search','order'));
        return view('admin.form-kontak.index', compact('pesan'));
    }

    public function show(FormKontak $form_kontak)
    {
        return view('admin.form-kontak.show', ['pesan' => $form_kontak]);
    }

    public function destroy(FormKontak $form_kontak)
    {
        $form_kontak->delete();
        return back()->with('success','Pesan dihapus');
    }
}
