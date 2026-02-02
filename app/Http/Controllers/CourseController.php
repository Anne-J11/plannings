<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\SyncUsersToCourseRequest;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    // GET /courses
    public function index()
    {
        $courses = Course::with(['subject', 'classroom', 'users'])->get();
        return CourseResource::collection($courses);
    }

    // POST /courses
    public function store(CreateCourseRequest $request)
    {
        $course = Course::create($request->validated());
        $course->load(['subject', 'classroom']);
        
        return new CourseResource($course);
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

    // PUT /courses/{course}/users/{user}
    public function addUserToCourse(Course $course, User $user)
    {
        $course->users()->syncWithoutDetaching($user->id);
        return new CourseResource($course->load('users'));
    }

    // POST /courses/{course}/users
    public function syncUsersToCourse(Course $course, SyncUsersToCourseRequest $request)
    {
        $course->users()->sync($request->user_ids);
        return new CourseResource($course->load('users'));
    }
}