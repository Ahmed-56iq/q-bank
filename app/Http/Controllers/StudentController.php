<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        return StudentResource::collection(Student::all());
    }

    public function store(StudentRequest $request)
    {
        // $student = Student::create($request->validated());
        // $user = User::create($request->validated());
        // $user->assignRole('student');
        // $user->student_id = $student->id;
        // $user->save();

        // return new StudentResource($student);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return new StudentResource($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json();
    }
}
