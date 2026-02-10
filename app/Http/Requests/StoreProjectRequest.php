<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $projectId = $this->route('project') ? $this->route('project')->id : null;

        return [
            'research_title' => 'required|string|max:255',
            'pi_id' => 'required|exists:employees,id',
            'objective' => 'nullable|string',
            'start_year' => 'required|integer|min:1900|max:2100',
            'end_year' => 'nullable|integer|min:1900|max:2100',
            'project_code' => 'nullable|string|unique:projects,project_code' . ($projectId ? ",$projectId" : ""),
            'status' => $projectId ? 'required|string' : 'nullable|string',
        ];
    }
}
