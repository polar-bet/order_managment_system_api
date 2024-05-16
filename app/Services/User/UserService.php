<?php

namespace App\Services\User;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\User;

class UserService
{
    public function index()
    {
        return User::all()->whereNotIn('id', auth()->user()->id);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return $user;
    }
}
