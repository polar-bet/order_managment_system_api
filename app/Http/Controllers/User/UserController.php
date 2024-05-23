<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }



    public function update(UpdateRequest $request, User $user)
    {
        Gate::authorize('update', $user);

        return UserResource::make($this->service->update($request, $user));
    }

    public function changeAccount()
    {
        Gate::authorize('changeAccount', User::class);

        return UserResource::make($this->service->changeAccount());
    }
}
