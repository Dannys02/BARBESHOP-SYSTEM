<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);
        
        \App\Models\Service::create(['name' => 'Haircut & Stylling', 'price' => '50000', 'duration' => '45']);
        \App\Models\Service::create(['name' => 'Beard Trim', 'price' => 30000, 'duration' => 20]);
        
        \App\Models\Barber::create(['name' => 'Dannys Martha Favrillia', 'photo' => 'Dannys.jpg', 'bio' => 'Berpengalaman selama 15 tahun.']);
    }
}
