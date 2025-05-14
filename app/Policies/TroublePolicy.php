<?php

namespace App\Policies;

use App\Models\Trouble;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TroublePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isPetugas();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Trouble $trouble): bool
    {
        return $user->isAdmin() || $user->isPetugas();
        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isPetugas();
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Trouble $trouble): bool
    {
        return $user->isAdmin() || $user->isPetugas();
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Trouble $trouble): bool
    {
        return $user->isAdmin() || $user->isPetugas();
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Trouble $trouble): bool
    {
        return $user->isAdmin() || $user->isPetugas();
        
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Trouble $trouble): bool
    {
        return $user->isAdmin() || $user->isPetugas();
        
    }
}