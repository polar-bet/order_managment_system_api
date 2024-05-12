<?php

namespace App\Services\Account;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests\Account\LoginRequest;
use App\Http\Requests\Account\RegistrationRequest;

class AccountService
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json(['message' => 'authorization failed'], Response::HTTP_UNAUTHORIZED);
        }

        return $this->createToken(Auth::user());
    }

    public function register(RegistrationRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        return $this->createToken($user);
    }
    public function refresh(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());

        $user = $token->tokenable;

        if (!$token->can('refresh')) {
            return response()->json(['message' => 'invalid token'], Response::HTTP_FORBIDDEN);
        }

        return $this->createToken($user);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
    }

    public function createToken(User $user)
    {
        $user->tokens()->delete();

        $accessToken = $user->createToken('accessToken')->plainTextToken;

        $refreshToken = $user->createToken('refreshToken', ['refresh'])->plainTextToken;

        return response()->json([
            'accessToken' => $accessToken,
            'refreshToken' => $refreshToken,
        ], Response::HTTP_OK);
    }
}
