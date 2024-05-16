<?php

namespace App\Services\UserRole;

use App\Http\Requests\UserRole\UpdateRequest;
use App\Models\Role;
use App\Models\User;

class UserRoleService
{
    public function update(User $user, Role $role)
    {
        $user->update([
            'role_id' => $role->id
        ]);

        return $user;
    }
}
