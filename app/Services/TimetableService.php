<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Timetable;
use App\Models\Professor;
use App\Models\CollegeClass;
use App\Models\Department;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class TimetableService
{
    /**
     * Check that everything is intact to create a timetable set
     * Return errors from check
     *
     * @return array Errors from check
     */
    public function checkCreationConditions()
    {
        $errors = [];

        $coursesQuery = 'SELECT id FROM courses WHERE id NOT IN (SELECT DISTINCT course_id FROM courses_professors)';
        $courseIds = DB::select($coursesQuery);
        // Check if there is a campus director
        $campusDirector = User::where('designation', 'campusdirector')->first();

        // Check for Deans and Chairpersons for each department
        $departments = Department::all();
        foreach ($departments as $department) {
            $dean = User::where('department', $department->id)->where('designation', 'dean')->first();
            $chairperson = User::where('department', $department->id)->where('designation', 'chairperson')->first();
            
            if (!$dean) {
                $errors[] = "No Dean assigned for the department: {$department->name}.";
            }
            if ($dean) {
                // $errors[] = "No Dean assigned for the department: {$department->name}.";
                continue;
            }
            if (!$chairperson) {
                $errors[] = "No Chairperson assigned for the department: {$department->name}.";
            }
            if ($chairperson) {
                // $errors[] = "No Chairperson assigned for the department: {$department->name}.";
                continue;
            }
        }

        if (!$campusDirector) {
            $errors[] = "Campus Director not found. Please contact System Administrator to assign a Campus Director.";
        }

        if (count($courseIds)) {
            $errors[] = "Some subjects don't have professors.<a href=\"/courses?filter=no_professor\" target=\"_blank\">Click here to review them</a>";
        }

        if (!CollegeClass::count()) {
            $errors[] = "No sections/classes have been added";
        }

        if (!Department::count()) {
            $errors[] = "No departments have been added";
        }

        $classesQuery = 'SELECT id FROM classes WHERE id NOT IN (SELECT DISTINCT class_id FROM courses_classes)';
        $classIds = DB::select($classesQuery);

        if (count($classIds)) {
            $errors[] = "Some classes don't have any course set up.<a href=\"/classes?filter=no_course\" target=\"_blank\">Click here to review them</a>";
        }

        return $errors;
    }
}
