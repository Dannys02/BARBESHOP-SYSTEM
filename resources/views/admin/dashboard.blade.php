@extends("layouts.admin")

@section("dashboard")
<div class="p-4 sm:p-6 lg:p-8 min-h-screen">
  <div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-50">Dashboard <span class="text-gold">Saya</span></h1>
    <p class="text-gray-50">
      Selamat datang kembali, Admin!
    </p>
  </div>

  <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

    <div class="bg-gray-900 p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-sm font-medium text-gray-50 tracking-wide uppercase">Jumlah Barber</h3>
        <span class="p-2 rounded-full bg-blue-50 text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </span>
      </div>
      <p class="text-4xl font-extrabold text-gray-50">
        {{ $barbers }}
      </p>
      <p class="text-sm text-gray-50 mt-1">
        Aktif saat ini
      </p>
    </div>

    <div class="bg-gray-900 p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-sm font-medium text-gray-50 tracking-wide uppercase">Jumlah Jasa</h3>
        <span class="p-2 rounded-full bg-emerald-50 text-emerald-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 19h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
          </svg>
        </span>
      </div>
      <p class="text-4xl font-extrabold text-gray-50">
        {{ $services }}
      </p>
      <p class="text-sm text-gray-50 mt-1">
        Pilihan layanan
      </p>
    </div>

    <div class="bg-gray-900 p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-sm font-medium text-gray-50 tracking-wide uppercase">Total Appointment</h3>
        <span class="p-2 rounded-full bg-violet-50 text-violet-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </span>
      </div>
      <p class="text-4xl font-extrabold text-gray-50">
        {{ $appointments }}
      </p>
      <p class="text-sm text-gray-50 mt-1">
        Total reservasi
      </p>
    </div>

  </div>

  <div class="mt-8 p-6 rounded-2xl border border-gray-100 shadow-sm">
    <h2 class="text-lg font-semibold text-gray-50 mb-4">Aktivitas Terbaru</h2>
    <div class="text-center py-8 text-gray-50 border-2 border-dashed border-gray-200 rounded-xl">
      Belum ada aktivitas terbaru.
    </div>
  </div>
</div>
@endsection
