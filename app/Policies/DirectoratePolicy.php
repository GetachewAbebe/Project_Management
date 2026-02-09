<?php

namespace App\Policies;

use App\Models\Directorate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirectoratePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isDirector();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Directorate $directorate): bool
    {
        return $user->isAdmin() || ($user->isDirector() && $user->directorate_id === $directorate->id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Directorate $directorate): bool
    {
        return $user->isAdmin();
        // Directors cannot rename their own directorate, that's an admin function.
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Directorate $directorate): bool
    {
        return $user->isAdmin();
    }
}
