<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barber;
use App\Models\Service;
use App\Models\Activity;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  use WithoutModelEvents;

  public function run(): void
  {
    // --- SEEDING USERS ---
    User::create([
      'name' => 'Admin',
      'email' => 'admin@gmail.com',
      'password' => '$2y$12$/WvX24t5mQQDIAT.6LTZvePW3s9pkt6/OFs7al2el/iDsIl9qqh.O', // Hash asli dari DB
      'email_verified_at' => '2026-02-21 07:16:30',
    ]);

    User::create([
      'name' => 'Admin',
      'email' => 'admin@barbershop.com',
      'password' => '$2y$12$RPIhllDuiLYqm4VwRMLca.QHj7vgo4FqTwPnfFja/TVFrGi1S98DW',
    ]);

    // --- SEEDING SERVICES ---
    $services = [
      ['id' => 1,
        'name' => 'Haircut & Stylling',
        'price' => 50000,
        'duration' => 45],
      ['id' => 2,
        'name' => 'Beard Trim',
        'price' => 30000,
        'duration' => 20],
      ['id' => 3,
        'name' => 'The Executive Cut',
        'price' => 75000,
        'duration' => 45],
      ['id' => 4,
        'name' => 'Gentlemen\'s Grooming',
        'price' => 125000,
        'duration' => 60],
      ['id' => 5,
        'name' => 'Express Fresh Trim',
        'price' => 50000,
        'duration' => 30],
    ];
    foreach ($services as $s) Service::create($s);

    // --- SEEDING BARBERS ---
    $barbers = [
      [
        'id' => 2,
        'name' => 'Dimas Barka',
        'photo' => 'barbers/eDm6T75gE3fBlReSyZgWu8IRMn5RCdh360kQzHmc.jpg',
        'bio' => 'Pengalaman cukur rambut selama 5 tahun dan penghargaan juara satu cukur kabupaten'
      ],
      [
        'id' => 3,
        'name' => 'Ahmad Roland',
        'photo' => 'barbers/pkCRRFb8JXLPNBAEqdDo8bQbAXxAyWfqnxE1b2fI.jpg',
        'bio' => 'Berpengalaman hampir 1 abad dalam bidang cukur bulu puyuh'
      ],
      [
        'id' => 4,
        'name' => 'Zezhi Fauzan',
        'photo' => 'barbers/XrFwntEUNKw0KDrttj6Cd39nP9Od9OBNU0TFbhIZ.jpg',
        'bio' => 'Berpengalaman dalam mencukur 1000 orang, kalau tak sembayang apa gunanya'
      ],
      [
        'id' => 5,
        'name' => 'Demon Dwi',
        'photo' => 'barbers/qx28zgSgo40lX08LHBNWERWqeYM0Y804DZyz5Aw4.jpg',
        'bio' => 'Pengalaman bla bla bla bla 5 tahun dalam bidang kedokteran wajah'
      ],
    ];
    foreach ($barbers as $b) Barber::create($b);

    // --- SEEDING APPOINTMENTS ---
    Appointment::create([
      'id' => 5, 'service_id' => 1, 'barber_id' => 3, 'customer_name' => 'Erza Kurniawan',
      'customer_phone' => '085645837298', 'booking_date' => '2026-03-06',
      'booking_time' => '15:00:00', 'status' => 'konfirmasi'
    ]);
    Appointment::create([
      'id' => 8, 'service_id' => 1, 'barber_id' => 3, 'customer_name' => 'Maltan',
      'customer_phone' => '085645837810', 'booking_date' => '2026-03-20',
      'booking_time' => '11:00:00', 'status' => 'pending'
    ]);
    Appointment::create([
      'id' => 9, 'service_id' => 5, 'barber_id' => 4, 'customer_name' => 'Iza Makmur',
      'customer_phone' => '085645837298', 'booking_date' => '2026-03-09',
      'booking_time' => '13:00:00', 'status' => 'selesai'
    ]);

    // --- SEEDING ACTIVITIES (Beberapa contoh saja) ---
    Activity::create(['description' => 'Update status Iza Makmur: KONFIRMASI -> SELESAI', 'type' => 'booking']);
    Activity::create(['description' => 'Menghapus reservasi: Gilang Kamal (2026-03-06)', 'type' => 'booking']);
  }
}