<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        College::create(['college' => 'College of Arts and Sciences']);
        College::create(['college' => 'College of Business and Management']);
        College::create(['college' => 'College of Engineering and Technology']);
        College::create(['college' => 'College of Education']);

    }
}

