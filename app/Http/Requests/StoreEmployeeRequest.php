<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'required|string|max:15',
            'department' => 'required|in:Business Development,Academic Affairs,Digital Marketing,IT',
            'position' => 'required|string|max:255',
            'date_of_joining' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'performance_rating' => 'required|numeric|min:0|max:10',
            'status' => 'required|in:Active,Inactive,On Leave',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name is required.',
            'first_name.string' => 'The first name must be a valid string.',
            'first_name.max' => 'The first name cannot exceed 255 characters.',

            'last_name.required' => 'The last name is required.',
            'last_name.string' => 'The last name must be a valid string.',
            'last_name.max' => 'The last name cannot exceed 255 characters.',

            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',

            'phone_number.required' => 'The phone number is required.',
            'phone_number.string' => 'The phone number must be a valid string.',
            'phone_number.max' => 'The phone number cannot exceed 15 characters.',

            'department.required' => 'Please select a department.',
            'department.in' => 'The selected department is invalid.',

            'position.required' => 'The position field is required.',
            'position.string' => 'The position must be a valid string.',
            'position.max' => 'The position cannot exceed 255 characters.',

            'date_of_joining.required' => 'The date of joining is required.',
            'date_of_joining.date' => 'Please enter a valid date for date of joining.',

            'salary.required' => 'The salary field is required.',
            'salary.numeric' => 'The salary must be a valid number.',
            'salary.min' => 'The salary cannot be negative.',

            'date_of_birth.required' => 'The date of birth is required.',
            'date_of_birth.date' => 'Please enter a valid date of birth.',

            'gender.required' => 'Please select a gender.',
            'gender.in' => 'The selected gender is invalid.',

            'performance_rating.required' => 'The performance rating is required.',
            'performance_rating.numeric' => 'The performance rating must be a number.',
            'performance_rating.min' => 'The performance rating cannot be less than 0.',
            'performance_rating.max' => 'The performance rating cannot be more than 10.',

            'status.required' => 'The employee status is required.',
            'status.in' => 'The selected status is invalid.',
        ];
    }
}
