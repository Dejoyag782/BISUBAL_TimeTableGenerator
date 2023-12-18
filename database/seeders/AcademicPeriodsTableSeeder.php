<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('academic_periods')
            ->insert([
                ["name" => "Semester I"],
                ["name" => "Semester II"],
            ]);
    }
}
