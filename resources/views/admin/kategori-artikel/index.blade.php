@extends('layouts.app')

@section('content')
    {{-- Flash --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- CARD WRAPPER --}}
    <div class="bg-white shadow rounded-lg">
        {{-- Header --}}
        <div class="px-6 py-4 border-b flex items-center justify-between">
            <h1 class="text-lg font-semibold text-gray-800">Kategori Artikel</h1>
        </div>

        {{-- Add form --}}
        <div class="px-6 py-4 border-b">
            <form action="{{ route('admin.kategori-artikel.store') }}" method="POST" class="flex flex-col sm:flex-row gap-3">
                @csrf
                <input name="title" placeholder="Nama kategori..."
                       value="{{ old('title') }}"
                       class="flex-1 border-gray-300 rounded px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded">
                    Tambah
                </button>
            </form>
            @error('title')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Table list --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm whitespace-nowrap">
                <thead class="bg-gray-50">
                <tr class="text-left text-gray-600 font-medium">
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-4 py-3">Slug</th>
                    <th class="px-4 py-3 w-24"></th>
                </tr>
                </thead>
                <tbody class="divide-y">
                @forelse ($kategori as $row)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-gray-800">{{ $row->title }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $row->slug }}</td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('admin.kategori-artikel.edit', $row) }}"
                               class="text-indigo-600 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('admin.kategori-artikel.destroy', $row) }}"
                                  onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Del</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada kategori.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-4">{{ $kategori->links() }}</div>
    </div>
@endsection
