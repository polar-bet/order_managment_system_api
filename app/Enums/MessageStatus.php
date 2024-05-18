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
}
