<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
  use WithoutModelEvents;

  public function run(): void
  {
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
  }
}