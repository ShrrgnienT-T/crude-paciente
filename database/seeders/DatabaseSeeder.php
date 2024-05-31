<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Patient;
use App\Models\County;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        County::factory(142)->create();
        Patient::factory(5)->create();
    }
}
