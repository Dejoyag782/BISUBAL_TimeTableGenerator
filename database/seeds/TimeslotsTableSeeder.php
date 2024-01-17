<?php

use Illuminate\Database\Seeder;

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
                'time' => '7:30 - 08:30',
                'rank' => 1
            ],
            [
                'time' => '08:30 - 09:30',
                'rank' => 2
            ],
            [
                'time' => '09:30 - 10:30',
                'rank' => 3
            ],
            [
                'time' => '10:30 - 11:30',
                'rank' => 4
            ],
            [
                'time' => '11:30 - 12:30',
                'rank' => 5
            ],
            [
                'time' => '12:30 - 13:30',
                'rank' => 6
            ],
            [
                'time' => '13:30 - 14:30',
                'rank' => 7
            ],
            [
                'time' => '14:30 - 15:30',
                'rank' => 8
            ],
            [
                'time' => '15:30 - 16:30',
                'rank' => 9
            ],
            [
                'time' => '16:30 - 17:30',
                'rank' => 10
            ],
            [
                'time' => '17:30 - 18:30',
                'rank' => 11
            ]
        ]);
    }
}
