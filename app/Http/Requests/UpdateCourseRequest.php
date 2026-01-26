<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'planned_date' => 'sometimes|date',
            'subject_id' => 'sometimes|exists:subjects,id',
            'classroom_id' => 'nullable|exists:classrooms,id'
        ];
    }
}