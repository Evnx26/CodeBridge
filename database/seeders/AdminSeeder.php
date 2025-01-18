<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert data admin ke database
        DB::table('user')->insert([
            'nama' => 'admin', // Nama palsu untuk admin
            'username' => 'admin',
            'email' => 'admin@gmail.com', // Email tetap untuk admin
            'password' => 'admin', // Password yang dienkripsi
            'role' => 'admin', // Role untuk admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
