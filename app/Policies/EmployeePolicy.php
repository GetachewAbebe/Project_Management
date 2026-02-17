<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isDirector() || $user->isEvaluator();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employee $employee): bool
    {
        return $user->isAdmin() ||
               ($user->isDirector() && $employee->directorate_id === $user->directorate_id) ||
               ($user->employee?->id === $employee->id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isDirector();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employee $employee): bool
    {
        return $user->isAdmin() ||
               ($user->isDirector() && $employee->directorate_id === $user->directorate_id);
        // Note: Individual employees cannot edit their own HR record, only Directors/Admins
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employee $employee): bool
    {
        return $user->isAdmin() ||
               ($user->isDirector() && $employee->directorate_id === $user->directorate_id);
    }
}
