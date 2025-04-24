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
            <h1 class="text-lg font-semibold text-gray-800">Kelola Slider</h1>
            <a href="{{ route('admin.slider.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                + Tambah Slider
            </a>
        </div>

        {{-- grid layout --}}
        @if($sliders->isEmpty())
            <div class="p-8 text-center text-gray-500">
                Belum ada slider. Klik tombol "Tambah Slider" untuk membuat slider baru.
            </div>
        @else
            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($sliders as $slider)
                    <div class="border rounded-lg overflow-hidden shadow-sm">
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $slider->image) }}"
                                 alt="Slider {{ $loop->iteration }}"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-4">
                                <span class="{{ $slider->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} px-2 py-1 rounded-full text-xs">
                                    {{ $slider->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                                <span class="text-xs text-gray-500">
                                    {{ $slider->created_at->format('d M Y') }}
                                </span>
                            </div>
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.slider.edit', $slider) }}"
                                   class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded text-sm">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.slider.destroy', $slider) }}"
                                      onsubmit="return confirm('Yakin ingin menghapus slider ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-100 hover:bg-red-200 text-red-700 rounded text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- pagination --}}
            <div class="p-4 border-t">
                {{ $sliders->links() }}
            </div>
        @endif
    </div>
@endsection