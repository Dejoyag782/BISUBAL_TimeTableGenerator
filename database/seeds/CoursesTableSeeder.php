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
                'name' => 'Introduction to Computing',
                'course_code' => 'CS 111',
                'room_preference' => null
            ],
            [
                'name' => 'Fundamentals of Proramming (C Language)',
                'course_code' => 'CS 112',
                'room_preference' => null
            ],
            [
                'name' => 'Fundamentals of Programming (C Language) Lab',
                'course_code' => 'CS 112 Lab : 2hr',
                'room_preference' => null
            ],
            [
                'name' => 'Fundamentals of Electricity and Electronics',
                'course_code' => 'Elec 1',
                'room_preference' => null
            ],
            [
                'name' => 'Intermediate Programming 2 (C Language)',
                'course_code' => 'CS 121',
                'room_preference' => null
            ],
            [
                'name' => 'Intermediate Programming 2 (C Language) Lab',
                'course_code' => 'CS 121 Lab : 2hr',
                'room_preference' => null
            ],
            [
                'name' => 'Object-Oriented Programming 1 (Java) ',
                'course_code' => 'CS 122',
                'room_preference' => null
            ],
            [
                'name' => 'Networking and Data Communication',
                'course_code' => 'CS 123',
                'room_preference' => null
            ],
            [
                'name' => 'Networking and Data Communication Lab',
                'course_code' => 'CS 123 Lab : 2hr',
                'room_preference' => null
            ],
            [
                'name' => 'Calculus 1',
                'course_code' => 'Math Elec 1',
                'room_preference' => null
            ],
            [
                'name' => 'Physical Fitness',
                'course_code' => 'PE 2',
                'room_preference' => null
            ],
            [
                'name' => 'CWTS2/ROTC2/LTS2',
                'course_code' => 'NSTP 2',
                'room_preference' => null
            ],
            [
                'name' => 'Understanding the Self',
                'course_code' => 'GE 1',
                'room_preference' => null
            ],
            [
                'name' => 'Purposive Communication',
                'course_code' => 'GE 2',
                'room_preference' => null
            ],
            [
                'name' => 'Mathematic and the Modern World',
                'course_code' => 'GE 3',
                'room_preference' => null
            ],
            [
                'name' => 'Physicall Fitness',
                'course_code' => 'PE 1',
                'room_preference' => null
            ],
            [
                'name' => 'CWTS1/ROTC1/LTS1',
                'course_code' => 'NSTP 1',
                'room_preference' => null
            ],
            [
                'name' => 'Introduction to Computing',
                'course_code' => 'IT 111',
                'room_preference' => null
            ],
            [
                'name' => 'Fundamentals of Programming (C Language)',
                'course_code' => 'IT 112',
                'room_preference' => null
            ],
            [
                'name' => 'Fundamentals of Programming (C Language) Lab',
                'course_code' => 'IT 112 Lab : 2hr',
                'room_preference' => null
            ],
            [
                'name' => 'Fundamentals of Electricity and Electronics',
                'course_code' => 'Free Elec 1',
                'room_preference' => null
            ],
            [
                'name' => 'Fundamentals of Electricity and Electronics Lab',
                'course_code' => 'Free Elec 1 Lab : 2hr',
                'room_preference' => null
            ],
            [
                'name' => 'Electronics Theory and Application',
                'course_code' => 'Elex Tech 1',
                'room_preference' => null
            ],
            [
                'name' => 'Electronics Theory and Application',
                'course_code' => 'Elex Tech 1 Lab : 3hr',
                'room_preference' => null
            ],
            [
                'name' => 'Computer Office Productivity Software Applications',
                'course_code' => 'TC 1',
                'room_preference' => null
            ],
            [
                'name' => 'Computer Office Productivity Software Applications Lab',
                'course_code' => 'TC 1 Lab : 2hr',
                'room_preference' => null
            ],
            [
                'name' => 'Technical Sketching and Instrumental Drawing Lab',
                'course_code' => 'TC 2 Lab : 2hr',
                'room_preference' => null
            ],
            [
                'name' => 'Introduction to Criminology',
                'course_code' => 'Crim 1',
                'room_preference' => null
            ],
            [
                'name' => 'The Contemporary World',
                'course_code' => 'GE 4',
                'room_preference' => null
            ],
            [
                'name' => 'Computer Application 1 (Elective)',
                'course_code' => 'Comp 1',
                'room_preference' => null
            ],
            [
                'name' => 'Electrical Theories and Principles',
                'course_code' => 'Elect Tech 1',
                'room_preference' => null
            ],
            [
                'name' => 'Electrical Theories and Principles Lab',
                'course_code' => 'Elect Tech 1 Lab : 3hr',
                'room_preference' => null
            ],
            [
                'name' => 'Introduction to Food Preparation',
                'course_code' => 'FoodTech 1',
                'room_preference' => null
            ],
            [
                'name' => 'Introduction to Food Preparation Lab',
                'course_code' => 'FoodTech 1 Lab : 3hr',
                'room_preference' => null
            ],
            [
                'name' => 'General Chemistry',
                'course_code' => 'AS 1',
                'room_preference' => null
            ],
            [
                'name' => 'General Chemistry Lab',
                'course_code' => 'AS 1 Lab : 2hr',
                'room_preference' => null
            ],
            [
                'name' => 'Elementary Statistics',
                'course_code' => 'AS 5',
                'room_preference' => null
            ],
            [
                'name' => 'Environmental Science with Education fot Sustainable Development',
                'course_code' => 'GEE 1',
                'room_preference' => null
            ],
            [
                'name' => 'Science,Technology and Society',
                'course_code' => 'GE 7',
                'room_preference' => null
            ]
        ]);
    }
}
