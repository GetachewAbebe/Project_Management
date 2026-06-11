<?php

namespace App\Modules\Project\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Project $project): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isDirector()) {
            return $project->directorate_id === $user->directorate_id;
        }

        if ($user->isEvaluator()) {
            return $project->status === 'REGISTERED';
        }

        return false;
    }

    public function create(User $user): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return ! $user->isEvaluator();
    }

    public function update(User $user, Project $project): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isDirector()) {
            return $project->directorate_id === $user->directorate_id;
        }

        return false;
    }

    public function delete(User $user, Project $project): bool
    {
        return $this->update($user, $project);
    }
}
