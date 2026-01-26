<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    // GET /courses
    public function index()
    {
        $courses = Course::with(['subject', 'classroom'])->get();
        return response()->json($courses);
    }

    // POST /courses
    public function store(CreateCourseRequest $request)
    {
        $course = Course::create($request->validated());
        $course->load(['subject', 'classroom']);
        
        return response()->json($course, 201);
    }

    // GET /courses/{course}
    public function show(Course $course)
    {
        $course->load(['subject', 'classroom', 'users']);
        return response()->json($course);
    }

    // PUT/PATCH /courses/{course}
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        $course->load(['subject', 'classroom']);
        
        return response()->json($course);
    }

    // DELETE /courses/{course}
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
}
