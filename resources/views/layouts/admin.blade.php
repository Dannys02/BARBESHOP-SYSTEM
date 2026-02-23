<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gent's Slot | Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0f172a;
        }

        /* Charcoal Dark */
        .text-gold {
            color: #fbbf24;
        }

        .bg-gold {
            background-color: #fbbf24;
        }

        .border-gold {
            border-color: #fbbf24;
        }
    </style>
</head>

<body class="text-gray-100">
    <nav class="border-b border-gray-800 p-6 bg-slate-900 shadow-xl">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-widest text-gold uppercase">Admin Barbeshop</h1>
            <div class="space-x-6">
                <a href="#" class="hover:text-gold transition">Dashboard</a>
                <a href="{{ route('barbers.index') }}" class="hover:text-gold transition">Barbers</a>
                <a href="#" class="hover:text-gold transition">Services</a>
                <a href="#" class="hover:text-gold transition">Appointments</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-10 px-6">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        @yield('barber')
    </main>
</body>

</html>
