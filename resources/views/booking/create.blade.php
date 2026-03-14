<!DOCTYPE html>
<html lang="en">
{!! NoCaptcha::renderJs() !!}

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barbershop - Booking</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-color: #0f172a;
    }
    .text-gold {
      color: #fbbf24;
    }
    .bg-gold {
      background-color: #fbbf24;
    }
    .border-gold {
      border-color: #fbbf24;
    }
    .focus\:border-gold:focus {
      border-color: #fbbf24;
    }
  </style>
</head>

<body class="text-gray-100 font-sans min-h-screen">

  <!-- Header -->
  <nav class="border-b border-gray-800 bg-slate-900 shadow-xl">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <a href="/" class="text-2xl font-bold tracking-widest text-gold uppercase flex items-center gap-2">
        <span>✂</span>Barbeshop
      </a>
      <a href="/" class="text-gray-300 hover:text-gold transition">Kembali</a>
    </div>
  </nav>

  <main class="container mx-auto py-10 px-6">
    <div class="max-w-2xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-2">Booking <span class="text-gold">Reservasi</span></h2>
      <p class="text-gray-400 text-center mb-8">
        Silakan pilih layanan dan waktu yang tersedia
      </p>

      @if(session('success'))
      <div class="bg-green-600 text-white p-4 rounded-lg mb-6 shadow-lg border border-green-400">
        {{ session('success') }}
      </div>
      @endif

      @if(session('error'))
      <div class="bg-red-600 text-white p-4 rounded-lg mb-6 shadow-lg border border-red-400">
        {{ session('error') }}
      </div>
      @endif

      <form action="{{ route('booking.store') }}" method="POST" class="bg-slate-800 rounded-2xl border border-gray-700 p-8">
        @csrf

        <!-- Nama Customer -->
        <div class="mb-6">
          <label for="customer_name" class="block text-sm font-semibold text-gray-300 mb-2">Nama Lengkap</label>
          <input type="text" name="customer_name" id="customer_name" required
          class="w-full bg-slate-700 text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-gold focus:outline-none transition"
          placeholder="Masukkan nama lengkap Anda"
          value="{{ old('customer_name') }}">
        </div>

        <!-- No HP -->
        <div class="mb-6">
          <label for="customer_phone" class="block text-sm font-semibold text-gray-300 mb-2">Nomor WhatsApp</label>
          <input type="tel" name="customer_phone" id="customer_phone" required
          class="w-full bg-slate-700 text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-gold focus:outline-none transition"
          placeholder="Contoh: 081234567890"
          value="{{ old('customer_phone') }}">
        </div>

        <!-- Pilih Barber -->
        <div class="mb-6">
          <label for="barber_id" class="block text-sm font-semibold text-gray-300 mb-2">Pilih Pegawai</label>
          <select name="barber_id" id="barber_id" required
            class="w-full bg-slate-700 text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-gold focus:outline-none transition">
            <option value="">-- Pilih Pegawai --</option>
            @foreach($barbers as $barber)
            <option value="{{ $barber->id }}" {{ old('barber_id') == $barber->id ? 'selected' : '' }}>
              {{ $barber->name }}
            </option>
            @endforeach
          </select>
        </div>

        <!-- Pilih Service -->
        <div class="mb-6">
          <label for="service_id" class="block text-sm font-semibold text-gray-300 mb-2">Pilih Layanan</label>
          <select name="service_id" id="service_id" required
            class="w-full bg-slate-700 text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-gold focus:outline-none transition">
            <option value="">-- Pilih Layanan --</option>
            @foreach($services as $service)
            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
              {{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }} ({{ $service->duration }} menit)
            </option>
            @endforeach
          </select>
        </div>

        <!-- Tanggal Booking -->
        <div class="mb-6">
          <label for="booking_date" class="block text-sm font-semibold text-gray-300 mb-2">Tanggal</label>
          <input type="date" name="booking_date" id="booking_date" required
          class="w-full bg-slate-700 text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-gold focus:outline-none transition"
          min="{{ date('Y-m-d') }}"
          value="{{ old('booking_date') }}">
        </div>

        <!-- Waktu Booking -->
        <div class="mb-8">
          <label for="booking_time" class="block text-sm font-semibold text-gray-300 mb-2">Jam</label>
          <select name="booking_time" id="booking_time" required
            class="w-full bg-slate-700 text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-gold focus:outline-none transition">
            <option value="">-- Pilih Jam --</option>
            <option value="09:00" {{ old('booking_time') == '09:00' ? 'selected' : '' }}>09:00</option>
            <option value="10:00" {{ old('booking_time') == '10:00' ? 'selected' : '' }}>10:00</option>
            <option value="11:00" {{ old('booking_time') == '11:00' ? 'selected' : '' }}>11:00</option>
            <option value="12:00" {{ old('booking_time') == '12:00' ? 'selected' : '' }}>12:00</option>
            <option value="13:00" {{ old('booking_time') == '13:00' ? 'selected' : '' }}>13:00</option>
            <option value="14:00" {{ old('booking_time') == '14:00' ? 'selected' : '' }}>14:00</option>
            <option value="15:00" {{ old('booking_time') == '15:00' ? 'selected' : '' }}>15:00</option>
            <option value="16:00" {{ old('booking_time') == '16:00' ? 'selected' : '' }}>16:00</option>
            <option value="17:00" {{ old('booking_time') == '17:00' ? 'selected' : '' }}>17:00</option>
            <option value="18:00" {{ old('booking_time') == '18:00' ? 'selected' : '' }}>18:00</option>
            <option value="19:00" {{ old('booking_time') == '19:00' ? 'selected' : '' }}>19:00</option>
            <option value="20:00" {{ old('booking_time') == '20:00' ? 'selected' : '' }}>20:00</option>
          </select>
        </div>

        <div class="mb-4">
          {!! NoCaptcha::display() !!}
          @if ($errors->has('g-recaptcha-response'))
          <span class="text-red-500 text-xs mt-1">
            <strong>Silakan centang Captcha terlebih dahulu.</strong>
          </span>
          @endif
        </div>


        <!-- Submit Button -->
        <button type="submit"
          class="w-full bg-gold text-slate-900 font-bold py-4 rounded-lg hover:scale-[1.02] transition transform">
          Booking Sekarang
        </button>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="border-t border-gray-800 bg-slate-900 mt-10 py-6">
    <div class="container mx-auto px-6 text-center text-gray-500 text-sm">
      <p>
        &copy; 2026 Barbershop. Hak cipta dilindungi.
      </p>
    </div>
  </footer>

</body>

</html>