@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-semibold mb-6">
        Tambah <span class="text-gold">Gambar</span>
    </h2>

    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-slate-800 p-6 rounded-2xl border border-gray-700 space-y-4">
        @csrf

        <div>
            <label class="text-sm text-gray-300">Gambar</label>
            <input type="file" name="image" required
                class="w-full mt-2 p-2 rounded-lg bg-slate-900 border border-gray-700 text-white">
        </div>

        <div>
            <label class="text-sm text-gray-300">Judul</label>
            <input type="text" name="title"
                class="w-full mt-2 p-2 rounded-lg bg-slate-900 border border-gray-700 text-white">
        </div>

        <div>
            <label class="text-sm text-gray-300">Subjudul</label>
            <input type="text" name="subtitle"
                class="w-full mt-2 p-2 rounded-lg bg-slate-900 border border-gray-700 text-white">
        </div>

        <button class="bg-gold text-slate-900 px-6 py-2 rounded-full font-bold hover:scale-105 transition">
            Simpan
        </button>
    </form>
@endsection
