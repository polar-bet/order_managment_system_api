<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }

    public function index()
    {
        return UserResource::collection($this->service->index());
    }
    public function update(UpdateRequest $request, User $user)
    {
        return UserResource::make($this->service->update($request, $user));
    }
}
