<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'short_name' => 'CCIS',
                'name' => 'College of Computing and Information Sciences',
                'courses_under' => json_encode(["1","2"])
            ],
            [
                'short_name' => 'CTAS',
                'name' => 'College of Technology and Applied Sciences',
                'courses_under' => json_encode([])
            ],
            [
                'short_name' => 'CCJ',
                'name' => 'College of Criminal Justice',
                'courses_under' => json_encode([])
            ]
           
        ]);
    }
}
