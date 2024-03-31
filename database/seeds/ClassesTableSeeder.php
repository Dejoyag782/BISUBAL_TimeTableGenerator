<?php

use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'name' => 'CS 1-A',
                'size' => 28
            ],
            [
                'name' => 'CS 1-B',
                'size' => 25
            ],
            [
                'name' => 'Elex 1',
                'size' => 25
            ],
            [
                'name' => 'FoodTech 1',
                'size' => 25
            ],
            [
                'name' => 'Crim 1',
                'size' => 25
            ],
            [
                'name' => 'IT 1',
                'size' => 25
            ],
            [
                'name' => 'Elec 1',
                'size' => 25
            ]
        ]);

        // CS 1-A Seeder
        DB::table('courses_classes')->insert([
                [
                    'course_id' => 1,
                    'class_id' => 1,
                    'meetings' => 3,
                    'academic_period_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'course_id' => 3,
                    'class_id' => 1,
                    'meetings' => 2,
                    'academic_period_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'course_id' => 4,
                    'class_id' => 1,
                    'meetings' => 2,
                    'academic_period_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'course_id' => 12,
                    'class_id' => 1,
                    'meetings' => 1,
                    'academic_period_id' => 2,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'course_id' => 13,
                    'class_id' => 1,
                    'meetings' => 3,
                    'academic_period_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'course_id' => 14,
                    'class_id' => 1,
                    'meetings' => 3,
                    'academic_period_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'course_id' => 15,
                    'class_id' => 1,
                    'meetings' => 3,
                    'academic_period_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'course_id' => 17,
                    'class_id' => 1,
                    'meetings' => 1,
                    'academic_period_id' => 1,
                    'created_at' => null,
                    'updated_at' => null,
                ]
        ]);
        // CS 1-B Seeder
        DB::table('courses_classes')->insert([
            [
                'course_id' => 1,
                'class_id' => 2,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 3,
                'class_id' => 2,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 4,
                'class_id' => 2,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 12,
                'class_id' => 2,
                'meetings' => 1,
                'academic_period_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 13,
                'class_id' => 2,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 14,
                'class_id' => 2,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 15,
                'class_id' => 2,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 17,
                'class_id' => 2,
                'meetings' => 1,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ]
        ]);

    // Elex 1 Seeder
        DB::table('courses_classes')->insert([
            [
                'course_id' => 23,
                'class_id' => 3,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 24,
                'class_id' => 3,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 13,
                'class_id' => 3,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 15,
                'class_id' => 3,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 25,
                'class_id' => 3,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 26,
                'class_id' => 3,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 27,
                'class_id' => 3,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 39,
                'class_id' => 3,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ]
        ]);

        // Food Tech 1

        DB::table('courses_classes')->insert([
            [
                'course_id' => 14,
                'class_id' => 4,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 16,
                'class_id' => 4,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 17,
                'class_id' => 4,
                'meetings' => 1,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 33,
                'class_id' => 4,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 34,
                'class_id' => 4,
                'meetings' => 1,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 35,
                'class_id' => 4,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 36,
                'class_id' => 4,
                'meetings' => 1,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 37,
                'class_id' => 4,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ]
        ]);

        // Crim 1
        DB::table('courses_classes')->insert([
            [
                'course_id' => 13,
                'class_id' => 5,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 14,
                'class_id' => 5,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 15,
                'class_id' => 5,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 16,
                'class_id' => 5,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 17,
                'class_id' => 5,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 28,
                'class_id' => 5,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 29,
                'class_id' => 5,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 30,
                'class_id' => 5,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ]
        ]);

        // IT 1
        DB::table('courses_classes')->insert([
            [
                'course_id' => 3,
                'class_id' => 6,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 13,
                'class_id' => 6,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 14,
                'class_id' => 6,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 15,
                'class_id' => 6,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 16,
                'class_id' => 6,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 17,
                'class_id' => 6,
                'meetings' => 1,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 18,
                'class_id' => 6,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 19,
                'class_id' => 6,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 21,
                'class_id' => 6,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 22,
                'class_id' => 6,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ]
        ]);

        // Elec 1
        DB::table('courses_classes')->insert([
            [
                'course_id' => 13,
                'class_id' => 7,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 15,
                'class_id' => 7,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 16,
                'class_id' => 7,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 17,
                'class_id' => 7,
                'meetings' => 1,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 25,
                'class_id' => 7,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 26,
                'class_id' => 7,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 27,
                'class_id' => 7,
                'meetings' => 1,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 31,
                'class_id' => 7,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 32,
                'class_id' => 7,
                'meetings' => 2,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'course_id' => 39,
                'class_id' => 7,
                'meetings' => 3,
                'academic_period_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ]
        ]);

    // UNAVAILABLE ROOMS SEEDER // UNAVAILABLE ROOMS SEEDER // UNAVAILABLE ROOMS SEEDER // UNAVAILABLE ROOMS SEEDER // UNAVAILABLE ROOMS SEEDER // UNAVAILABLE ROOMS SEEDER //

    // CS 1-B Unavailable rooms
    DB::table('unavailable_rooms')->insert([
        [
            'class_id' => 1,
            'room_id' => 12,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 1,
            'room_id' => 14,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 1,
            'room_id' => 15,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 1,
            'room_id' => 16,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 1,
            'room_id' => 17,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 1,
            'room_id' => 18,
            'created_at' => null,
            'updated_at' => null,
        ],
    ]);

    // CS 1-B Unavailable rooms
    DB::table('unavailable_rooms')->insert([
        [
            'class_id' => 2,
            'room_id' => 12,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 2,
            'room_id' => 14,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 2,
            'room_id' => 15,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 2,
            'room_id' => 16,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 2,
            'room_id' => 17,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 2,
            'room_id' => 18,
            'created_at' => null,
            'updated_at' => null,
        ],
    ]);

    // Elex 1 Unavailable rooms
    DB::table('unavailable_rooms')->insert([
        [
            'class_id' => 3,
            'room_id' => 12,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 3,
            'room_id' => 14,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 3,
            'room_id' => 15,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 3,
            'room_id' => 16,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 3,
            'room_id' => 17,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 3,
            'room_id' => 18,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 3,
            'room_id' => 7,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 3,
            'room_id' => 8,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 3,
            'room_id' => 9,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 3,
            'room_id' => 10,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 4,
            'room_id' => 7,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 4,
            'room_id' => 8,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 4,
            'room_id' => 9,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 4,
            'room_id' => 10,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 4,
            'room_id' => 15,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 4,
            'room_id' => 16,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 4,
            'room_id' => 17,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 4,
            'room_id' => 18,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 5,
            'room_id' => 6,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 5,
            'room_id' => 7,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 5,
            'room_id' => 8,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 5,
            'room_id' => 9,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 5,
            'room_id' => 10,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 5,
            'room_id' => 12,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 6,
            'room_id' => 12,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 6,
            'room_id' => 14,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 6,
            'room_id' => 15,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 6,
            'room_id' => 16,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 6,
            'room_id' => 17,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 6,
            'room_id' => 18,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 7,
            'room_id' => 7,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 7,
            'room_id' => 8,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 7,
            'room_id' => 9,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 7,
            'room_id' => 10,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 7,
            'room_id' => 12,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 7,
            'room_id' => 16,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 7,
            'room_id' => 17,
            'created_at' => null,
            'updated_at' => null,
        ],
        [
            'class_id' => 7,
            'room_id' => 18,
            'created_at' => null,
            'updated_at' => null,
        ]
    ]);

    }
}
