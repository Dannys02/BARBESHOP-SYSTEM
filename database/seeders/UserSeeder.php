<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
  use WithoutModelEvents;

  public function run(): void
  {
    User::create([
      'name' => 'Admin',
      'email' => 'admin@barbershop.com',
      'password' => Hash::make('barbershop123'),
      'email_verified_at' => '2026-02-21 07:16:30',
    ]);
  }
}
