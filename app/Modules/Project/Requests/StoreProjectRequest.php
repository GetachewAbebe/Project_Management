<?php

namespace App\Modules\Project\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'research_title' => 'required|string|max:500',
            'pi_id' => 'required|integer|exists:employees,id',
            'description' => 'nullable|string|max:5000',
            'objective' => 'nullable|string|max:5000',
            'start_year' => 'required|integer|min:1990|max:2100',
            'end_year' => 'nullable|integer|min:1990|max:2100|gte:start_year',
            'project_code' => 'nullable|string|max:100',
            'status' => 'nullable|string|in:REGISTERED,ONGOING,COMPLETED,TERMINATED,EVALUATED',
        ];
    }

    public function messages(): array
    {
        return [
            'end_year.gte' => 'End year must be equal to or after the start year.',
            'pi_id.exists' => 'The selected Principal Investigator does not exist.',
        ];
    }
}
