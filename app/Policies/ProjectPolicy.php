<?php

namespace App\Policies;

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
        return $user->role === 'admin' || $project->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Project $project): bool
    {
        return $user->role === 'admin' || $project->user_id === $user->id;
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->role === 'admin' || $project->user_id === $user->id;
    }

    public function restore(User $user, Project $project): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Project $project): bool
    {
        return $user->role === 'admin';
    }
}
