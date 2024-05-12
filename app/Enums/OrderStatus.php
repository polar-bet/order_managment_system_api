<?php

namespace App\Enums;

enum OrderStatus: int
{
    case SENT = 1;
    case APPROVED = 2;
    case IN_PROGRESS = 3;
    case DELIVERED = 4;

    public function isSent(): bool
    {
        return $this === self::SENT;
    }

    public function isApproved(): bool
    {
        return $this === self::APPROVED;
    }

    public function isInProgress(): bool
    {
        return $this === self::IN_PROGRESS;
    }

    public function isDelivered(): bool
    {
        return $this === self::DELIVERED;
    }
}
