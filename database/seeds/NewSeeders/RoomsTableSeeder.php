<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Court Room',
                'capacity' => 50
            ],
            [
                'name' => 'RM 104',
                'capacity' => 50
            ],
            [
                'name' => 'RM 105',
                'capacity' => 50
            ],
            [
                'name' => 'RM 106',
                'capacity' => 50
            ],
            [
                'name' => 'RM 203',
                'capacity' => 50
            ],
            [
                'name' => 'RM 204',
                'capacity' => 50
            ],
            [
                'name' => 'RM 205',
                'capacity' => 50
            ],
            [
                'name' => 'RM 206',
                'capacity' => 50
            ],
            [
                'name' => 'RM 207',
                'capacity' => 50
            ],
            [
                'name' => 'RM 208',
                'capacity' => 50
            ],
            [
                'name' => 'Back Of Admin',
                'capacity' => 50
            ],
            [
                'name' => 'RM 301',
                'capacity' => 50
            ],
            [
                'name' => 'RM 302',
                'capacity' => 50
            ],
            [
                'name' => 'RM 303',
                'capacity' => 50
            ],
            [
                'name' => 'RM 304',
                'capacity' => 50
            ],
            [
                'name' => 'RM 306',
                'capacity' => 50
            ],
            [
                'name' => 'RM 307',
                'capacity' => 50
            ],
            [
                'name' => 'RM 308',
                'capacity' => 50
            ],
            [
                'name' => 'Gym A',
                'capacity' => 70
            ],
            [
                'name' => 'Gym B',
                'capacity' => 70
            ],
            [
                'name' => 'Gym C',
                'capacity' => 70
            ],
            [
                'name' => 'Gym D',
                'capacity' => 70
            ],
            [
                'name' => 'Canteen A',
                'capacity' => 70
            ],
            [
                'name' => 'Canteen B',
                'capacity' => 70
            ]
        ]);
    }
}
