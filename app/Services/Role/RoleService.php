<?php

namespace App\Services\Role;

use App\Http\Requests\Role\RoleRequest;
use App\Models\Role;

class RoleService
{
    public function index()
    {
        return Role::all();
    }

    public function store(RoleRequest $request)
    {
        $data = $request->validated();

        return Role::create($data);
    }

    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->validated();

        $role->update($data);

        return $role;
    }
}
