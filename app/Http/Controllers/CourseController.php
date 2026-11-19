<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('courses', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'course_code' => 'required|unique:courses',
        ]);

        Course::create($request->all());

        return redirect('/courses');
    }
}
