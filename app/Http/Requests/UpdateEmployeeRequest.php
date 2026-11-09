<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $employeeId = $this->route('employee')->id;

        return [
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150', Rule::unique('employees', 'email')->ignore($employeeId)],
            'phone' => ['required', 'string', 'max:20'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'in:male,female,other'],
            'address' => ['required', 'string', 'max:500'],
            'department_id' => ['required', 'exists:departments,id'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    public function attributes(): array
    {
        return [
            'department_id' => 'department',
            'date_of_birth' => 'date of birth',
            'profile_photo' => 'profile photo',
        ];
    }
}
