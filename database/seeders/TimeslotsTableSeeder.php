<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeslotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timeslots')->insert([
            [
                'time' => '8:00 - 10:30',
                'rank' => 1
            ],
            [
                'time' => '10:30 - 12:30',
                'rank' => 2
            ],
            [
                'time' => '13:00 - 15:00',
                'rank' => 3
            ],
            [
                'time' => '15:00 - 17:00',
                'rank' => 4
            ]
        ]);
    }
}
