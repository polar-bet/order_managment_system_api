<?php

namespace App\Services\User;

use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\Admin\User\UpdateRequest as AdminUpdateRequest;

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

    public function changeRole(AdminUpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return $user;
    }

    public function changeAccount()
    {
        $user = auth()->user();

        $user->update([
            'role_id' => RoleEnum::TRADER->index()
        ]);

        return $user;
    }
}
