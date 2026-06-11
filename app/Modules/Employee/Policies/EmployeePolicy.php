<?php

namespace App\Modules\Employee\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isDirector() || $user->isEvaluator();
    }

    public function view(User $user, Employee $employee): bool
    {
        return $user->isAdmin() ||
               ($user->isDirector() && $employee->directorate_id === $user->directorate_id) ||
               ($user->employee?->id === $employee->id);
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isDirector();
    }

    public function update(User $user, Employee $employee): bool
    {
        return $user->isAdmin() ||
               ($user->isDirector() && $employee->directorate_id === $user->directorate_id);
    }

    public function delete(User $user, Employee $employee): bool
    {
        return $user->isAdmin() ||
               ($user->isDirector() && $employee->directorate_id === $user->directorate_id);
    }
}
