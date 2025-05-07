<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
            ],
            [
                'username' => 'freelancer1',
                'email' => 'freelancer1@example.com',
                'password' => Hash::make('password'),
                'role' => 'freelancer',
                'created_at' => now(),
            ],
            [
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'created_at' => now(),
            ],
        ]);

        DB::table('freelancers')->insert([
            [
                'user_id' => 2,
                'avatar' => 'image/freelancer1.jpg',
                'field' => 'Web Developer',
                'bio' => 'Experienced in building modern web applications.',
                'skills' => 'PHP, JavaScript, CSS',
                'hourly_rate' => 50.00,
                'rating' => 4.5,
                'created_at' => now(),
            ],
        ]);
    }
}