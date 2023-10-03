<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create(['course' => 'Bachelor of Science in Information Technology']);
        Course::create(['course' => 'Bachelor of Science in Computer Science']);
        Course::create(['course' => 'Bachelor of Science in Secondary Education Major in English']);
        Course::create(['course' => 'Bachelor of Science in Secondary Education Major in Values Education']);
        Course::create(['course' => 'Bachelor of Science in Secondary Education Major in Filipino']);
        Course::create(['course' => 'Bachelor of Science in Secondary Education Major in Social Studies']);
        Course::create(['course' => 'Bachelor of Science in Secondary Education Major in Science']);
        Course::create(['course' => 'Bachelor of Science in Secondary Education Major in Mathematics']);
        Course::create(['course' => 'Bachelor of Science in Elementary Education Major in General Education']);
        Course::create(['course' => 'Bachelor of Arts in Communication ']);
        Course::create(['course' => 'Bachelor of Science in Biology ']);
        Course::create(['course' => 'Bachelor of Science in Geology ']);
        Course::create(['course' => 'Bachelor of Science in Mathematics ']);
        Course::create(['course' => 'Bachelor of Science in Accountancy']);
        Course::create(['course' => 'Bachelor of Science in Business Administration Major in Financial Management']);
        Course::create(['course' => 'Bachelor of Science in Office Administration']);
        Course::create(['course' => 'Bachelor of Science in Entrepreneurship']);
        Course::create(['course' => 'Bachelor of Science in Economics']);
        Course::create(['course' => 'Bachelor of Science in Civil Engineering
        ']);
        Course::create(['course' => 'Bachelor of Science in Sanitary Engineering']);
        Course::create(['course' => 'Bachelor of Automotive Technology']);
        Course::create(['course' => 'Bachelor of Engineering Technology Major in Electrical Engineering Technology']);
        Course::create(['course' => 'Bachelor of Engineering Technology Major in Mechanical Engineering Technology option:  Automotive Technology']);
        Course::create(['course' => 'Bachelor of Engineering Technology Major in Mechanical Engineering Technology option:  Refrigeration and Air Conditioning Technology']);

    }
}
