<?php

use Illuminate\Database\Seeder;

class ProfessorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professors')->insert([
            [
                'name' => 'Benjamin Omamalin',
                'department' => 1
            ],
            [
                'name' => 'Thomas Edison',
                'department' => 1
            ],
            [
                'name' => 'Catherine Lea Gabo',
                'department' => 1
            ],
            [
                'name' => 'Winzeal Agoc',
                'department' => 1
            ],
            [
                'name' => 'Julie Bitasolo',
                'department' => 1
            ],
            [
                'name' => 'Shella Olaquir',
                'department' => 1
            ],
            [
                'name' => 'Fermo Jay Asufra Jr.',
                'department' => 1
            ],
            [
                'name' => 'John Cena',
                'department' => 2
            ],
            [
                'name' => 'Dwayne Johnson',
                'department' => 2
            ],
            [
                'name' => 'Chef Boy Logro',
                'department' => 2
            ],
            [
                'name' => 'Barrack Obama',
                'department' => 2
            ],            
            [
                'name' => 'Larry Gates',
                'department' => 3
            ],
            [
                'name' => 'Richard Hendricks',
                'department' => 3
            ],
            [
                'name' => 'Arnold Schwarzenegger',
                'department' => 3
            ],
            [
                'name' => 'Dureen Travero',
                'department' => null
            ],
            [
                'name' => 'John Showman',
                'department' => null
            ],
            [
                'name' => 'Dhoree May Maravilla',
                'department' => null
            ],
            [
                'name' => 'Estrella Marie Bungabong',
                'department' => null
            ],
            [
                'name' => 'Loraine Lacea',
                'department' => null
            ],
            [
                'name' => 'Ivy Jane Asilo',
                'department' => null
            ],
            [
                'name' => 'John Legend',
                'department' => null
            ]
        ]);

        DB::table('courses_professors')->insert([
                [
                    'id' => 1,
                    'course_id' => 14,
                    'professor_id' => 20,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 3,
                    'course_id' => 2,
                    'professor_id' => 6,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 4,
                    'course_id' => 3,
                    'professor_id' => 6,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 5,
                    'course_id' => 5,
                    'professor_id' => 6,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 6,
                    'course_id' => 6,
                    'professor_id' => 6,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 7,
                    'course_id' => 38,
                    'professor_id' => 19,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 8,
                    'course_id' => 8,
                    'professor_id' => 4,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 9,
                    'course_id' => 9,
                    'professor_id' => 4,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 10,
                    'course_id' => 28,
                    'professor_id' => 14,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 13,
                    'course_id' => 10,
                    'professor_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 14,
                    'course_id' => 1,
                    'professor_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 15,
                    'course_id' => 18,
                    'professor_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 16,
                    'course_id' => 13,
                    'professor_id' => 15,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 17,
                    'course_id' => 7,
                    'professor_id' => 5,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 18,
                    'course_id' => 7,
                    'professor_id' => 7,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 19,
                    'course_id' => 15,
                    'professor_id' => 18,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 20,
                    'course_id' => 11,
                    'professor_id' => 17,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 21,
                    'course_id' => 16,
                    'professor_id' => 17,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 22,
                    'course_id' => 35,
                    'professor_id' => 9,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 23,
                    'course_id' => 36,
                    'professor_id' => 9,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 24,
                    'course_id' => 37,
                    'professor_id' => 21,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 25,
                    'course_id' => 33,
                    'professor_id' => 10,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 26,
                    'course_id' => 34,
                    'professor_id' => 10,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 27,
                    'course_id' => 25,
                    'professor_id' => 11,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 28,
                    'course_id' => 26,
                    'professor_id' => 11,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 29,
                    'course_id' => 27,
                    'professor_id' => 8,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 30,
                    'course_id' => 12,
                    'professor_id' => 16,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 31,
                    'course_id' => 17,
                    'professor_id' => 16,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 32,
                    'course_id' => 19,
                    'professor_id' => 6,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 33,
                    'course_id' => 20,
                    'professor_id' => 6,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 34,
                    'course_id' => 29,
                    'professor_id' => 12,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 35,
                    'course_id' => 30,
                    'professor_id' => 13,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 36,
                    'course_id' => 23,
                    'professor_id' => 2,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 37,
                    'course_id' => 24,
                    'professor_id' => 2,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 38,
                    'course_id' => 31,
                    'professor_id' => 2,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 39,
                    'course_id' => 32,
                    'professor_id' => 2,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 40,
                    'course_id' => 4,
                    'professor_id' => 2,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 41,
                    'course_id' => 21,
                    'professor_id' => 8,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'id' => 42,
                    'course_id' => 22,
                    'professor_id' => 8,
                    'created_at' => null,
                    'updated_at' => null,
                ]            
        ]);

        DB::table('unavailable_timeslots')->insert([
            [
                'professor_id' => 2,
                'day_id' => 1,
                'timeslot_id' => 1
            ],
            [
                'professor_id' => 6,
                'day_id' => 4,
                'timeslot_id' => 2
            ],
            [
                'professor_id' => 3,
                'day_id' => 5,
                'timeslot_id' => 2
            ],
            [
                'professor_id' => 2,
                'day_id' => 1,
                'timeslot_id' => 3
            ]
        ]);
    }
}
