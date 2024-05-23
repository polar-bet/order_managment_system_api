<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\User\UpdateRequest;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }

    public function index()
    {
        Gate::authorize('viewAny', User::class);

        return UserResource::collection($this->service->index());
    }

    public function update(UpdateRequest $request, User $user)
    {
        Gate::authorize('update', $user);

        return UserResource::make($this->service->changeRole($request, $user));
    }
}
