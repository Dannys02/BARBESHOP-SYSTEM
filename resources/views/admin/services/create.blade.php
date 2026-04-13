@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-slate-800 p-8 rounded-2xl border border-gray-700">
  <h2 class="text-2xl font-bold mb-6 text-gold text-center">Tambah Layanan Baru</h2>

  <form id="serviceForm" action="{{ route('services.store') }}" method="POST" class="space-y-6">
    @csrf
    <div>
      <label class="block text-gray-400 mb-2">Nama Layanan</label>
      <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-slate-900 border border-gray-700 rounded-lg p-3 focus:border-gold focus:outline-none text-white" placeholder="Contoh: Haircut, Beard Trim, dll">
      @error("name")
        <span class="mt-2 text-red-500 font-bold">{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label class="block text-gray-400 mb-2">Harga (Rp)</label>
      <input type="number" name="price" value="{{ old('price') }}" class="w-full bg-slate-900 border border-gray-700 rounded-lg p-3 focus:border-gold focus:outline-none text-white" placeholder="Contoh: 50000">
      @error("price")
        <span class="mt-2 text-red-500 font-bold">{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label class="block text-gray-400 mb-2">Durasi (Menit)</label>
      <input type="number" name="duration" value="{{ old('duration') }}" class="w-full bg-slate-900 border border-gray-700 rounded-lg p-3 focus:border-gold focus:outline-none text-white" placeholder="Contoh: 30">
      <p class="text-xs text-gray-500 mt-2 italic">
        *Durasi layanan dalam hitungan menit
      </p>
      @error("duration")
        <span class="mt-2 text-red-500 font-bold">{{ $message }}</span>
      @enderror
    </div>

    <div class="pt-4">
      <button id="submitBtn" type="submit" class="w-full bg-gold text-slate-900 py-3 rounded-lg font-bold hover:bg-yellow-500 transition shadow-lg shadow-gold/20">Simpan Layanan</button>
    </div>
  </form>
</div>
@endsection
<script>
    document.getElementById('serviceForm').onsubmit = function() {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.classList.add('opacity-50', 'cursor-not-allowed');
    }
</script>
