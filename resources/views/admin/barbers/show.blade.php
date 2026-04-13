@extends('layouts.admin')

@section('content')
<div class="mb-8 flex items-center space-x-4">
  <a href="{{ route('barbers.index') }}" class="text-gray-400 hover:text-gold transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
  </a>
  <h2 class="text-3xl font-semibold">Detail <span class="text-gold">Pegawai</span></h2>
</div>

<div class="bg-slate-800 rounded-3xl overflow-hidden border border-gray-700 shadow-2xl">
  <div class="flex flex-col md:flex-row">
    <div class="md:w-1/3 w-full relative">
      <img src="{{ asset('storage/' . $barber->photo) }}" alt="{{ $barber->name }}"
      class="w-full h-[400px] md:h-full object-cover object-top border-b md:border-b-0 md:border-r border-gray-700">
      <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-slate-900 to-transparent h-24 md:hidden"></div>
    </div>

    <div class="md:w-2/3 p-8 md:p-12 flex flex-col justify-between">
      <div>
        <span class="text-gold text-sm font-bold tracking-widest uppercase italic">Professional Barber</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mt-2 mb-6">{{ $barber->name }}</h1>

        <div class="space-y-6">
          <div>
            <h4 class="text-gold font-semibold uppercase text-xs tracking-wider mb-2">Biografi</h4>
            <p class="text-gray-300 leading-relaxed text-lg italic">
              "{{ $barber->bio }}"
            </p>
          </div>

          <div class="grid grid-cols-2 gap-4 pt-6 border-t border-gray-700">
            <div>
              <h4 class="text-gray-500 text-xs uppercase">ID Pegawai</h4>
              <p class="text-white font-mono">
                #BRB-{{ str_pad($barber->id, 3, '0', STR_PAD_LEFT) }}
              </p>
            </div>
            <div>
              <h4 class="text-gray-500 text-xs uppercase">Status</h4>
              <p class="text-green-400 flex items-center">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse mr-2"></span> Aktif
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="flex gap-4 mt-10 text-xs">
        <a href="{{ route('barbers.edit', $barber->id) }}"
          class="px-8 py-3 bg-yellow-600 text-white rounded-full font-bold hover:bg-yellow-700 transition transform hover:scale-105 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
          </svg>
          Edit Profil
        </a>

        <form action="{{ route('barbers.destroy', $barber->id) }}" method="POST"
          onsubmit="return confirm('Yakin ingin menghapus data {{ $barber->name }}?')">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="px-8 py-3 border border-red-600 text-red-600 rounded-full font-bold hover:bg-red-600 hover:text-white flex items-center transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash mr-2" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
            </svg>
            Hapus Permanen
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
