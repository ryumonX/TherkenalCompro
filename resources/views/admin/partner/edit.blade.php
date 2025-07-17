@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Edit Partner</h1>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.partner.update', $partner) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- Gambar Partner --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gambar Partner</label>

                    @if($partner->image)
                        <div class="mt-2 mb-3">
                            <img src="{{ asset('storage/' . $partner->image) }}" alt="Current Partner Image"
                                 class="h-32 object-contain border rounded">
                            <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                        </div>
                    @endif

                    <input type="file" name="image" accept="image/*"
                           class="mt-1 block w-full text-sm border border-gray-300 rounded-md px-3 py-2">
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB (Biarkan kosong jika tidak ingin mengubah)</p>
                    <x-input-error :messages="$errors->get('image')" />
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                        Perbarui Partner
                    </button>
                    <a href="{{ route('admin.partner.index') }}"
                       class="px-4 py-2 text-sm rounded border border-gray-300 text-gray-700 hover:bg-gray-50">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
