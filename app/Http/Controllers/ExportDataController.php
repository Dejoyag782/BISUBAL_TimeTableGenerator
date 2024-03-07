<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Professor;
use App\Models\CollegeClass;
use App\Models\AcademicPeriod;
use DB;
use Storage;
use Illuminate\Support\Facades\Response;

class ExportDataController extends Controller
{
    // SQL EXPORT
    public function export()
    {
        $data = "";

        // Academic Period
        $academicPeriods = AcademicPeriod::all();
        foreach ($academicPeriods as $academicPeriod) {
            $data .= "INSERT INTO academic_periods (id, name) VALUES ({$academicPeriod->id}, '{$academicPeriod->name}');\n";
        }

        // Courses
        $courses = Course::all();
        foreach ($courses as $course) {
            $data .= "INSERT INTO courses (id, course_code, name) VALUES ({$course->id}, '{$course->course_code}', '{$course->name}');\n";
        }

        // Professors
        $professors = Professor::all();
        foreach ($professors as $professor) {
            $data .= "INSERT INTO professors (id, name) VALUES ({$professor->id}, '{$professor->name}');\n";
        }

        // College Classes
        $collegeClasses = CollegeClass::all();
        foreach ($collegeClasses as $class) {
            $data .= "INSERT INTO classes (id, name, size) VALUES ({$class->id}, '{$class->name}', {$class->size});\n";
        }

        // Courses_Classes
        $coursesClasses = DB::table('courses_classes')->select('id','course_id', 'class_id', 'meetings', 'academic_period_id')->get();
        foreach ($coursesClasses as $courseClass) {
            $data .= "INSERT INTO courses_classes (id, course_id, class_id, meetings, academic_period_id) VALUES ({$courseClass->id}, {$courseClass->course_id}, {$courseClass->class_id}, '{$courseClass->meetings}', {$courseClass->academic_period_id});\n";
        }

        // Courses_Professors
        $coursesProfessors = DB::table('courses_professors')->select('id','course_id', 'professor_id')->get();
        foreach ($coursesProfessors as $courseProfessor) {
            $data .= "INSERT INTO courses_professors (id, course_id, professor_id) VALUES ({$courseProfessor->id}, {$courseProfessor->course_id}, {$courseProfessor->professor_id});\n";
        }

        // Set the headers for the download
        $headers = [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => 'attachment; filename="TTG_exported_data.sql"',
        ];

        // Return the response with the SQL data
        return Response::make($data, 200, $headers);
    }


// CSV EXPORT
    // public function export()
    //     {
    //         $data = [];

    //         // Academic Period
    //         $data[] = ['id','name'];
    //         $academicperiod = AcademicPeriod::all();
    //         foreach ($academicperiod as $academicperiod) {
    //             $data[] = [$academicperiod->id, $academicperiod->name];
    //         }

    //         // Course/Section
    //         $classes = CollegeClass::all();
    //         $data[] = ['id', 'section_name', 'size'];
    //         foreach ($classes as $class) {
    //             $data[] = [
    //                 $class->id,
    //                 $class->name,
    //                 $class->size,
    //             ];
    //         }

    //         // Courses
    //         $data[] = ['id','subject_code','name'];
    //         $courses = Course::all();
    //         foreach ($courses as $course) {
    //             $data[] = [$course->id, $course->course_code, $course->name];
    //         }

    //         // Courses_classes
    //         $coursesClasses = DB::table('courses_classes')->select('id','course_id', 'class_id', 'meetings', 'academic_period_id')->get();
    //         $data[] = ['id','subject_id', 'section_id', 'meetings', 'academic_period_id'];
    //         foreach ($coursesClasses as $courseClass) {
    //             $data[] = [
    //                 $courseClass->id,
    //                 $courseClass->course_id,
    //                 $courseClass->class_id,
    //                 $courseClass->meetings,
    //                 $courseClass->academic_period_id,
    //             ];
    //         }

    //         // Courses_Professors
    //         $coursesProfessors = DB::table('courses_professors')->select('id','course_id', 'professor_id')->get();
    //         $data[] = ['id','subject_id', 'professor_id'];
    //         foreach ($coursesProfessors as $courseProfessor) {
    //             $data[] = [
    //                 $courseProfessor->id,
    //                 $courseProfessor->course_id,
    //                 $courseProfessor->professor_id,
    //             ];
    //         }

    //         // Professors_Infos
    //         $Professors = DB::table('professors')->select('id','name')->get();
    //         $data[] = ['id','professor_name'];
    //         foreach ($Professors as $Professor) {
    //             $data[] = [
    //                 $Professor->id,
    //                 $Professor->name,
    //             ];
    //         }

    // // Now you can use $data to export into a CSV file


    //         // Generate CSV content
    //         $csvFileName = 'TTG_exported_data.csv';
    //         $headers = [
    //             'Content-Type' => 'text/csv',
    //             'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
    //         ];

    //         $handle = fopen('php://output', 'w');
    //         foreach ($data as $row) {
    //             fputcsv($handle, $row);
    //         }
    //         fclose($handle);

    //         return Response::make('', 200, $headers);
    //     }
}
