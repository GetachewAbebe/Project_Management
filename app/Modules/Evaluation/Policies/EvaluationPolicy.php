<?php

namespace App\Modules\Evaluation\Policies;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvaluationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Evaluation $evaluation): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isDirector()) {
            return $evaluation->project->directorate_id === $user->directorate_id;
        }

        if ($user->isEvaluator()) {
            return $evaluation->evaluator_id === $user->employee?->id;
        }

        return false;
    }

    public function create(User $user): bool
    {
        return $user->isEvaluator() || $user->isDirector();
    }

    public function update(User $user, ?Evaluation $evaluation = null): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ?Evaluation $evaluation = null): bool
    {
        return $user->isAdmin();
    }
}
