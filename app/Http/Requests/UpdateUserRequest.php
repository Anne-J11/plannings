<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'password' => [Password::sometimes()->uncompromised()->min(8)->letters()->mixedCase()->numbers()->symbols()]
            'birth_date' => ['require', 'date']
            'role' => ['require']
        ];
    }

    public function passedValidation(): void{
        if($this->get('password')){
        $this->replace([
            'password'=> Hash::make($this->get('password')) 
            ])}
    }
}
