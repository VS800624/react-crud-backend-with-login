<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return response()->json([
            'status' => true,
            'message' => 'All Student List.',
            'student' => $student,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'phone' => 'required|numeric',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' =>'Validation Error',
                'errors' => $validateUser->errors()->all()
            ],401);
        }

        $student = new Student();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->phone = $request->phone;

        $student->save();

        return response()->json([
            'status' => 'true',
            'message' => 'Student details created successfully',
            'student' => $student
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        if(!$student) {
            return response()->json(['message' => 'Student not found'],404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Single Student Details',
            'student' => $student,
        ],200);
    }

    public function edit(string $id){
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'User not found'], 404);
        }

            return response()->json($student, 200);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validateUser = Validator::make(
            $request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'phone' => 'required|numeric',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' =>'Validation Error',
                'errors' => $validateUser->errors()->all()
            ],401);
        }

         $student = Student::find($id);


        $student->name = $request->name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->phone = $request->phone;

        $student->save();

        return response()->json([
            'status' => true,
            'message' => 'New Student details added successfully',
            'student' => $student
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $student = Student::find($id);
         $student->delete();

         return response()->json([
            'status' => true,
            'message' => 'Student deleted successfully',
            'student' => $student,
         ],201);
    }
    
}
