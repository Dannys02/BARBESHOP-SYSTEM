<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
  use WithoutModelEvents;

  public function run(): void
  {
    Activity::create(['description' => 'Update status Iza Makmur: KONFIRMASI -> SELESAI', 'type' => 'booking']);
    Activity::create(['description' => 'Menghapus reservasi: Gilang Kamal (2026-03-06)', 'type' => 'booking']);
  }
}