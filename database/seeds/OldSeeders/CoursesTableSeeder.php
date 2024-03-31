<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => 'Computer Architecture',
                'course_code' => 'CSM 301',
                'room_preference' => null
            ],
            [
                'name' => 'Computer Graphics',
                'course_code' => 'CSM 302',
                'room_preference' => null
            ],
            [
                'name' => 'Computer Graphics Lab',
                'course_code' => 'CSM 302 Lab : 2hr',
                'room_preference' => null
            ],
            [
                'name' => 'Data Structures and Algorithms I',
                'course_code' => 'CSM 303',
                'room_preference' => null
            ],
            [
                'name' => 'Survey Of Programming Languages',
                'course_code' => 'CSM 304',
                'room_preference' => null
            ],
            [
                'name' => 'System Analysis',
                'course_code' => 'CSM 305',
                'room_preference' => null
            ],
            [
                'name' => 'Artificial Intelligence',
                'course_code' => 'CSM 306',
                'room_preference' => null
            ],
            [
                'name' => 'Operations Research I',
                'course_code' => 'CSM 307',
                'room_preference' => null
            ],
            [
                'name' => 'Web Development',
                'course_code' => 'CSM 308',
                'room_preference' => null
            ],
            [
                'name' => 'Data Structures And Algorithms II',
                'course_code' => 'CSM 311',
                'room_preference' => null
            ],
            [
                'name' => 'Operations Research II',
                'course_code' => 'CSM 312',
                'room_preference' => null
            ],
            [
                'name' => 'Real time and Embedded Systems',
                'course_code' => 'CSM 313',
                'room_preference' => null
            ],
            [
                'name' => 'Ecommerce',
                'course_code' => 'CSM 314',
                'room_preference' => null
            ],
            [
                'name' => 'Accounting',
                'course_code' => 'CSM 315',
                'room_preference' => null
            ],
            [
                'name' => 'Computer Networks',
                'course_code' => 'CSM 401',
                'room_preference' => null
            ],
            [
                'name' => 'Computer Security',
                'course_code' => 'CSM 402',
                'room_preference' => null
            ],
            [
                'name' => 'Information Systems',
                'course_code' => 'CSM 403',
                'room_preference' => null
            ],
            [
                'name' => 'Expert Systems',
                'course_code' => 'CSM 404',
                'room_preference' => null
            ],
            [
                'name' => 'Computer Vision',
                'course_code' => 'CSM 405',
                'room_preference' => null
            ],
            [
                'name' => 'Software Engineering I',
                'course_code' => 'CSM 406',
                'room_preference' => null
            ],
            [
                'name' => 'Cyber Security',
                'course_code' => 'CSM 407',
                'room_preference' => null
            ],
            [
                'name' => 'Robotics',
                'course_code' => 'CSM 411',
                'room_preference' => null
            ],
            [
                'name' => 'Graph Theory',
                'course_code' => 'CSM 412',
                'room_preference' => null
            ],
            [
                'name' => 'Number Theory',
                'course_code' => 'CSM 413',
                'room_preference' => null
            ],
            [
                'name' => 'French',
                'course_code' => 'CSM 414',
                'room_preference' => null
            ]
        ]);
    }
}
