<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* State Awal: Opacity 0 dan Geser Bawah 50px */
        .from-bottom {
            opacity: 0;
            transform: translateY(50px);
            transition: all 1s ease-out;
            /* Durasi 1 detik sesuai request */
        }

        /* State Saat Terlihat di Layar: Opacity 100 dan Posisi Normal */
        .from-bottom.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="text-gray-200">

    <nav class="fixed w-full z-50 glass">
        <div class="px-6 md:px-12 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-extrabold tracking-tighter text-gold uppercase">
                ✂ Barbershop
            </a>

            <div class="hidden md:flex items-center space-x-4 text-sm font-semibold uppercase tracking-widest">
                <a href="#services" class="hover:text-yellow-500 transition">Layanan</a>
                <a href="#gallery" class="hover:text-yellow-500 transition">Galeri</a>
                <a href="#barbers" class="hover:text-yellow-500 transition">Barber</a>
                <a href="{{ route('booking.create') }}" class="hover:text-yellow-500 transition">
                    Booking Sekarang
                </a>
                <a href="/cek-status"
                    class="border border-gold bg-transparent text-white px-6 py-2 rounded-full hover:bg-white/10 transition">
                    Cek Status Jadwal
                </a>
            </div>

            <button class="md:hidden text-gold text-2xl"
                onclick="document.getElementById('mobile-nav').classList.toggle('-translate-y-full')">☰</button>
        </div>
    </nav>

    <div id="mobile-nav"
        class="fixed px-0 inset-0 bg-slate-900 z-[60] flex flex-col items-center justify-center space-y-8 text-2xl font-bold transform -translate-y-full transition-transform duration-500 md:hidden">
        <button class="absolute top-6 right-6 text-gold text-4xl"
            onclick="document.getElementById('mobile-nav').classList.toggle('-translate-y-full')">&times;</button>
        <a href="#services"
            onclick="document.getElementById('mobile-nav').classList.add('-translate-y-full')">Layanan</a>
        <a href="#gallery" onclick="document.getElementById('mobile-nav').classList.add('-translate-y-full')">Galeri</a>
        <a href="#barbers" onclick="document.getElementById('mobile-nav').classList.add('-translate-y-full')">Barber</a>
        <a href="{{ route('booking.create') }}" class="hover:text-yellow-500 transition">
            Booking Sekarang
        </a>
        <a href="/cek-status"
            class="border border-gold bg-transparent text-white px-8 py-3 rounded-full hover:bg-white/10 transition">
            Cek Status Jadwal
        </a>
    </div>

    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div style="background-image: url('{{ asset('assets/img/Home.webp') }}')"
            class="absolute inset-0 bg-cover bg-center opacity-20 scale-110"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h4 class="from-bottom text-gold font-bold tracking-[0.3em] uppercase mb-4 animate-pulse">Classic & Modern
            </h4>
            <h1 style="transition-delay: 0.1s;" class="from-bottom text-5xl md:text-8xl font-black mb-6 leading-tight">
                Gaya Rambut <br><span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-amber-200 to-yellow-500">Karakter
                    Kamu.</span></h1>
            <p style="transition-delay: 0.2s;" class="from-bottom text-gray-400 max-w-2xl mx-auto mb-10 text-lg">
                Sentuhan profesional untuk pria yang menghargai detail. Temukan kenyamanan dan gaya terbaik di
                Barbershop.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a style="transition-delay: 0.3s;" href="{{ route('booking.create') }}"
                    class="from-bottom px-10 py-4 bg-gold text-slate-900 font-bold rounded-xl hover:bg-yellow-400">Mulai
                    Reservasi</a>
                <a style="transition-delay: 0.4s;" href="#services"
                    class="from-bottom px-10 py-4 border border-gray-600 rounded-xl font-bold hover:bg-white/10">Lihat
                    Katalog</a>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 relative overflow-hidden">
        <div
            class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-gold/5 rounded-full blur-[120px]">
        </div>

        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 from-bottom relative group">
                    <div class="absolute -top-4 -left-4 w-24 h-24 border-t-4 border-l-4 border-gold z-0"></div>
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 border-b-4 border-r-4 border-gold z-0"></div>
                    <div class="relative z-10 overflow-hidden rounded-2xl aspect-square glass p-3">
                        <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?q=80&w=1000&auto=format&fit=crop"
                            alt="Barber Shop Interior"
                            class="w-full h-full object-cover rounded-xl grayscale group-hover:grayscale-0 transition duration-700">
                    </div>
                </div>

                <div class="w-full md:w-1/2 from-bottom" style="transition-delay: 0.3s;">
                    <h4 class="text-gold font-bold tracking-widest uppercase mb-4 text-sm">Warisan & Kualitas</h4>
                    <h2 class="text-4xl md:text-5xl font-black mb-6 leading-tight text-white">Lebih dari Sekedar
                        <br><span class="text-gold">Potong Rambut.</span>
                    </h2>
                    <p class="text-gray-400 mb-8 leading-relaxed text-lg">
                        Didirikan pada tahun 2026, <span class="text-white font-semibold">Barbershop</span> hadir bukan
                        hanya untuk memangkas rambut, tapi untuk mendefinisikan kembali karakter pria modern melalui
                        sentuhan klasik yang presisi.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">
                        <div class="flex items-start space-x-4">
                            <div class="mt-1 text-gold">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h5 class="font-bold text-white">Sterilisasi Ketat</h5>
                                <p class="text-gray-500 text-sm">
                                    Alat disterilkan dengan sinar UV setiap sesi.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="mt-1 text-gold">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h5 class="font-bold text-white">Premium Product</h5>
                                <p class="text-gray-500 text-sm">
                                    Hanya menggunakan pomade & tonik terbaik.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 glass border-l-4 border-gold rounded-r-2xl">
                        <p class="italic text-gray-300">
                            "Kepercayaan diri seorang pria bermula dari kursi barber kami. Kami memastikan setiap detail
                            adalah karya seni."
                        </p>
                        <p class="mt-4 font-bold text-gold text-sm uppercase tracking-widest">
                            — Head Barber Barbershop
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="services" class="py-24 bg-slate-900/50">
        <div class="container mx-auto px-6">
            <div class="from-bottom text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-2">Layanan <span class="text-gold">Unggulan</span></h2>
                <div class="h-1 w-20 bg-gold mx-auto"></div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 justify-items-center gap-8">
                @forelse($services as $service)
                    <div style="transition-delay: {{ $loop->index * 0.1 }}s"
                        class="from-bottom glass p-8 rounded-3xl hover:border-gold/50 group">
                        <div
                            class="w-12 h-12 bg-gold/10 rounded-2xl flex items-center justify-center text-gold mb-6 group-hover:bg-gold group-hover:text-slate-900 transition duration-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758L5 19m0-14l4.121 4.121">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">{{ $service->name }}</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">
                            Layanan terbaik dengan hasil presisi dan produk berkualitas tinggi.
                        </p>
                        <span class="text-gold font-bold text-lg">IDR
                            {{ number_format($service->price ?? 0, 0, ',', '.') }}</span>
                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center w-full from-bottom delay-200">
                        <span class="text-xl italic">Belum ada layanan yang tersedia.</span>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="gallery" class="py-24 bg-slate-900/50">
        <div class="container mx-auto px-6">
            <div class="from-bottom text-center mb-16">
                <h4 class="text-gold font-bold tracking-widest uppercase mb-2 text-sm">Mahakarya Kita</h4>
                <h2 class="text-3xl md:text-5xl font-black text-white">Lookbook <span
                        class="text-gold">Karakter</span></h2>
                <div class="h-1 w-20 bg-gold mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="from-bottom group relative overflow-hidden rounded-3xl aspect-square glass border-none"
                    style="transition-delay: 0.1s;">
                    <img src="https://images.unsplash.com/photo-1621605815841-2dddbaa2093a?q=80&w=1000&auto=format&fit=crop"
                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-8">
                        <span class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-2">Signature Cut</span>
                        <h4 class="text-white text-xl font-bold">Classic Pompadour</h4>
                    </div>
                </div>

                <div class="from-bottom group relative overflow-hidden rounded-3xl aspect-square glass border-none"
                    style="transition-delay: 0.2s;">
                    <img src="https://images.unsplash.com/photo-1599351431247-f50940397dc0?q=80&w=1000&auto=format&fit=crop"
                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-8">
                        <span class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-2">Modern Look</span>
                        <h4 class="text-white text-xl font-bold">Mid Fade Texture</h4>
                    </div>
                </div>

                <div class="from-bottom group relative overflow-hidden rounded-3xl aspect-square glass border-none"
                    style="transition-delay: 0.3s;">
                    <img src="https://images.unsplash.com/photo-1593702295094-ada74bc4a19c?q=80&w=1000&auto=format&fit=crop"
                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-8">
                        <span class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-2">Gentlemen's
                            Choice</span>
                        <h4 class="text-white text-xl font-bold">Low Taper Blowout</h4>
                    </div>
                </div>

                <div class="from-bottom lg:col-span-2 group relative overflow-hidden rounded-3xl h-[300px] lg:h-auto glass border-none"
                    style="transition-delay: 0.4s;">
                    <img src="https://images.unsplash.com/photo-1512690118259-b10884895772?q=80&w=1000&auto=format&fit=crop"
                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-8">
                        <span class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-2">Precision Work</span>
                        <h4 class="text-white text-xl font-bold">Beard Sculpting & Trim</h4>
                    </div>
                </div>

                <div class="from-bottom group relative overflow-hidden rounded-3xl aspect-square glass border-none"
                    style="transition-delay: 0.5s;">
                    <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486?q=80&w=1000&auto=format&fit=crop"
                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-8">
                        <span class="text-gold font-bold text-xs uppercase tracking-[0.2em] mb-2">Edgy Style</span>
                        <h4 class="text-white text-xl font-bold">Buzz Cut Fade</h4>
                    </div>
                </div>

            </div>

            <div class="mt-16 text-center from-bottom">
                <p class="text-gray-400 mb-6 font-medium">
                    Lihat lebih banyak hasil karya kami di Instagram
                </p>
                <a href="#"
                    class="inline-flex items-center space-x-3 text-gold font-bold border-b-2 border-gold pb-1 hover:text-white hover:border-white transition italic">
                    <span>Follow @barbershop_official</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <section id="barbers" class="py-24">
        <div class="container mx-auto px-6 text-center">
            <h2 class="from-bottom text-3xl md:text-5xl font-bold mb-16">Pegawai <span
                    class="text-gold">Barbershop</span></h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @forelse($barbers as $barber)
                    <div style="transition-delay: {{ $loop->index * 0.2 }}s" class="from-bottom group">
                        <div class="relative overflow-hidden rounded-2xl aspect-[3/4] mb-4">
                            <img src="{{ asset('storage/' . $barber->photo) }}"
                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-700 scale-110 group-hover:scale-100">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-60">
                            </div>
                        </div>
                        <h4 class="font-bold text-lg">{{ $barber->name }}</h4>
                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center w-full from-bottom delay-200">
                        <span class="text-xl text-center italic">Belum ada pegawai.</span>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="bg-slate-950 pt-20 pb-10 border-t border-gray-800">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
            <div>
                <h3 class="text-2xl font-bold text-gold mb-6 uppercase">✂ Barbershop</h3>
                <p class="text-gray-500 leading-relaxed text-sm">
                    Memberikan standar baru dalam perawatan rambut pria sejak 2026. Kualitas adalah prioritas utama
                    kami.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase tracking-widest text-sm">Waktu Operasional</h4>
                <ul class="text-gray-500  space-y-3">
                    <li class="flex items-center space-x-6"><span>Senin - Jumat</span> <span
                            class="text-gray-300">09:00 -
                            21:00</span></li>
                    <li class="flex items-center space-x-6"><span>Sabtu - Minggu</span> <span
                            class="text-gray-300">10:00 -
                            22:00</span></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase tracking-widest text-sm">Lokasi Kami</h4>
                <p class="text-gray-500 text-sm mb-4 italic">
                    Jl. Nasionak No. 3, Kota Banyuwangi, Indonesia
                </p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-10 h-10 glass rounded-lg flex items-center justify-center hover:text-yellow-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-10 h-10 glass rounded-lg flex items-center justify-center hover:text-yellow-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path
                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center text-gray-600 text-xs border-t border-gray-900 pt-10">
            &copy; 2026 Barbershop. Hak cipta dilindungi.
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elemen = document.querySelectorAll('.from-bottom');

            const animasiBawah = {
                root: null, // Mengacu pada viewport
                threshold: 0.15 // Elemen terlihat 15% langsung trigger
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Jika terlihat di layar, tambahkan class active
                        entry.target.classList.add('active');
                    } else {
                        // Jika tidak terlihat (scrolled away), hapus class active agar animasi berulang
                        entry.target.classList.remove('active');
                    }
                });
            }, animasiBawah);

            elemen.forEach(box => {
                observer.observe(box);
            });
        });
    </script>
</body>

</html>
