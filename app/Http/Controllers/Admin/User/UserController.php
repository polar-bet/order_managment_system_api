<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Services\User\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        return UserResource::make($this->service->changeRole($request, $user));
    }
}
