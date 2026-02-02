<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\CreateSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectsController extends Controller
{
    // GET /subjects
    public function index()
    {
        return response()->json(Subject::all());
    }

    // POST /subjects
    public function store(CreateSubjectRequest $request)
    {
        $subject = Subject::create($request->validated());
        return response()->json($subject, 201);
    }

    // GET /subjects/{subject}
    public function show(Subject $subject)
    {
        return response()->json($subject);
    }

    // DELETE /subjects/{subject}
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json(null, 204);
    }

    // PUT/PATCH /subjects/{subject}
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());
        return response()->json($subject);
    }
}