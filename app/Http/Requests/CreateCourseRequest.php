<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'planned_date' => 'required|date',
            'subject_id' => 'required|exists:subjects,id',
            'classroom_id' => 'nullable|exists:classrooms,id'
        ];
    }
}