<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Cek Status</title>
</head>

<body class="bg-slate-900 text-white flex items-center justify-center min-h-screen p-6">
  <div class="w-full max-w-md bg-slate-800 p-8 rounded-3xl shadow-2xl border border-gray-700">
    <h2 class="text-2xl font-bold text-gold mb-6 text-center italic">Cek Status Reservasi</h2>

    <form action="{{ route('booking.cekStatusResult') }}" method="POST" class="mb-8">
      @csrf
      <div class="mb-4">
        <label class="block text-xs text-gray-400 mb-2 uppercase">Masukkan Nomor WhatsApp</label>
        <input type="text" name="customer_phone" placeholder="Contoh: 081234567890" required
        class="w-full bg-slate-900 border border-gray-700 rounded-xl px-4 py-3 outline-none focus:border-gold">
      </div>
      <button type="submit" class="w-full bg-yellow-400 cursor-pointer text-slate-900 font-bold py-3 rounded-xl transition">
        Cek Sekarang
      </button>
    </form>

    @if(isset($booking))
    <div class="p-4 bg-slate-900 rounded-2xl border border-gold/30">
      <p class="text-xs text-gray-400 uppercase tracking-widest mb-2">
        Hasil Terakhir:
      </p>
      <h3 class="font-bold text-lg">{{ $booking->customer_name }}</h3>
      <p class="text-sm text-gray-400">
        {{ $booking->service->name }} - {{ $booking->barber->name }}
      </p>
      <div class="mt-4 flex justify-between items-center">
        <span class="text-xs text-gray-500">{{ $booking->booking_date }} | {{ $booking->booking_time }}</span>

        <span class="px-3 py-1 rounded-full text-xs font-bold
          {{ $booking->status == 'pending' ? 'bg-amber-900/40 text-amber-500' : '' }}
          {{ $booking->status == 'konfirmasi' ? 'bg-emerald-900/40 text-emerald-500' : '' }}
          {{ $booking->status == 'batal' ? 'bg-red-900/40 text-red-500' : '' }}
          {{ $booking->status == 'selesai' ? 'bg-blue-900/40 text-blue-500' : '' }}">
          {{ strtoupper($booking->status) }}
        </span>
      </div>
    </div>
    @elseif(request()->isMethod('post'))
    <p class="text-center text-red-400 text-sm italic">
      Data tidak ditemukan. Pastikan nomor benar.
    </p>
    @endif
    
    <div class="mt-8 text-center">
      <a href="/" class="text-gold text-sm underline">Kembali ke Beranda</a>
    </div>
  </div>
</body>
</html>