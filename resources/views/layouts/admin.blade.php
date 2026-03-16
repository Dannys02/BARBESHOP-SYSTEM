<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barbe'shop | Admin Pages</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <style>
    /* Charcoal Dark background */
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

    /* Smooth transition for menu */
    #mobile-menu {
      transition: all 0.3s ease-in-out;
    }

    .dataTables_paginate {
      display: flex !important;
      justify-content: center !important;
      align-items: center !important;
      gap: 0.5rem !important;
      padding: 1.5rem 0 !important;
      width: 100% !important;
      border-top: 1px solid #374151 !important;
      box-sizing: border-box !important;
    }

    .paginate_button {
      padding: 0.5rem 0.75rem !important;
      background-color: #334155 !important;
      border-radius: 0.375rem !important;
      font-size: 0.75rem !important;
      font-weight: 700 !important;
      color: white !important;
      cursor: pointer !important;
    }

    .paginate_button.current,
    .paginate_button.current:hover {
      background-color: #0f172a !important;
      color: white !important;
    }

    .paginate_button:hover {
      background-color: #0f172a !important;
      color: white !important;
    }
  </style>
</head>

<body class="text-gray-100 font-sans">

  <nav class="border-b border-gray-800 bg-slate-900 shadow-xl sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <a href="/" class="text-2xl font-bold tracking-widest text-gold uppercase flex items-center gap-2">
        <span class="text-3xl">✂</span> Barbershop
      </a>

      <div class="hidden md:flex items-center space-x-2">
        <a href="/admin/dashboard" class="px-4 py-2 rounded-lg transition {{ request()->is('admin/dashboard') ? 'text-gold' : 'text-gray-300 hover:text-gold' }}">Dashboard</a>
        <a href="{{ route('barbers.index') }}" class="px-4 py-2 rounded-lg transition {{ request()->is('admin/barbers*') ? 'text-gold' : 'text-gray-300 hover:text-gold' }}">Pegawai</a>
        <a href="{{ route('services.index') }}" class="px-4 py-2 rounded-lg transition {{ request()->is('admin/services*') ? 'text-gold' : 'text-gray-300 hover:text-gold' }}">Layanan</a>
        <a href="{{ route('booking.index') }}" class="px-6 py-2 rounded-lg transition {{ request()->is('admin/booking*') ? 'text-gold' : 'text-gray-300 hover:text-gold' }}">Reservasi</a>
        <div class="h-6 w-px bg-gray-700 mx-2"></div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="bg-red-900/20 text-red-500 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition">
            Logout
          </button>
        </form>

      </div>

      <div class="md:hidden">
        <button id="menu-toggle" class="text-gold p-2 focus:outline-none bg-slate-800 rounded-lg">
          <svg id="icon-open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>
    </div>

    <div id="menu-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[90] hidden transition-opacity duration-300 opacity-0"></div>

    <div id="mobile-menu" class="fixed top-0 left-0 bottom-0 w-[280px] bg-slate-900 z-[100] transform -translate-x-full transition-transform duration-300 ease-in-out border-r border-gray-800 flex flex-col shadow-2xl">
      <div class="p-6 border-b border-gray-800 flex justify-between items-center">
        <span class="text-gold font-bold tracking-widest uppercase">Menu Navigasi</span>
        <button id="menu-close" class="text-gray-400 hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="flex flex-col p-4 space-y-2 flex-grow">
        @php
        $navItems = [
        ['url' => '/admin/dashboard', 'name' => 'Dashboard', 'pattern' => 'admin/dashboard'],
        ['url' => route('barbers.index'), 'name' => 'Pegawai', 'pattern' => 'admin/barbers*'],
        ['url' => route('services.index'), 'name' => 'Layanan', 'pattern' => 'admin/services*'],
        ['url' => route('booking.index'), 'name' => 'Reservasi', 'pattern' => 'admin/booking*'],
        ];
        @endphp

        @foreach($navItems as $item)
        <a href="{{ $item['url'] }}"
          class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->is($item['pattern']) ? 'bg-gold text-slate-900 font-bold' : 'text-gray-300 hover:bg-slate-800 hover:text-gold' }}">
          {{ $item['name'] }}
        </a>
        @endforeach
      </div>

      <div class="p-6 border-t border-gray-800">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="bg-red-900/20 text-red-500 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition">
            Logout
          </button>
        </form>

      </div>
    </div>
  </nav>

  <main class="container mx-auto py-10 px-6">
    @if (session('success'))
    <div class="bg-emerald-600 text-white p-4 rounded-lg mb-6 shadow-lg border border-emerald-400">
      {{ session('success') }}
    </div>
    @endif

    @yield('dashboard')
    @yield('barber')
    @yield('create_barber')
    @yield('edit_barber')
    @yield('show_barber')
    @yield('service')
    @yield('create_service')
    @yield('edit_service')
    @yield('appointment')
  </main>

  <script>
    const btnToggle = document.getElementById('menu-toggle');
    const btnClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const overlay = document.getElementById('menu-overlay');

    function toggleMenu() {
      const isOpen = !mobileMenu.classList.contains('-translate-x-full');

      if (isOpen) {
        // Close
        mobileMenu.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 300);
      } else {
        // Open
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        mobileMenu.classList.remove('-translate-x-full');
      }
    }

    btnToggle.addEventListener('click', toggleMenu);
    btnClose.addEventListener('click', toggleMenu);
    overlay.addEventListener('click', toggleMenu); // Klik area gelap untuk tutup

    $(document).ready(function() {
    var table = $('#tabelPesanan').DataTable({
    "dom": 'tp',
    "ordering": false,
    "pageLength": 10,
    "language": {
    "emptyTable": "Data tabel ini kosong!",
    "paginate": {
    "previous": "← Kembali",
    "next": "Lanjut →"
    }
    },
    "drawCallback": function(settings) {
    var api = this.api();
    var tableId = settings.sTableId;
    var jumlahKolom = api.columns().header().length;
    $('#' + tableId + ' .dataTables_empty')
    .addClass('text-center p-12 text-slate-400 font-medium italic')
    .attr('colspan', jumlahKolom);
    },
    "initComplete": function() {
    // Ambil wrapper yang dibuat DataTables
    var $wrapper = $('#tabelPesanan').closest('.dataTables_wrapper');

    // Bungkus hanya bagian tabel (bukan paginate) dengan overflow-x-auto
    $wrapper.find('table').wrap('<div style="overflow-x:auto;"></div>');
    }
    });
    });
  </script>

</body>

</html>
