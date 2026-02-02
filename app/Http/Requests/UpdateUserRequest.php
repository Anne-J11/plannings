<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['sometimes', 'string', 'max:225'],
            'last_name' => ['sometimes', 'string', 'max:225'],
            'email' => [
                'sometimes',
                'email',
                'max:225',
                Rule::unique('users', 'email')->ignore($this->route('user'))
            ],
            'password' => [
                'sometimes',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'birth_date' => ['sometimes', 'date'],
            'role' => ['sometimes', Rule::in(['TEACHER', 'STUDENT'])]
        ];
    }

    public function passedValidation(): void
    {
        if ($this->has('password')) {
            $this->merge([
                'password' => Hash::make($this->password)
            ]);
        }
    }
}