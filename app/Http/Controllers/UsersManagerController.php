<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Datatables;


class UsersManagerController extends Controller

{
    //  /**
    //   * Display a listing of the resource.
    //   *
    //   * @return \Illuminate\Http\Response
    //   */
    public function index()
    {
        $department = DB::table('departments')->select('id','name')->get();
        if(request()->ajax()) {
            return datatables()->of(User::select('users.*', 'departments.short_name as department_short_name')
                ->leftJoin('departments', 'users.department', '=', 'departments.id'))
                ->addColumn('action', 'user/user-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('user.index',compact('department'));
    }

    
       
       
    //  /**
    //   * Store a newly created resource in storage.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return \Illuminate\Http\Response
    //   */
     public function store(Request $request)
     {  
  
        $usersId = $request->id;
  
        $userData = [
            'name' => $request->name, 
            'email' => $request->email,
            'role' => $request->role,
            'department' => $request->department,
            'designation' => $request->designation,
        ];
    
        // Check if password is provided in the request
        if (!is_null($request->password)) {
            $userData['password'] = $request->password;
        }
    
        $users = User::updateOrCreate(
            [
                'id' => $usersId
            ],
            $userData
        );    
                              
        return response()->json($users);
  
     }

    
       
    //  /**
    //   * Show the form for editing the specified resource.
    //   *
    //   * @param  \App\company  $company
    //   * @return \Illuminate\Http\Response
    //   */
     public function edit(Request $request)
     {   
         $where = array('id' => $request->id);
         $users  = User::where($where)->first();
         
       
         return Response()->json($users);
     }
       
     protected function create(array $data)
     {
         return User::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'department' => $data['department'],
             'designation' => $data['designation'],
             'password' => Hash::make($data['password']),
         ]);
     }

     //  show
    public function getUserDetails($id)
    {
        
        $user = User::find($id);
        return response()->json($user);
    }
    //  /**
    //   * Remove the specified resource from storage.
    //   *
    //   * @param  \App\company  $company
    //   * @return \Illuminate\Http\Response
    //   */
     public function destroy(Request $request)
     {
         $users = User::where('id',$request->id)->delete();
       
         return Response()->json($users);
     }

     // In your controller, retrieve the data
        public function fetchData() {
            // Retrieve data from your model or source (e.g., database)
            $data = User::all(); // Replace YourModel with your actual model

            return response()->json($data);
        }

 }
