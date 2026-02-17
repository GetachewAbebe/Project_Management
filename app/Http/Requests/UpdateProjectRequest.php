<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        $projectId = $this->route('project') ? $this->route('project')->id : null;

        return [
            'research_title' => 'required|string|max:255',
            'pi_id' => 'required|exists:employees,id',
            'objective' => 'nullable|string',
            'start_year' => 'required|integer|min:1900|max:2100',
            'end_year' => 'nullable|integer|gt:start_year',
            'project_code' => 'nullable|string|unique:projects,project_code'.($projectId ? ",$projectId" : ''),
            'status' => 'required|string|in:REGISTERED,ONGOING,COMPLETED,TERMINATED,EVALUATED',
        ];
    }
}
