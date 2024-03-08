<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Course;
use App\Models\Professor;
use App\Models\CollegeClass;
use App\Models\Department;

class DashboardService
{
    /**
     * Get data for display on the dashboard
     *
     * @return array Data
     */
    public function getData()
    {
        $roomsCount = Room::count();
        $coursesCount = Course::count();
        $professorsCount = Professor::count();
        $classesCount = CollegeClass::count();
        $departmentCount = Department::count();

        $data = [
            'cards' => [
                [
                    'title' => 'Rooms',
                    'icon' => 'home',
                    'value' => $roomsCount
                ],
                [
                    'title' => 'Subjects',
                    'icon' => 'book',
                    'value' => $coursesCount
                ],
                [
                    'title' => 'Professors',
                    'icon' => 'graduation-cap',
                    'value' => $professorsCount
                ],
                [
                    'title' => 'Sections',
                    'icon' => 'users',
                    'value' => $classesCount
                ],
                [
                    'title' => 'Departments',
                    'icon' => 'university',
                    'value' => $departmentCount
                ]
            ]
        ];

        return $data;
    }
}