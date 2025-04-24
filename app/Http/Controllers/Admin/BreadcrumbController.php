<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Breadcrumb;
use Illuminate\Http\Request;

class BreadcrumbController extends Controller
{
    public function edit()
    {
        $breadcrumb = Breadcrumb::firstOrCreate([]);
        return view('admin.breadcrumb.index', compact('breadcrumb'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title'    => 'nullable|string|max:100',
            'subtitle' => 'nullable|string|max:150',
        ]);

        Breadcrumb::first()->update($data);
        return back()->with('success','Breadcrumb default diperbarui');
    }
}
