<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{


    public function viewAny(User $user, User $model): bool
    {
        return $user->isAdmin();
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->isAdmin()
            || $user->is($model);
    }

    public function changeAccount(User $user, User $model): bool
    {
        return $user->is($model)
            && $user->isDefaultUser();
    }
}
