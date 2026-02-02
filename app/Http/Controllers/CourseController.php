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
        $courses = (['subject', 'classroom']);
        return CourseResource::collection(Course::with(relations:'user')->get());
    }

    // POST /courses
    public function store(CreateCourseRequest $request)
    {
        $course = Course::create($request->validated());
        $course->load(['subject', 'classroom']);
        
        return new CourseResource($course, 201);
    }

    // GET /courses/{course}
    public function show(Course $course)
    {
        $course->load(['subject', 'classroom', 'users']);
        return new CourseResource($course);
    }

    // PUT/PATCH /courses/{course}
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        $course->load(['subject', 'classroom']);
        
        return new CourseResource($course);
    }

    // DELETE /courses/{course}
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }

    public function addUserToCourse(Course $course, User $user)    {
        $course->users()->syncWithoutDetaching($user->id);
        return new CourseResource($course->load('users'));
    }

    public function syncUsersToCourse(Course $course, SyncUsersToCourseRequest $request)
    {
        $course->users()->sync($request->user_ids);
        return new CourseResource($course->load('users'));
    }
}
