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

        <a href="{{ route('services.index') }}"
          class="relative px-4 py-2 rounded-lg transition-all duration-300
          {{ request()->is('admin/services*') ? 'text-gold' : 'text-gray-300 hover:bg-slate-800 hover:text-gold' }}">
          Services
          @if(request()->is('admin/services*'))
          <span class="absolute -bottom-3 left-0 w-full h-0.5 bg-gold"></span>
          @endif
        </a>
        <a href="#" class="px-4 py-2 rounded-lg text-gray-300 hover:bg-slate-800 hover:text-gold transition-all duration-300
          ">Appointments</a>

        <div class="h-6 w-px bg-gray-700 mx-2"></div>
        <button class="bg-gray-800 text-sm px-4 py-2 rounded-lg hover:bg-red-600 transition">Logout</button>
      </div>

      <div class="md:hidden">
        <button id="menu-toggle" class="text-gold focus:outline-none text-2xl">
          ☰
        </button>
      </div>
    </div>

    <div id="mobile-menu" class="z-[100] fixed top-0 translate-x-[-100%] min-h-screen md:hidden bg-slate-900 border-t border-gray-800">
      <div class="flex flex-col items-start px-6 py-4 space-y-2">
        <a href="/admin/dashboard"
          class="relative px-4 py-2 rounded-lg transition-all duration-300
          {{ request()->is('admin/dashboard') ? 'text-gold' : 'text-gray-300 hover:bg-slate-800 hover:text-gold' }}">
          Dashboard
          @if(request()->is('admin/dashboard'))
          <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-gold"></span>
          @endif
        </a>

        <a href="{{ route('barbers.index') }}"
          class="relative px-4 py-2 rounded-lg transition-all duration-300
          {{ request()->is('admin/barbers*') ? 'text-gold' : 'text-gray-300 hover:bg-slate-800 hover:text-gold' }}">
          Barbers
          @if(request()->is('admin/barbers*'))
          <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-gold"></span>
          @endif
        </a>

        <a href="{{ route('services.index') }}"
          class="relative px-4 py-2 rounded-lg transition-all duration-300
          {{ request()->is('admin/services*') ? 'text-gold' : 'text-gray-300 hover:bg-slate-800 hover:text-gold' }}">
          Services
          @if(request()->is('admin/services*'))
          <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-gold"></span>
          @endif
        </a>
        <a href="#" class="px-4 py-2 rounded-lg text-gray-300 hover:bg-slate-800 hover:text-gold transition-all duration-300
          ">Appointments</a>
      </div>
      <div class="px-6 py-4">
        <button class="w-full mb-24 bg-gray-800 hover:bg-red-600 text-sm px-4 py-2 rounded-lg transition">Logout</button>
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
    @yield('service')
    @yield('create_service')
    @yield('edit_service')
  </main>

  <script>
    const btnToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    btnToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('translate-x-[-100%]');
    });

  </script>
</body>

</html>