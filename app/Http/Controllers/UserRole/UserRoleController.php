<?php

namespace App\Http\Controllers\UserRole;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserRole\UserRoleService;

class UserRoleController extends Controller
{
    public function __construct(private UserRoleService $service)
    {
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, Role $role)
    {
        return UserResource::make($this->service->update($user, $role));
    }
}
