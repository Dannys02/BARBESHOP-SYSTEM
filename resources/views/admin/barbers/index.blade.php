@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
  <h2 class="text-3xl font-semibold">Daftar <span class="text-gold">Pegawai</span></h2>
  <a href="{{ route('barbers.create') }}" class="bg-gold text-xs md:text-base text-slate-900 px-6 py-2 rounded-full font-bold hover:scale-105 transition transform">
    + Tambah Pegawai
  </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 px-4 gap-8 md:px-0">
  @forelse($barbers as $barber)
  <div class="relative bg-slate-800 rounded-2xl overflow-hidden border border-gray-700 hover:border-gold transition group flex flex-col">
    <img src="{{ asset('storage/' . $barber->photo) }}" alt="{{ $barber->name }}"
    class="w-full h-64 object-top object-cover grayscale group-hover:grayscale-0 transition duration-500">

    <div class="p-6 md:p-4 flex flex-col flex-1">
      <h3 class="text-xl font-bold text-gold">{{ $barber->name }}</h3>

      <p class="text-gray-400 text-sm mt-2 mb-4 flex-grow">
        {{ Str::limit($barber->bio, 100) }}
      </p>

      <div class="flex space-x-2 mt-auto">
        <a href="{{ route('barbers.show', $barber->id) }}"
          class="flex-1 text-center py-2 bg-blue-600 rounded-full hover:bg-blue-700 flex justify-center items-center transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye h-5 w-5 mr-2" viewBox="0 0 16 16">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
          </svg>
          Detail
        </a>
        <a href="{{ route('barbers.edit', $barber->id) }}"
          class="flex-1 text-center py-2 bg-yellow-600 rounded-full hover:bg-yellow-700 flex justify-center items-center transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
          </svg>
          Edit
        </a>
      </div>
    </div>

    <form action="{{ route('barbers.destroy', $barber->id) }}" method="POST" class="absolute right-3 top-3 flex-1"
      onsubmit="return confirm('Yakin hapus dan pecat {{ $barber->name }}?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="w-full scale-150 py-2 text-red-600 rounded-full flex justify-center items-center transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash mr-2" viewBox="0 0 16 16">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
        </svg>
      </button>
    </form>
  </div>
  @empty
  <div class="bg-slate-800 w-full rounded-2xl overflow-hidden border border-gray-700 hover:border-gold transition group">
    <h1 class="p-4 text-center">Data kosong.</h1>
  </div>
  @endforelse
</div>
@endsection
