@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Tambah Produk Baru</h1>
            <a href="{{ route('admin.produk.index') }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <div class="p-6">
            <form method="POST" action="{{ route('admin.produk.store') }}" enctype="multipart/form-data">
                @include('admin.produk.form')
            </form>
        </div>
    </div>
@endsection