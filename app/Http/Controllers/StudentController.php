<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
use App\Models\Course;
use App\Models\Profile;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('department', 'profile', 'courses')->get();
        $departments = Department::all();
        $courses = Course::all();

        return view('students.index', compact('students', 'departments', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'department_id' => 'required'
        ]);

        Student::create($request->all());

        return redirect('/students');
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::findOrFail($request->student_id);

        $student->courses()->syncWithoutDetaching([$request->course_id]);

        return redirect('/students');
    }

    public function addProfile(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Profile::create($request->all());

        return redirect('/students');
    }
}
