<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Year::create(['year' => '2020']);
        Year::create(['year' => '2021']);
        Year::create(['year' => '2022']);
        Year::create(['year' => '2023']);
    }
}
