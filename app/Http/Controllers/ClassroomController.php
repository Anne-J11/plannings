<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{
    // GET /classrooms
    public function index()
    {
        return response()->json(Classroom::all());
    }

    // POST /classrooms
    public function store(Request $request)
    {
        $classroom = Classroom::create($data);

        return response()->json($classroom, 201);
    }

    public function show(Classroom $classroom){
        return response()->json($classroom);
    }

    public function destroy(Classroom $classroom){
        $classroom->delete();
        return response()->json(null);
    }

    public function update(UpdateClassroomRequest $request, Classroom $classroom){
        $classroom->update($request->validated());
        return response()->json($classroom);
    }
}
