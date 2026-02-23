@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-slate-800 p-8 rounded-2xl border border-gray-700">
  <h2 class="text-2xl font-bold mb-6 text-gold text-center">Rekrut Barber Baru</h2>

  <form action="{{ route('barbers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <div>
      <label class="block text-gray-400 mb-2">Nama Lengkap</label>
      <input type="text" name="name" class="w-full bg-slate-900 border border-gray-700 rounded-lg p-3 focus:border-gold focus:outline-none text-white" required>
    </div>

    <div>
      <label class="block text-gray-400 mb-2">Bio / Spesialisasi</label>
      <textarea name="bio" rows="4" class="w-full bg-slate-900 border border-gray-700 rounded-lg p-3 focus:border-gold focus:outline-none text-white" placeholder="Contoh: Fade Master with 5 years experience..." required></textarea>
    </div>

    <div>
      <label class="block text-gray-400 mb-2">Foto Profil (Minimal 1MB)</label>
      <input type="file" name="photo" class="w-full bg-slate-900 border border-gray-700 rounded-lg p-2 text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-gold file:text-slate-900 hover:file:bg-yellow-500 cursor-pointer" required>
      <p class="text-xs text-gray-500 mt-2 italic">
        *Format: JPG, PNG, JPEG. Max 2MB.
      </p>
    </div>

    <div class="pt-4">
      <button type="submit" class="w-full bg-gold text-slate-900 py-3 rounded-lg font-bold hover:bg-yellow-500 transition shadow-lg shadow-gold/20">Simpan Barber</button>
    </div>
  </form>
</div>
@endsection