@extends("layouts.admin")

@section("dashboard")
<div class="p-4 sm:p-6 lg:p-8 min-h-screen">
  <div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-50">Dashboard <span class="text-gold">{{ auth()->user()->name }}</span></h1>
    <p class="text-gray-50">
      Selamat datang kembali, Admin!
    </p>
  </div>

  <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

    <div class="bg-slate-800/50 p-6 rounded-2xl border border-gray-700 hover:border-gold/50 transition-all duration-300 group">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-xs font-bold text-gray-400 tracking-widest uppercase">Barber Staf</h3>
        <div class="p-2 rounded-lg bg-slate-900 text-gold shadow-inner group-hover:scale-110 transition-transform">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <p class="text-4xl font-black text-white">
          {{ $barbers }}
        </p>
        <p class="text-xs text-gold font-medium uppercase tracking-tighter">
          Personel
        </p>
      </div>
      <div class="mt-4 h-1 w-full bg-slate-900 rounded-full overflow-hidden">
        <div class="h-full bg-gold w-full opacity-20"></div>
      </div>
    </div>

    <div class="bg-slate-800/50 p-6 rounded-2xl border border-gray-700 hover:border-gold/50 transition-all duration-300 group">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-xs font-bold text-gray-400 tracking-widest uppercase">Menu Layanan</h3>
        <div class="p-2 rounded-lg bg-slate-900 text-gold shadow-inner group-hover:scale-110 transition-transform">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 19h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
          </svg>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <p class="text-4xl font-black text-white">
          {{ $services }}
        </p>
        <p class="text-xs text-gold font-medium uppercase tracking-tighter">
          Katalog
        </p>
      </div>
      <div class="mt-4 h-1 w-full bg-slate-900 rounded-full overflow-hidden">
        <div class="h-full bg-gold w-full opacity-20"></div>
      </div>
    </div>

    <div class="bg-slate-800/50 p-6 rounded-2xl border border-gray-700 hover:border-gold/50 transition-all duration-300 group">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-xs font-bold text-gray-400 tracking-widest uppercase">Total Booking</h3>
        <div class="p-2 rounded-lg bg-slate-900 text-gold shadow-inner group-hover:scale-110 transition-transform">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </div>
      </div>
      <div class="flex items-baseline gap-2">
        <p class="text-4xl font-black text-white">
          {{ $appointments }}
        </p>
        <p class="text-xs text-gold font-medium uppercase tracking-tighter">
          Reservasi
        </p>
      </div>
      <div class="mt-4 h-1 w-full bg-slate-900 rounded-full overflow-hidden">
        <div class="h-full bg-gold w-full opacity-20"></div>
      </div>
    </div>

  </div>


  <div class="mt-8 p-6 rounded-2xl border border-gray-100 shadow-sm">
    <h2 class="text-lg font-semibold text-gray-50 mb-4">Aktivitas Terbaru</h2>

    <div class="space-y-4">
      @forelse($recentActivities as $act)
      <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl border border-gray-700">
        <div class="flex items-center gap-4">
          <div class="w-2 h-2 rounded-full
            {{ $act->type == 'booking' ? 'bg-emerald-500 shadow-[0_0_8px_#10b981]' : '' }}
            {{ $act->type == 'barber' ? 'bg-gold shadow-[0_0_8px_#fbbf24]' : '' }}
            {{ $act->type == 'layanan' ? 'bg-blue-500 shadow-[0_0_8px_#3b82f6]' : '' }}">
          </div>
          <div>
            <p class="text-sm text-gray-200 font-medium">
              {{ $act->description }}
            </p>
            <span class="text-[10px] text-gray-500 uppercase tracking-tighter italic">
              {{ $act->created_at->diffForHumans() }}
            </span>
          </div>
        </div>
        <span class="text-[10px] px-2 py-0.5 rounded bg-gray-700 text-gray-400 uppercase">
          {{ $act->type }}
        </span>
      </div>
      @empty
      <div class="text-center py-8 text-gray-50 border-2 border-dashed border-gray-200 rounded-xl">
        Belum ada aktivitas terbaru.
      </div>
      @endforelse
    </div>
  </div>
</div>
@endsection