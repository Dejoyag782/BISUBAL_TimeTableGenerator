<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Professor;
use App\Models\CollegeClass;
use App\Models\AcademicPeriod;
use DB;

class ExportDataController extends Controller
{
    public function export()
    {
        $data = [];

        // Academic Period
        $data[] = ['id','name'];
        $academicperiod = AcademicPeriod::all();
        foreach ($academicperiod as $academicperiod) {
            $data[] = [$academicperiod->id, $academicperiod->name];
        }

        // Course/Section
        $classes = CollegeClass::all();
        $data[] = ['id', 'section_name', 'size'];
        foreach ($classes as $class) {
            $data[] = [
                $class->id,
                $class->name,
                $class->size,
            ];
        }

        // Courses
        $data[] = ['id','course_code','name'];
        $courses = Course::all();
        foreach ($courses as $course) {
            $data[] = [$course->id, $course->course_code, $course->name];
        }

        // Courses_classes
        $coursesClasses = DB::table('courses_classes')->select('id','course_id', 'class_id', 'meetings', 'academic_period_id')->get();
        $data[] = ['id','course_id', 'class_id', 'meetings', 'academic_period_id'];
        foreach ($coursesClasses as $courseClass) {
            $data[] = [
                $courseClass->id,
                $courseClass->course_id,
                $courseClass->class_id,
                $courseClass->meetings,
                $courseClass->academic_period_id,
            ];
        }

        // Courses_Professors
        $coursesProfessors = DB::table('courses_professors')->select('id','course_id', 'professor_id')->get();
        $data[] = ['id','course_id', 'professor_id'];
        foreach ($coursesProfessors as $courseProfessor) {
            $data[] = [
                $courseProfessor->id,
                $courseProfessor->course_id,
                $courseProfessor->professor_id,
            ];
        }

        // Professors_Infos
        $Professors = DB::table('professors')->select('id','name')->get();
        $data[] = ['id','professor_name'];
        foreach ($Professors as $Professor) {
            $data[] = [
                $Professor->id,
                $Professor->name,
            ];
        }

// Now you can use $data to export into a CSV file


        // Generate CSV content
        $csvFileName = 'TTG_exported_data.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        foreach ($data as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);

        return Response::make('', 200, $headers);
    }
}
