<?php

namespace App\Enums;

enum MessageStatus: int
{
    case SENT = 1;
    case READ = 2;

    public static function isRead(int $status): bool
    {
        return $status === self::READ;
    }

    public function label(): string
    {
        return match ($this) {
            self::SENT => 'sent',
            self::READ => 'read',
        };
    }
}
