<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['require', 'string', 'max:225'] 
            'last_name' => ['require', 'string', 'max:225']
            'email' => ['require', 'email', 'max:225']
            'password' => ['require']
            'birth_date' => ['require', 'date']
            'role' => ['require']
        ];
    }

    public function passedValidation(): void{
        $this->replace([
            'password'=> Hash::make($this->get('password')) 
            ])
    }
}
