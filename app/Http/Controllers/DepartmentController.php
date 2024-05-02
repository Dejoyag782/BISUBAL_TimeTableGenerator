<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DepartmentController.php
use Illuminate\Http\Request;
use App\Models\Department;
use DB;

class DepartmentController extends Controller
{

    /**
     * Service class for handling operations relating to this
     * controller
     *
     * @var App\Services\CoursesService $service
     */
    protected $service;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activated');
    }

    // Other methods for CRUD operations
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Department::paginate(20);
        $classes = DB::table('classes')->select('id','name')->get();

        if ($request->ajax()) {
            return view('departments.table', compact('departments','classes'));
        }
        
        return view('departments.index', compact('departments','classes'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
        {
            return view('departments.create');
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'short_name' => 'unique:departments|required|string|max:255',
            'name' => 'unique:departments|required|string|max:255',
            // Validate other fields as necessary
        ], [
            'short_name.unique' => 'The Department has already been taken.',
            'short_name.required' => 'The Department field is required.',
            'name.unique' => 'The name has already been taken.',
            'name.required' => 'The name field is required.',
        ]);

        // Prepare the data for insertion
        $data = $request->only(['short_name', 'name', 'updated_at', 'created_at']); // Specify every field you want to include
        
        // Handling `courses_under` if it's expected to be an array
        if ($request->has('courses_under')) {
            $data['courses_under'] = json_encode(array_map('strval', $request->courses_under)); // Convert all elements to string and then encode as JSON
        }

        // Create the department
        Department::create($data);

        return response()->json(['message' => 'Department created'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    /**
     * Get a room by id
     *
     * @param int id The id of the room
     * @param Illuminate\Http\Request $request HTTP request
     */
    public function show($id)
    {
        $department = Department::find($id);

        if (!$department) {
            return null;
        }

        return $department;
    }

    /**
     * Retrieve department name based on the provided number.
     *
     * @param  int  $number
     * @return \Illuminate\Http\Response
     */
    public function getDepartmentName($number)
    {
       // Query the database to find the department name based on the provided number
       $class = DB::table('classes')->select('name')->where('id', $number)->first();

       // Check if the class exists
       if ($class) {
           // Return the department name
           return $class->name;
       } else {
           // Return an error message or handle the case where the class doesn't exist
           return response()->json(['error' => 'Class not found'], 404);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return(compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'short_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $department->update($request->all());

        return response()->json(['message' => 'Department updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return response()->json(['message' => 'Department deleted'], 200);
    }
}