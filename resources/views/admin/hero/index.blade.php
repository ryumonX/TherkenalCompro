@extends('layouts.app')

@section('content')
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">
        {{-- Hero Text Settings --}}
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Pengaturan Teks Hero</h2>
            </div>
            <div class="p-6">
                <form method="POST" action="{{ route('admin.hero.update') }}">
                    @csrf
                    @method('POST')

                    <div class="grid gap-6 sm:grid-cols-2">
                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul</label>
                            <input name="title" value="{{ old('title', $hero->title ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Subjudul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subjudul</label>
                            <input name="subtitle" value="{{ old('subtitle', $hero->subtitle ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error('subtitle')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Hero Items --}}
        <div class="bg-white shadow rounded-lg">
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Item Hero</h2>
                <button type="button" onclick="showModal()"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                    + Tambah Item
                </button>
            </div>

            {{-- Item List --}}
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Judul
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subjudul
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($heroItems as $item)
                            <tr data-id="{{ $item->id }}" class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 line-clamp-2">{{ $item->subtitle }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex gap-3 justify-end">
                                        <a href="{{ route('admin.hero.item.edit', $item) }}"
                                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form method="POST" action="{{ route('admin.hero.item.destroy', $item) }}"
                                              onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Belum ada item hero. Silakan tambahkan item baru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Tambah Item --}}
    <div id="formModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full mx-auto">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Item Hero</h3>
                <button type="button" onclick="hideModal()" class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
            </div>
            <div class="p-6">
                <form method="POST" action="{{ route('admin.hero.item.store') }}">
                    @csrf

                    <div class="space-y-4">
                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul Item</label>
                            <input type="text" name="title"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        {{-- Subjudul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subjudul Item</label>
                            <textarea name="subtitle" rows="2"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal functions
        window.showModal = function() {
            const modal = document.getElementById('formModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        window.hideModal = function() {
            const modal = document.getElementById('formModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }


    });
</script>
@endpush