<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        return response()->json(Subjects::all());
    }

    // POST subjects
    public function store(Request $request)
    {
        $subjects = Subjects::create($data);

        return response()->json($subjects, 201);
    }

    public function destroy(Subjects $subjects){
        $subjects->delete();
        return response()->json(null);
    }

    public function update(UpdateSubjectRequest $request, Subjects $subjects){
        $subjects->update($request->validated());
        return response()->json($subjects);
    }
}
