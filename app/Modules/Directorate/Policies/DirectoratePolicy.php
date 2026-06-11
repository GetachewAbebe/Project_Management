<?php

namespace App\Modules\Directorate\Policies;

use App\Models\Directorate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirectoratePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isDirector();
    }

    public function view(User $user, Directorate $directorate): bool
    {
        return $user->isAdmin() || ($user->isDirector() && $user->directorate_id === $directorate->id);
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Directorate $directorate): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Directorate $directorate): bool
    {
        return $user->isAdmin();
    }
}
