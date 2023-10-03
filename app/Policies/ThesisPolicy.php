<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Theses;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ThesisPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Theses $theses): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Theses $theses): Response
    {
        //

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Theses $theses): bool
    {
        //
    }

    public function approve(User $user, Theses $theses): bool
    {
        //
        $user = Auth::user();
       return $user->hasRole('contentModerator');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Theses $theses): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Theses $theses): bool
    {
        //
    }
}
