# 💇 Barbershop Booking System

Sistem booking online untuk barbershop yang memungkinkan pelanggan memesan layanan secara online.

---

## 📌 Deskripsi Singkat

Website ini dibuat sebagai project **Rekayasa Perangkat Lunak (RPL)** untuk menciptakan platform yang mempermudah pelanggan memesan layanan barbershop. Pengguna dapat melihat daftar barbershop, memilih service yang tersedia, dan membuat booking dengan barbershop pilihan mereka. Admin dapat mengelola data barbershop, service, dan melihat history booking.

---

## ✨ Fitur Utama

- **Sistem Login & Register** - User dapat membuat akun untuk menggunakan aplikasi
- **User** - Melihat status booking sesuai nomor telepon
- **Daftar Service** - Menampilkan service apa saja yang tersedia
- **Jadwal Barber** - Melihat ketersediaan barbershop
- **Booking Appointment** - User dapat membuat booking dengan memilih barber, service, dan tanggal
- **Admin Dashboard** - Mengelola data barbershop, service, dan appointment
- **Galeri Portfolio** - Menampilkan portfolio barbershop
- **Activity Log** - Mencatat aktivitas yang terjadi di sistem

---

## 🛠️ Teknologi yang Digunakan

| Aspek              | Teknologi                 |
| ------------------ | ------------------------- |
| **Backend**        | Laravel 11                |
| **Frontend**       | Blade Template, HTML, CSS |
| **Styling**        | Tailwind CSS              |
| **Database**       | MySQL                     |
| **Authentication** | Laravel Auth              |

Teknologi ini dipilih karena Laravel menyediakan struktur yang jelas dan banyak tools built-in yang memudahkan development.

---

## 👤 Peran Saya dalam Project

Saya adalah developer utama yang mengerjakan **~80-90%** dari project ini, mulai dari:

- ✅ Merancang database schema dan membuat migrations
- ✅ Membuat models dan relationships (Barber, Service, Appointment, User, dll)
- ✅ Mengimplementasikan CRUD operations di Controllers
- ✅ Membuat view dan validasi form
- ✅ Styling dengan Tailwind CSS
- ✅ Debugging dan fixing errors dengan bantuan AI

Sisanya adalah template default Laravel dan reference dari dokumentasi.

---

## 📚 Hal yang Saya Pahami dari Project Ini

1. **CRUD Operations** - Create, Read, Update, Delete adalah fondasi aplikasi web
2. **Database Relationships** - Hubungan antar tabel (One-to-Many) seperti banyak booking bisa terkait ke satu barber, tapi 1 booking cuma punya 1 barber
3. **MVC Architecture** - Model, View, Controller dan bagaimana mereka bekerja bersama
4. **Laravel Basics** - Routing, Controllers, Eloquent ORM, Blade Template
5. **HTML & CSS** - Struktur halaman dan styling dengan Tailwind CSS
6. **Form Validation** - Validasi input dari user sebelum disimpan ke database
7. **Authentication** - Sistem login dan proteksi halaman agar hanya user tertentu yang bisa akses

Saya masih **sedang belajar** dan belum expert di beberapa area, tapi sudah cukup mengerti untuk membuat aplikasi CRUD dasar yang fungsional.

---

## 🤖 Catatan tentang AI dan Bantuan

**Bagian yang dibantu AI:**

- Debugging ketika ada error yang sulit dipahami
- Penjelasan konsep yang tidak jelas dari dokumentasi
- Refactoring kode agar lebih rapi

**Bagian yang dikerjakan sendiri:**

- Logic dan alur sistem
- Database design
- Implementasi fitur
- Styling dan UI

**Keterbatasan yang Saya Ketahui:**

- Belum ada sistem notifikasi real-time
- Belum ada integrasi payment gateway
- Belum ada fitur reschedule appointment
- Security masih dasar (hanya Laravel Auth default)
- Testing belum lengkap

---

## 🚀 Cara Menjalankan Project

### Prerequisites

- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM (untuk build assets)

### Langkah-Langkah

1. **Clone repository** (atau extract folder project)

```bash
cd BARBESHOP-BOOKING-SYSTEM
```

2. **Install dependencies**

```bash
composer install
npm install
```

3. **Setup environment**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Konfigurasi database di `.env`**

```
DB_DATABASE=barbeshop_system
DB_USERNAME=root
DB_PASSWORD=
```

5. **Jalankan migrations**

```bash
php artisan migrate --seed
```

6. **Build assets**

```bash
npm run build
```

7. **Jalankan development server**

```bash
php artisan serve
```

8. **Akses aplikasi**

- User: `http://localhost:8000`
- Admin: Login dengan akun admin (sesuai seeder)

---

## 📝 Catatan Pengembangan

- Project ini dibuat sebagai tugas RPL, fokus pada fungsionalitas dasar
- Saya masih belajar, jadi ada kemungkinan ada improve yang bisa dilakukan
- Welcome untuk feedback dan suggestions
- Jika ada bug, silakan buat issue atau hubungi saya

---

**Dibuat oleh Dannys Martha Favrillia, siswa RPL** 👨‍💻
