<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $employeeId = $this->route('employee') ? $this->route('employee')->id : null;
        $user = $this->route('employee') ? $this->route('employee')->user : null;

        return [
            'full_name' => 'required|string|max:255',
            'directorate_id' => 'required|exists:directorates,id',
            'institutional_id' => 'nullable|string|max:255|unique:employees,institutional_id' . ($employeeId ? ",$employeeId" : ""),
            'email' => 'required|email|max:255' . 
                       '|unique:employees,email' . ($employeeId ? ",$employeeId" : "") . 
                       '|unique:users,email' . ($user ? ",$user->id" : ""),
            'position' => 'required|string|max:255',
            'system_role' => 'required|string|in:employee,director,evaluator',
        ];
    }
}
