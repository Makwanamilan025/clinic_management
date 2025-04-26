<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin@gmail.com'),
            ],

            ['email' => 'user@example.com'],
            [
                'name' => 'User',
                'password' => Hash::make('user@example.com'),
            ],
        );

        Clinic::factory(10)->create();
    }
}
