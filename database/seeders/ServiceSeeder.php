<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
  use WithoutModelEvents;

  public function run(): void
  {
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
  }
}