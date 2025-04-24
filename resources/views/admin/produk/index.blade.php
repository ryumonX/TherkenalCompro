{{-- produk --}}

@extends('layouts.app')

@section('content')
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg">
        {{-- header + actions --}}
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Daftar Produk</h1>
            <a href="{{ route('admin.produk.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                + Tambah Produk
            </a>
        </div>

        {{-- table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm whitespace-nowrap">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-600 font-medium">
                        <th class="px-6 py-3">Gambar</th>
                        <th class="px-6 py-3">Nama Produk</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 w-24 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($produks as $produk)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">
                                <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->title }}"
                                     class="h-16 w-16 object-cover rounded">
                            </td>
                            <td class="px-6 py-3">
                                <div class="font-medium text-gray-900">{{ $produk->title }}</div>
                                <div class="text-xs text-gray-500 mt-1 line-clamp-1">
                                    {{ Str::limit(strip_tags($produk->description), 80) }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-2 py-0.5 rounded-full text-xs
                                     {{ $produk->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $produk->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.produk.edit', $produk) }}"
                                       class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form method="POST" action="{{ route('admin.produk.destroy', $produk) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Belum ada data produk. Silakan tambahkan produk baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- pagination --}}
        <div class="p-4">
            {{ $produks->links() }}
        </div>
    </div>
@endsection