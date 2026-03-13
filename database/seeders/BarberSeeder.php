<?php

namespace Database\Seeders;

use App\Models\Barber;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarberSeeder extends Seeder
{
  use WithoutModelEvents;

  public function run(): void
  {
    $barbers = [
      ['id' => 2,
        'name' => 'Dimas Barka',
        'photo' => 'barbers/eDm6T75gE3fBlReSyZgWu8IRMn5RCdh360kQzHmc.jpg',
        'bio' => 'Pengalaman cukur rambut selama 5 tahun dan penghargaan juara satu cukur kabupaten'],
      ['id' => 3,
        'name' => 'Ahmad Roland',
        'photo' => 'barbers/pkCRRFb8JXLPNBAEqdDo8bQbAXxAyWfqnxE1b2fI.jpg',
        'bio' => 'Berpengalaman hampir 1 abad dalam bidang cukur bulu puyuh'],
      ['id' => 4,
        'name' => 'Zezhi Fauzan',
        'photo' => 'barbers/XrFwntEUNKw0KDrttj6Cd39nP9Od9OBNU0TFbhIZ.jpg',
        'bio' => 'Berpengalaman dalam mencukur 1000 orang, kalau tak sembayang apa gunanya'],
      ['id' => 5,
        'name' => 'Demon Dwi',
        'photo' => 'barbers/qx28zgSgo40lX08LHBNWERWqeYM0Y804DZyz5Aw4.jpg',
        'bio' => 'Pengalaman bla bla bla bla 5 tahun dalam bidang kedokteran wajah'],
    ];

    foreach ($barbers as $b) Barber::create($b);
  }
}