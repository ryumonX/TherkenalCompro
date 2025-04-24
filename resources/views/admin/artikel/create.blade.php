@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-lg font-semibold text-gray-800 mb-4">Tambah Artikel</h1>

        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Edit Produk</h1>
            <a href="{{ route('admin.produk.index') }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.artikel._form', ['kategori' => $kategori])
        </form>
    </div>
@endsection
