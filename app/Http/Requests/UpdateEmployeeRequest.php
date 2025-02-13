<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|string|max:15',
            'department' => 'nullable|in:Business Development,Academic Affairs,Digital Marketing,IT',
            'position' => 'nullable|string|max:255',
            'date_of_joining' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'performance_rating' => 'nullable|numeric|min:0|max:10',
            'status' => 'nullable|in:Active,Inactive,On Leave',
        ];
    }
}
