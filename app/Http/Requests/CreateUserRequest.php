<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Enums\UserRole;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:225'],
            'last_name' => ['required', 'string', 'max:225'],
            'email' => ['required', 'email', 'max:225', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'birth_date' => ['required', 'date'],
            'role' => ['required', Rule::in(['TEACHER', 'STUDENT'])]
        ];
    }

    public function passedValidation(): void
    {
        $this->merge([
            'password' => Hash::make($this->password)
        ]);
    }
}