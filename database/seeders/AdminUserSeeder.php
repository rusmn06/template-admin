<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek dulu apakah email admin sudah ada, agar tidak dobel seeding
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // Kunci pencarian
            [
                'name' => 'Administrator',
                'password' => 'password', // Akan otomatis hashed oleh cast di Model
                'role' => 'admin',
            ]
        );
    }
}