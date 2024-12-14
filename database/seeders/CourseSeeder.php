<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $logoArr = [
            'img/python_logo.png',
            'img/java.png',
            'img/html-css-js.png',
            'img/laravel.png',
            'img/c.png',
            'img/c++.png'
        ];
        
        $titleArr = [
            'Python', 
            'Java', 
            'HTML, CSS, JS', 
            'Laravel',
            'C', 
            'C++'
        ];

        for($i = 0; $i < 6; $i++){
           Course::create([
            'title' => $titleArr[$i], 
            'logo' => $logoArr[$i], 
            'description' => $faker->paragraph(), 
            'price' => $faker->randomFloat(2, 10, 30)
           ]);
        }
    }
}
