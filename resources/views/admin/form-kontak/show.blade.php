@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        {{-- header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Detail Pesan</h1>
            <div class="flex gap-2">
                <a href="{{ route('admin.form-kontak.index') }}"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm rounded">
                    Kembali
                </a>
                <form method="POST" action="{{ route('admin.form-kontak.destroy', $pesan) }}"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                    @csrf @method('DELETE')
                    <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        {{-- content --}}
        <div class="p-6 space-y-6">
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Tanggal Dikirim</h3>
                    <p class="mt-1">{{ $pesan->created_at->format('d M Y H:i') }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Nama Pengirim</h3>
                    <p class="mt-1">{{ $pesan->nama }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Email</h3>
                    <p class="mt-1">
                        <a href="mailto:{{ $pesan->email }}" class="text-indigo-600 hover:underline">
                            {{ $pesan->email }}
                        </a>
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">No. Telepon</h3>
                    <p class="mt-1">{{ $pesan->no_telepon ?? '-' }}</p>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-500">Isi Pesan</h3>
                <div class="mt-1 p-4 bg-gray-50 rounded-md">
                    <p class="whitespace-pre-line">{{ $pesan->pesan }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection