<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $departmentId = $this->route('department')->id;

        return [
            'name' => ['required', 'string', 'max:100', Rule::unique('departments', 'name')->ignore($departmentId)],
            'code' => ['required', 'string', 'max:20', Rule::unique('departments', 'code')->ignore($departmentId)],
            'description' => ['nullable', 'string', 'max:500'],
        ];
    }
}
