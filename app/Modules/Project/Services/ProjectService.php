<?php

namespace App\Modules\Project\Services;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function registerProject(array $data): Project
    {
        return DB::transaction(function () use ($data) {
            $pi = Employee::findOrFail($data['pi_id']);
            $data['directorate_id'] = $pi->directorate_id;
            $data['status'] = $data['status'] ?? 'REGISTERED';

            return Project::create($data);
        });
    }

    public function updateProject(Project $project, array $data): bool
    {
        return DB::transaction(function () use ($project, $data) {
            if (isset($data['pi_id'])) {
                $pi = Employee::findOrFail($data['pi_id']);
                $data['directorate_id'] = $pi->directorate_id;
            }

            return $project->update($data);
        });
    }
}
