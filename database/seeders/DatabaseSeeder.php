<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@caffeine1922.com',
            'password' => bcrypt('Admin@1922'),
        ]);

        $this->call([
            SettingsSeeder::class,
            MenuCategorySeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
