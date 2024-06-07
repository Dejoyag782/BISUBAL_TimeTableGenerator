<?php

namespace App\Services;

use DB;
use App\Models\CollegeClass;

class CollegeClassesService extends AbstractService
{
    /*
     * The model to be used by this service.
     *
     * @var \App\Models\CollegeClass
     */
    protected $model = CollegeClass::class;

    /**
     * Show resources with their relations.
     *
     * @var bool
     */
    protected $showWithRelations = true;

    protected $customFilters = [
        'no_course' => 'getClassesWithNoCourse',
        'available_rooms_empty' => 'getClassesWithNoAvailableRooms' 
    ];

    /**
     * Get a listing of college classes with necessary filtering
     * applied
     *
     */
    public function all($data = [])
    {
        $classes = parent::all($data);

        return $classes;
    }

    /**
     * Add a new college class
     *
     * @param array $data Data for creating a new college class
     * @return App\Models\CollegeClass Newly created class
     */
    public function store($data = [])
    {
        // Create a new class with provided name and size
        $class = CollegeClass::create([
            'name' => $data['name'],
            'size' => $data['size'],
            'available_rooms' => isset($data['available_rooms']) ? $data['available_rooms'] : null, // Handling availableRooms_temp
        ]);
    
        if (!$class) {
            return null;
        }
    
        // Set default value to null if 'unavailable_rooms' key is not present
        $unavailableRooms = $data['unavailable_rooms'] ?? null;
        
        // Set default value to null if 'courses' key is not present
        $courses = $data['courses'] ?? null;
    
        // Sync 'unavailable_rooms' and 'courses'
        if ($unavailableRooms) {
            $class->unavailable_rooms()->sync($unavailableRooms);
        }
        if ($courses) {
            $class->courses()->sync($courses);
        }
    
        return $class;
    }

    /**
     * Get class with given id
     *
     * @param int $id The class' id
     */
    public function show($id)
    {
        $class = parent::show($id);

        if (!$class) {
            return null;
        }

        $roomIds = [];

        foreach ($class->unavailable_rooms as $room) {
            $roomIds[] = $room->id;
        }

        $class->room_ids = $roomIds;

        return $class;
    }

    /**
     * Update the class with the given id
     *
     * @param int $id The ID of the class
     * @param array $data Data
     */
    public function update($id, $data = [])
    {
        $class = CollegeClass::find($id);

        if (!$class) {
            return null;
        }

        $class->update([
            'name' => $data['name'],
            'size' => $data['size'],
            'available_rooms' => isset($data['available_rooms']) ? $data['available_rooms'] : null, // Handling availableRooms_temp
        ]);

        if (!isset($data['unavailable_rooms'])) {
            $data['unavailable_rooms'] = [];
        }

        if (!isset($data['courses'])) {
            $data['courses'] = [];
        }

        $class->unavailable_rooms()->sync($data['unavailable_rooms']);
        $class->courses()->sync($data['courses']);

        return $class;
    }

    /**
     * Return query with filter applied to select classes with no course added for them
     */
    public function getClassesWithNoCourse($query)
    {
        return $query->havingNoCourses();
    }

    /**
     * Return query with filter applied to select classes with no available rooms
     */
    public function getClassesWithNoAvailableRooms($query)
    {
        return $query->whereRaw('JSON_LENGTH(available_rooms) = 0'); // For MySQL
        // For PostgreSQL use: return $query->whereRaw('jsonb_array_length(available_rooms::jsonb) = 0');
    }
}