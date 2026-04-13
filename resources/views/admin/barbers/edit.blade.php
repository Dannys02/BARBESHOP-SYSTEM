@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-slate-800 p-8 rounded-2xl border border-gray-700">
  <h2 class="text-2xl font-bold mb-6 text-gold text-center">Rekrut Barber Baru</h2>

  <form id="barberForm" action="{{ route('barbers.update', $barber->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method("PUT")
    <div>
      <label class="block text-gray-400 mb-2">Nama Lengkap</label>
      <input type="text" name="name" value="{{ old('name', $barber->name) }}" class="w-full bg-slate-900 border border-gray-700 rounded-lg p-3 focus:border-gold focus:outline-none text-white" placeholder="Masukan Nama Lengkap">
      @error("name")
      <span class="mt-2 text-red-500 font-bold">{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label class="block text-gray-400 mb-2">Bio / Spesialisasi</label>
      <textarea name="bio" rows="4" class="w-full bg-slate-900 border border-gray-700 rounded-lg p-3 focus:border-gold focus:outline-none text-white" placeholder="Contoh: Fade Master with 5 years experience...">{{ old('bio', $barber->bio) }}</textarea>
      @error("bio")
      <span class="mt-2 text-red-500 font-bold">{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label class="block text-gray-400 mb-2">Foto</label>
      <input type="file" name="photo" class="w-full bg-slate-900 border border-gray-700 rounded-lg p-2 text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-gold file:text-slate-900 hover:file:bg-yellow-500 cursor-pointer">
      <p class="text-xs text-gray-500 mt-2 italic">
        *Format: JPG, PNG, JPEG. Max 2MB. Biarkan kosong jika tidak ingin mengubah foto.
      </p>
      @error("photo")
      <span class="mt-2 text-red-500 font-bold text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div class="pt-4">
      <button id="submitBtn" type="submit" class="w-full bg-gold text-slate-900 py-3 rounded-lg font-bold hover:bg-yellow-500 transition shadow-lg shadow-gold/20">Simpan Barber</button>
    </div>
  </form>
</div>
@endsection
<script>
  document.getElementById('barberForm').onsubmit = function() {
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.classList.add('opacity-50', 'cursor-not-allowed');
  }
</script>
