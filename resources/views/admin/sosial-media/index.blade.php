{{-- sosial-media --}}

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
            <h1 class="text-lg font-semibold text-gray-800">Daftar Platform Media Sosial</h1>
            <a href="{{ route('admin.sosial-media.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                + Tambah Platform
            </a>
        </div>

        {{-- table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm whitespace-nowrap">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-600 font-medium">
                        <th class="px-6 py-3">Platform</th>
                        <th class="px-6 py-3">Link</th>
                        <th class="px-6 py-3">Slug</th>
                        <th class="px-6 py-3">Ikon</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 w-24 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($platforms as $platform)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">
                                <div class="font-medium text-gray-900">{{ $platform->platform }}</div>
                            </td>
                            <td class="px-6 py-3 text-gray-500 line-clamp-1">{{ Str::limit($platform->link_platform, 30) }}</td>
                            <td class="px-6 py-3 text-gray-500">{{ $platform->slug }}</td>
                            <td class="px-6 py-3">
                                <div class="flex items-center space-x-2">
                                    @if($platform->images->count() > 0)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $platform->images->first()->image) }}"
                                                 alt="{{ $platform->platform }} icon"
                                                 class="h-8 w-8 object-contain">
                                            <div class="hidden group-hover:block absolute top-0 right-0 -mt-1 -mr-1">
                                                <form method="POST" action="{{ route('admin.sosial-media.icon.destroy', $platform->images->first()) }}"
                                                      onsubmit="return confirm('Yakin ingin menghapus ikon ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white rounded-full p-1 text-xs"
                                                            title="Hapus ikon">
                                                        &times;
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-xs">Belum ada ikon</span>

                                        {{-- Tampilkan form upload hanya jika belum ada ikon --}}
                                        <form method="POST" action="{{ route('admin.sosial-media.icon.store', ['id' => $platform->id]) }}"
                                              enctype="multipart/form-data" class="inline-flex ml-2">
                                            @csrf
                                            <input type="file" name="image" onchange="this.form.submit()"
                                                   accept="image/*" class="hidden" id="icon-upload-{{ $platform->id }}">
                                            <label for="icon-upload-{{ $platform->id }}"
                                                   class="cursor-pointer bg-gray-100 hover:bg-gray-200 p-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M12 4v16m8-8H4" />
                                                </svg>
                                            </label>
                                        </form>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-2 py-0.5 rounded-full text-xs
                                     {{ $platform->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $platform->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.sosial-media.edit', $platform->id) }}"
                                       class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form method="POST" action="{{ route('admin.sosial-media.destroy', $platform->id) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus platform ini? Semua ikon terkait juga akan dihapus.')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Belum ada platform media sosial. Silakan tambahkan platform baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- pagination --}}
        <div class="p-4">
            {{ $platforms->links() }}
        </div>
    </div>
@endsection
