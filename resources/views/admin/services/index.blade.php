@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
  <h2 class="text-3xl font-semibold">Daftar <span class="text-gold">Layanan</span></h2>
  <a href="{{ route('services.create') }}" class="bg-gold text-xs md:text-base text-slate-900 px-6 py-2 rounded-full font-bold hover:scale-105 transition transform">
    + Tambah Layanan
  </a>
</div>

<div class="bg-slate-800 rounded-2xl border border-gray-700 overflow-x-auto">
  <table id="tabelPesanan" class="w-full text-left border-collapse">
    <thead class="bg-slate-900 text-gold uppercase text-sm">
      <tr>
        <th class="p-4 text-xs font-bold">No</th>
        <th class="p-4 text-xs font-bold">Nama Layanan</th>
        <th class="p-4 text-xs font-bold">Harga</th>
        <th class="p-4 text-xs font-bold">Durasi</th>
        <th class="p-4 text-xs font-bold text-center">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-700">
      @forelse($services as $index => $service)
      <tr class="hover:bg-slate-700/50 transition">
        <td class="p-4 text-gray-300">{{ $index + 1 }}</td>
        <td class="p-4">
          <span class="font-semibold text-gold">{{ $service->name }}</span>
        </td>
        <td class="p-4 text-gray-300 whitespace-nowrap">
          <span class="bg-green-600/20 text-green-400 px-3 py-1 rounded-full text-sm font-semibold">
            Rp {{ number_format($service->price, 0, ',', '.') }}
          </span>
        </td>
        <td class="p-4 text-gray-300 whitespace-nowrap">
          <span class="bg-blue-600/20 text-blue-400 px-3 py-1 rounded-full text-sm font-semibold">
            {{ $service->duration }} menit
          </span>
        </td>
        <td class="p-4">
          <div class="flex justify-center space-x-2">
            <a href="{{ route('services.edit', $service->id) }}" class="px-4 py-2 bg-yellow-600 rounded-full hover:bg-yellow-700 transition text-sm">Edit</a>

            <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Yakin hapus layanan {{ $service->name }}?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition text-sm">Hapus</button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <!--<tr>
                          <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                              <div class="flex flex-col items-center">
                                  <svg class="w-16 h-16 mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                  </svg>
                                  <p class="text-lg">Belum ada layanan</p>
                                  <p class="text-sm">Tambahkan layanan pertama Anda</p>
                              </div>
                          </td>
                      </tr>-->
      @endforelse
    </tbody>
  </table>
</div>
@endsection
