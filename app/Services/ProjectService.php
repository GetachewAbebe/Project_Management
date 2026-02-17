<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Project;

class ProjectService
{
    /**
     * Register a new project.
     */
    public function registerProject(array $data): Project
    {
        $pi = Employee::findOrFail($data['pi_id']);
        $data['directorate_id'] = $pi->directorate_id;
        $data['status'] = $data['status'] ?? 'REGISTERED';

        return Project::create($data);
    }

    /**
     * Update an existing project.
     */
    public function updateProject(Project $project, array $data): bool
    {
        if (isset($data['pi_id'])) {
            $pi = Employee::findOrFail($data['pi_id']);
            $data['directorate_id'] = $pi->directorate_id;
        }

        return $project->update($data);
    }

    /**
     * Check if a user can manage a specific project.
     */
    public function canUserManage($user, Project $project): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isDirector() && $project->directorate_id == $user->directorate_id) {
            return true;
        }

        return false;
    }
}
