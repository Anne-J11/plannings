<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\CreateClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;

class ClassroomController extends Controller
{
    // GET /classrooms
    public function index()
    {
        return response()->json(Classroom::all());
    }

    // POST /classrooms
    public function store(CreateClassroomRequest $request)
    {
        $classroom = Classroom::create($request->validated());
        return response()->json($classroom, 201);
    }

    // GET /classrooms/{classroom}
    public function show(Classroom $classroom)
    {
        return response()->json($classroom);
    }

    // DELETE /classrooms/{classroom}
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return response()->json(null, 204);
    }

    // PUT/PATCH /classrooms/{classroom}
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update($request->validated());
        return response()->json($classroom);
    }
}