<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormKontak;
use Illuminate\Http\Request;

class FormKontakController extends Controller
{
    public function index()
    {
        $pesan = FormKontak::latest()->paginate(25);
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
