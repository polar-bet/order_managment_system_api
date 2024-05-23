<?php

namespace App\Enums;

enum RoleEnum: int
{
    case ADMIN = 1;
    case TRADER = 2;
    case USER = 3;

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'admin',
            self::TRADER => 'trader',
            self::USER => 'user',
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
