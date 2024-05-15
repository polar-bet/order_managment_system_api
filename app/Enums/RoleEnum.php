<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case TRADER = 'trader';
    case USER = 'user';

    public function index(): int
    {
        return match ($this) {
            self::ADMIN => 1,
            self::TRADER => 2,
            self::USER => 3,
        };
    }

    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }
    public function isTrader(): bool
    {
        return $this === self::TRADER;
    }
    public function isUser(): bool
    {
        return $this === self::USER;
    }
}
