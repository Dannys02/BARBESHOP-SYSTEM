<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danny's | Admin Pages</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
  </style>
</head>

<body class="text-gray-100 font-sans">

  <nav class="border-b border-gray-800 bg-slate-900 shadow-xl sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

      <a href="#" class="text-2xl font-bold tracking-widest text-gold uppercase flex items-center gap-2">
        <span>✂</span> Danny's
      </a>

      <div class="hidden md:flex items-center space-x-2">
        <a href="/admin/dashboard"
          class="relative px-4 py-2 rounded-lg transition-all duration-300
          {{ request()->is('admin/dashboard') ? 'text-gold' : 'text-gray-300 hover:bg-slate-800 hover:text-gold' }}">
          Dashboard
          @if(request()->is('admin/dashboard'))
          <span class="absolute -bottom-3 left-0 w-full h-0.5 bg-gold"></span>
          @endif
        </a>

        <a href="{{ route('barbers.index') }}"
          class="relative px-4 py-2 rounded-lg transition-all duration-300
          {{ request()->is('admin/barbers*') ? 'text-gold' : 'text-gray-300 hover:bg-slate-800 hover:text-gold' }}">
          Barbers
          @if(request()->is('admin/barbers*'))
          <span class="absolute -bottom-3 left-0 w-full h-0.5 bg-gold"></span>
          @endif
        </a>

        <a href="#" class="px-4 py-2 rounded-lg text-gray-300 hover:bg-slate-800 hover:text-gold transition-all duration-300
          ">Services</a>
        <a href="#" class="px-4 py-2 rounded-lg text-gray-300 hover:bg-slate-800 hover:text-gold transition-all duration-300
          ">Appointments</a>

        <div class="h-6 w-px bg-gray-700 mx-2"></div>
        <button class="bg-gray-800 text-sm px-4 py-2 rounded-lg hover:bg-gray-700 transition">Logout</button>
      </div>

      <div id="mobile-menu" class="hidden md:hidden bg-slate-900 border-t border-gray-800">
        <div class="px-6 py-4 space-y-2">
          <a href="/dashboard" class="block py-2 {{ request()->is('dashboard') ? 'text-gold' : 'text-gray-300' }} hover:text-gold transition">Dashboard</a>
        </div>
      </div>

      <div class="md:hidden">
        <button id="menu-toggle" class="text-gold focus:outline-none">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
      </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-slate-900 border-t border-gray-800">
      <div class="px-6 py-4 space-y-2">
        <a href="/dashboard" class="block py-2 text-gray-300 hover:text-gold transition">Dashboard</a>
        <a href="{{ route('barbers.index') }}" class="block py-2 text-gray-300 hover:text-gold transition">Barbers</a>
        <a href="#" class="block py-2 text-gray-300 hover:text-gold transition">Services</a>
        <a href="#" class="block py-2 text-gray-300 hover:text-gold transition">Appointments</a>
        <hr class="border-gray-700 my-2">
        <button class="w-full text-left bg-gray-800 text-sm px-4 py-2 rounded-lg hover:bg-gray-700 transition">Logout</button>
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
  </main>

  <script>
    const btnToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    btnToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    });
  </script>
</body>

</html>
