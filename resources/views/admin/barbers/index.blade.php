@extends('layouts.admin')

@section('barber')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-semibold">Daftar <span class="text-gold">Barber</span></h2>
    <a href="{{ route('barbers.create') }}" class="bg-gold text-slate-900 px-6 py-2 rounded-full font-bold hover:scale-105 transition transform">
        + Tambah Barber
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @forelse($barbers as $barber)
    <div class="bg-slate-800 rounded-2xl overflow-hidden border border-gray-700 hover:border-gold transition group">
        <img src="{{ asset('storage/' . $barber->photo) }}" alt="{{ $barber->name }}" class="w-full h-69 object-cover grayscale group-hover:grayscale-0 transition duration-500">

        <div class="p-6 md:p-4">
            <h3 class="text-xl font-bold text-gold">{{ $barber->name }}</h3>
            <p class="text-gray-400 text-sm mt-2 mb-4">{{ Str::limit($barber->bio, 100) }}</p>

            <div class="flex space-x-2">
                <a href="{{ route('barbers.edit', $barber->id) }}" class="flex-1 text-center py-2 bg-yellow-600 rounded-lg hover:bg-yellow-700 transition">Edit</a>

                <form action="{{ route('barbers.destroy', $barber->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin hapus dan pecat {{ $barber->name }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="bg-slate-800 w-full rounded-2xl overflow-hidden border border-gray-700 hover:border-gold transition group">
        <h1 class="p-4 text-center">Data kosong.</h1>
    </div>
    @endforelse
</div>
@endsection
