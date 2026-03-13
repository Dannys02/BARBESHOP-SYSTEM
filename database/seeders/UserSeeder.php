<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
  use WithoutModelEvents;

  public function run(): void
  {
    User::create([
      'name' => 'Admin',
      'email' => 'admin@gmail.com',
      'password' => '$2y$12$/WvX24t5mQQDIAT.6LTZvePW3s9pkt6/OFs7al2el/iDsIl9qqh.O',
      'email_verified_at' => '2026-02-21 07:16:30',
    ]);

    User::create([
      'name' => 'Admin',
      'email' => 'admin@barbershop.com',
      'password' => '$2y$12$RPIhllDuiLYqm4VwRMLca.QHj7vgo4FqTwPnfFja/TVFrGi1S98DW',
    ]);
  }
}