<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Danny's Barbershop</title>
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
    .glass {
      background: rgba(30, 41, 59, 0.7);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.1);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">

  <div class="w-full max-w-md">
    <div class="text-center mb-8">
      <h1 class="text-3xl font-black text-gold tracking-widest uppercase italic">✂ Barbershop</h1>
      <p class="text-gray-400 text-sm mt-2">
    </div>
      </p>

    <div class="glass p-8 rounded-3xl shadow-2xl">
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-6">
          <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Email Address</label>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="Tulis Email Anda..." required autofocus
          class="w-full bg-slate-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
          @error('email') <p class="text-red-500 text-xs mt-1">
            {{ $message }}
          </p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Password</label>
          <input type="password" name="password" placeholder="Tulis Password Anda" required
          class="w-full bg-slate-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:border-gold focus:ring-1 focus:ring-gold outline-none transition">
          @error('password') <p class="text-red-500 text-xs mt-1">
            {{ $message }}
          </p>
          @enderror
        </div>

        <button type="submit"
          class="w-full bg-gold text-slate-900 font-black py-4 rounded-xl hover:bg-yellow-400 hover:scale-[1.02] transition transform active:scale-95 shadow-lg shadow-gold/20">
          MASUK KE DASHBOARD
        </button>
      </form>
    </div>
  </div>

</body>
</html>
