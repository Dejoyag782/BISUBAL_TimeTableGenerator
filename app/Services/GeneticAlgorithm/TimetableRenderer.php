<?php

namespace App\Services\GeneticAlgorithm;

use Storage;

use App\Models\Day as DayModel;
use App\Models\Room as RoomModel;
use App\Models\Course as CourseModel;
use App\Models\Timeslot as TimeslotModel;
use App\Models\CollegeClass as CollegeClassModel;
use App\Models\Professor as ProfessorModel;

class TimetableRenderer
{
    protected $timetable;
    /**
     * Create a new instance of this class
     *
     * @param \App\Models\Timetable Timetable whose data we are rendering
     */
    public function __construct($timetable)
    {
        $this->timetable = $timetable;
    }

    /**
     * Generate HTML layout files out of the timetable data
     *
     * Chromosome interpretation is as follows
     * Timeslot, Room, Professor
     *
     */
   // ...

    public function render()
    {
        list($data, $professorSchedules) = $this->generateData(explode(",", $this->timetable->chromosome), explode(",", $this->timetable->scheme));
        
        $days = $this->timetable->days()->orderBy('id', 'ASC')->get();
        $timeslots = TimeslotModel::orderBy('rank', 'ASC')->get();
        $classes = CollegeClassModel::all();
        
        $tableTemplate = '
                        <div style="align-items:center;">
                        <div style="text-align:center; align-items:center;">
                        <img class="d-xl-flex justify-content-xl-left align-items-xl-left" src="http://127.0.0.1:8000/welcome_assets/img/screen-content-phone.png" style="width: 4em;height: 4em;margin-right: 300px;text-align: left; margin-bottom:-100px;">
                        </div><div style=" text-align:center;"><h5>Republic of the Philippines
                                                                        <br>BOHOL ISLAND STATE UNIVERSITY
                                                                        <br>Balilihan Campus
                                                                        <br>Magsija, Balilihan, Bohol</h5></div>
                        </div>
                        <h3 class="text-left">COURSE,YR. & SEC: {TITLE}</h3>
                        <div style="page-break-after: always">
                            <table class="table table-bordered">
                                <thead>
                                    {HEADING}
                                </thead>
                                <tbody>
                                    {BODY}
                                </tbody>
                            </table>
                        </div>';
        
        $content = "";
        
            foreach ($classes as $class) {
            $header = "<tr class='table-head'>";
            $header .= "<td>Days→<br>↓Hours</td>"; // Display hours as header
                foreach ($days as $day) {
                    $header .= "<td>" . strtoupper($day->short_name) . "</td>";
                }
                $header .= "</tr>";

                $body = "";

                foreach ($timeslots as $timeslot) {
                    $body .= "<tr>";
                    
                    // Display hours in the first column
                    $body .= "<td style='width: 50px; height: 50px;'>" . $timeslot->time . "</td>";

                    foreach ($days as $day) {
                        if (isset($data[$class->id][$day->name][$timeslot->time])) {
                            $slotData = $data[$class->id][$day->name][$timeslot->time];
                            $courseCode = $slotData['course_code'];
                            $courseName = $slotData['course_name'];
                            $professor = $slotData['professor'];
                            $room = $slotData['room'];

                            if (strpos($courseCode, 'Lab') !== false) {
                                preg_match('/Lab : (\d+)hr/', $courseCode, $matches);
                                if (!empty($matches[1])) {
                                    $labHours = intval($matches[1]);
                                    // Generate cell for the first row of the lab class
                                    // $body .= "<td class='text-center' style='width: 50px; height: 50px;' rowspan='{$labHours}'>";
                                    $body .= "<td class='text-center' style='width: 50px; height: 50px; background-color: #cccccc !important;'>";
                                    // Your existing code to populate cell content...
                                    $body .= "<span class='course_code'>$courseCode</span><br />";
                                    $body .= "<span class='room pull-left'>$room</span>";
                                    $body .= "<span class='professor pull-right'>$professor</span>";
                                    $body .= "</td>";

                                }
                            } else {
                                // Generate cell for non-lab class
                                $body .= "<td class='text-center' style='width: 50px; height: 50px;'>";
                                $body .= "<span class='course_code'>{$courseCode}</span><br />";
                                $body .= "<span class='room pull-left'>{$room}</span>";
                                $body .= "<span class='professor pull-right'>{$professor}</span>";
                                $body .= "</td>";

                            }
                        } else {
                                // Generate empty cell if no data available
                                $body .= "<td style='width: 100px; height: 50px;'></td>";                        
                        }
                    }
                
                $body .= "</tr>";
            }

        $title = $class->name;
        $content .= str_replace(['{TITLE}', '{HEADING}', '{BODY}'], [$title, $header, $body], $tableTemplate);
    }

        
        // Return the generated content instead of saving it to a file
        return $content;
    }

   
//---------------------------------------------------------Start of Faculty Load Renderer-----------------------------------------------------------//
    public function renderFacultyLoad()
    {
        list($data, $professorSchedules) = $this->generateData(explode(",", $this->timetable->chromosome), explode(",", $this->timetable->scheme));
        
        $days = $this->timetable->days()->orderBy('id', 'ASC')->get();
        $timeslots = TimeslotModel::orderBy('rank', 'ASC')->get();
        $professors = ProfessorModel::all();
        
        $tableTemplate = '<div style="align-items:center;">
                                <div style="text-align:center; align-items:center;">
                                <img class="d-xl-flex justify-content-xl-left align-items-xl-left" src="http://127.0.0.1:8000/welcome_assets/img/screen-content-phone.png" style="width: 4em;height: 4em;margin-right: 300px;text-align: left; margin-bottom:-100px;">
                                </div><div style=" text-align:center;"><h5>Republic of the Philippines
                                                                        <br>BOHOL ISLAND STATE UNIVERSITY
                                                                        <br>Balilihan Campus
                                                                        <br>Magsija, Balilihan, Bohol</h5>
                        </div>
                        <h3 class="text-left">PROF NAME: {TITLE}</h3>
                        <div style="page-break-after: always">
                            <table class="table table-bordered">
                                <thead>
                                    {HEADING}
                                </thead>
                                <tbody>
                                    {BODY}
                                </tbody>
                            </table>
                        </div>';
        
        $content = "";
        
        foreach ($professors as $professor) {
            $professorHeader = "<tr class='table-head'>";
            $professorHeader .= "<td>Days→<br>↓Hours</td>"; // Empty cell in the first column for hours
            
            foreach ($days as $day) {
                $professorHeader .= "\t<td>" . strtoupper($day->short_name) . "</td>";
            }
            
            $professorHeader .= "</tr>";
            
            $professorBody = "";
            
            foreach ($timeslots as $timeslot) {
                $professorBody .= "<tr><td style='width: 50px; height: 50px;'>" . $timeslot->time . "</td>";
                
                foreach ($days as $day) {

                    $facultyLoadValue = $this->getFacultyLoadForTimeslot($professor->id, $data, $day->name, $timeslot->time);
                    $professorScheduleValue = $this->getProfessorScheduleValue($professor->id, $professorSchedules, $day->name, $timeslot->time);
                    
                    if ($professorScheduleValue !== null) {
                        if (strpos($professorScheduleValue, 'Lab') !== false) {
                            $professorBody .= "<td style='width: 50px; height: 50px; background-color: #cccccc !important;'>";
                        } else {
                            $professorBody .= "<td style='width: 50px; height: 50px;'>";
                        }
                    }else{
                        $professorBody .= "<td style='width: 50px; height: 50px;'>";
                    }
                    
                    if ($facultyLoadValue > 0) {
                        $professorBody .= "<div class='faculty-load'>{$facultyLoadValue}</div>";
                    }
                    
                    if ($professorScheduleValue !== null) {
                        $professorBody .= "<div class='professor-schedule'>{$professorScheduleValue}</div>";
                    }
                    
                    $professorBody .= "</td>";
                }
                $professorBody .= "</tr>";
            }
            
            $professorTitle = $professor->name;
            $content .= str_replace(['{TITLE}', '{HEADING}', '{BODY}'], [$professorTitle, $professorHeader, $professorBody], $tableTemplate);
        }
        
        // Return the generated content instead of saving it to a file
        return $content;
    }


    
    protected function getFacultyLoadForTimeslot($professorId, $data, $dayName, $timeslot)
    {
        $facultyLoad = 0;
    
        foreach ($data as $classId => $classData) {
            foreach ($classData as $day => $timeslots) {
                foreach ($timeslots as $time => $slotData) {
                    if ($day == $dayName && $time == $timeslot && $slotData['professor'] == $professorId) {
                        $facultyLoad++;
                    }
                }
            }
        }
    
        return $facultyLoad;
    }
    
    protected function generateProfessorSchedules($chromosome, $scheme)
    {
        $professorSchedules = [];
        $schemeIndex = 0;
        $chromosomeIndex = 0;
    
        while ($chromosomeIndex < count($chromosome)) {
            $professorGene = $chromosome[$chromosomeIndex + 2];
            $matches = [];
            preg_match('/D(\d*)T(\d*)/', $chromosome[$chromosomeIndex], $matches);
    
            $dayId = $matches[1];
            $timeslotId = $matches[2];
    
            $day = DayModel::find($dayId);
            $timeslot = TimeslotModel::find($timeslotId);
    
            if (!isset($professorSchedules[$professorGene])) {
                $professorSchedules[$professorGene] = [];
            }
    
            if (!isset($professorSchedules[$professorGene][$day->name][$timeslot->time])) {
                $professorSchedules[$professorGene][$day->name][$timeslot->time] = true;
            }
    
            $schemeIndex++;
            $chromosomeIndex += 3;
        }
    
        return $professorSchedules;
    }
    
    protected function getProfessorScheduleValue($professorId, $professorSchedules, $dayName, $timeslot)
    {
        if (isset($professorSchedules[$professorId][$dayName][$timeslot])) {
            $scheduleData = $professorSchedules[$professorId][$dayName][$timeslot];
            $output = '';

            foreach ($scheduleData as $entry) {
                $class = CollegeClassModel::find($entry['class_id']);
                $course = CourseModel::find($entry['course_id']);
                $room = RoomModel::find($entry['room_id']);

                $output .= "<span class='schedule-entry'>";
                $output .= "<strong>{$course->course_code}:</strong> {$course->name} ({$class->name}), ";
                $output .= "<strong>Room:</strong> {$room->name}<br>";
                $output .= "</span>";
            }

            return $output;
        }

        return null;
    }

//------------------------------------------------End of Faculty Load Renderer---------------------------------------------------------------------//

//------------------------------------------------Start of Room Usage Renderer---------------------------------------------------------------------//
    /**
     * Generate HTML layout files for room usage
     */
    public function renderRoomUsage()
    {
        list($data, $professorSchedules, $roomUsages) = $this->generateData(
            explode(",", $this->timetable->chromosome),
            explode(",", $this->timetable->scheme)
        );

        $days = $this->timetable->days()->orderBy('id', 'ASC')->get();
        $timeslots = TimeslotModel::orderBy('rank', 'ASC')->get();
        $rooms = RoomModel::all();

        $tableTemplate = '<div style="align-items:center;">
                                <div style="text-align:center; align-items:center;">
                                <img class="d-xl-flex justify-content-xl-left align-items-xl-left" src="http://127.0.0.1:8000/welcome_assets/img/screen-content-phone.png" style="width: 4em;height: 4em;margin-right: 300px;text-align: left; margin-bottom:-100px;">
                                </div><div style=" text-align:center;"><h5>Republic of the Philippines
                                                                        <br>BOHOL ISLAND STATE UNIVERSITY
                                                                        <br>Balilihan Campus
                                                                        <br>Magsija, Balilihan, Bohol</h5>
                        </div>  
                        <h3 class="text-left">ROOM: {TITLE}</h3>
                        <div style="page-break-after: always">
                            <table class="table table-bordered">
                                <thead>
                                    {HEADING}
                                </thead>
                                <tbody>
                                    {BODY}
                                </tbody>
                            </table>
                        </div>';

        $content = "";

        foreach ($rooms as $room) {
            $header = "<tr class='table-head'>";
            $header .= "<td></td>"; // Empty cell in the first column for hours

            foreach ($days as $day) {
                $header .= "\t<td>" . strtoupper($day->short_name) . "</td>";
            }

            $header .= "</tr>";

            $body = "";

            foreach ($timeslots as $timeslot) {
                $body .= "<tr><td style='width: 50px; height: 50px;'>" . $timeslot->time . "</td>";

                foreach ($days as $day) {
                    $roomUsageId = $this->getRoomUsageId($roomUsages, $room->id, $day->name, $timeslot->time);

                    if ($roomUsageId !== null) {
                        if (strpos($roomUsageId, 'Lab') !== false) {
                            $body .= "<td style='width: 50px; height: 50px; background-color: #cccccc !important;'>";
                        } else {
                            $body .= "<td style='width: 50px; height: 50px;'>";
                        }
                    }else{
                        $body .= "<td style='width: 50px; height: 50px;'>";
                    }
                    
                    if ($roomUsageId !== null) {
                        $body .= "<div class='room-usage'>$roomUsageId</div>";
                    }

                    $body .= "</td>";
                }
                $body .= "</tr>";
            }

            $title = $room->name;
            $content .= str_replace(['{TITLE}', '{HEADING}', '{BODY}'], [$title, $header, $body], $tableTemplate);
        }

        // Return the generated content instead of saving it to a file
        return $content;
    }


    protected function getRoomUsageId($roomUsages, $roomId, $dayName, $timeslot)
    {
        if (isset($roomUsages[$roomId][$dayName][$timeslot])) {
            $roomUsageData = $roomUsages[$roomId][$dayName][$timeslot];
            $output = '';
    
            foreach ($roomUsageData as $entry) {
                $class = CollegeClassModel::find($entry['class_id']);
                $course = CourseModel::find($entry['course_id']);
                $professor = ProfessorModel::find($entry['professor_id']);
    
                $output .= "<span class='room-usage-entry'>";
                $output .= "<strong>{$course->course_code}:</strong> {$course->name} ({$class->name}), ";
                $output .= "<strong>Professor:</strong> {$professor->name}<br>";
                $output .= "</span>";
            }
    
            return $output;
        }
    
        return null;
    }
//------------------------------------------------End of Room Usage Renderer---------------------------------------------------------------------//
        

//--------------------------------------------------Start of Concatenate Timetables-------------------------------------------------------------------------//
public function renderAndSave()
{
    // Run the render method to get the content of the timetable
    $timetableContent = $this->render();

    // Run the renderFacultyLoad method to get the content of the faculty load timetable
    $facultyLoadContent = $this->renderFacultyLoad();

    // Run the renderRoomUsage method to get the content of the room usage timetable
    $roomUsageContent = $this->renderRoomUsage();

    // Add labels or titles to each section with blank pages
    $timetableContent = '<div style="page-break-after: always; margin:auto;"><h2>Student Load</h2></div>' . $timetableContent;
    $facultyLoadContent = '<div style="page-break-after: always; margin:auto;"><h2>Professor Load</h2></div>' . $facultyLoadContent;
    $roomUsageContent = '<div style="page-break-after: always; margin:auto;"><h2>Room Utilization</h2></div>' . $roomUsageContent;

    // Concatenate the content of all timetables
    $combinedContent = $timetableContent . $facultyLoadContent . $roomUsageContent;

    // Save the combined content in a single HTML file
    $combinedPath = 'public/timetables/combined_' . $this->timetable->id . '.html';
    Storage::put($combinedPath, $combinedContent);

    // Update the timetable's file_url to point to the combined file
    $this->timetable->update([
        'file_url' => $combinedPath
    ]);

    return $combinedContent;
}



//--------------------------------------------------End of Concatenate Timetables-------------------------------------------------------------------------//


   /**
     * Get an associative array with data for constructing timetable
     *
     * @param array $chromosome Timetable chromosome
     * @param array $scheme Mapping for reading chromosome
     * @return array Timetable data, Professor schedules, and Room usages
     */
    public function generateData($chromosome, $scheme)
    {
        $data = [];
        $professorSchedules = [];
        $roomUsages = []; // New data structure to store room usages
        $schemeIndex = 0;
        $chromosomeIndex = 0;
        $groupId = null;

        while ($chromosomeIndex < count($chromosome)) {
            while ($scheme[$schemeIndex][0] == 'G') {
                $groupId = substr($scheme[$schemeIndex], 1);
                $schemeIndex += 1;
            }

            $courseId = $scheme[$schemeIndex];

            $class = CollegeClassModel::find($groupId);
            $course = CourseModel::find($courseId);

            $timeslotGene = $chromosome[$chromosomeIndex];
            $roomGene = $chromosome[$chromosomeIndex + 1];
            $professorGene = $chromosome[$chromosomeIndex + 2];

            $matches = [];
            preg_match('/D(\d*)T(\d*)/', $timeslotGene, $matches);

            $dayId = $matches[1];
            $timeslotId = $matches[2];

            $day = DayModel::find($dayId);
            $timeslot = TimeslotModel::find($timeslotId);
            $professor = ProfessorModel::find($professorGene);
            $room = RoomModel::find($roomGene);

            // Populate the general timetable data structure
            if (!isset($data[$groupId])) {
                $data[$groupId] = [];
            }

            if (!isset($data[$groupId][$day->name])) {
                $data[$groupId][$day->name] = [];
            }

            if (!isset($data[$groupId][$day->name][$timeslot->time])) {
                $data[$groupId][$day->name][$timeslot->time] = [];
            }

            $data[$groupId][$day->name][$timeslot->time]['course_code'] = $course->course_code;
            $data[$groupId][$day->name][$timeslot->time]['course_name'] = $course->name;
            $data[$groupId][$day->name][$timeslot->time]['room'] = $room->name;
            $data[$groupId][$day->name][$timeslot->time]['professor'] = $professor->name;

            // Populate the professors' schedule data structure
            if (!isset($professorSchedules[$professor->id])) {
                $professorSchedules[$professor->id] = [];
            }

            if (!isset($professorSchedules[$professor->id][$day->name])) {
                $professorSchedules[$professor->id][$day->name] = [];
            }

            if (!isset($professorSchedules[$professor->id][$day->name][$timeslot->time])) {
                $professorSchedules[$professor->id][$day->name][$timeslot->time] = [];
            }

            $professorSchedules[$professor->id][$day->name][$timeslot->time][] = [
                'class_id' => $class->id,
                'course_id' => $course->id,
                'room_id' => $room->id,
            ];

            // Populate the room usages data structure
            if (!isset($roomUsages[$room->id])) {
                $roomUsages[$room->id] = [];
            }

            if (!isset($roomUsages[$room->id][$day->name])) {
                $roomUsages[$room->id][$day->name] = [];
            }

            if (!isset($roomUsages[$room->id][$day->name][$timeslot->time])) {
                $roomUsages[$room->id][$day->name][$timeslot->time] = [];
            }

            $roomUsages[$room->id][$day->name][$timeslot->time][] = [
                'class_id' => $class->id,
                'course_id' => $course->id,
                'professor_id' => $professor->id,
            ];

            $schemeIndex++;
            $chromosomeIndex += 3;
        }

        // Now, you can use $professorSchedules and $roomUsages to get professors' schedules and room usages.
        return [$data, $professorSchedules, $roomUsages];
    }

}