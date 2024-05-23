<?php

namespace App\Enums;

enum OrderStatus: int
{
    case SENT = 1;
    case APPROVED = 2;
    case IN_PROGRESS = 3;
    case DELIVERED = 4;
    case DECLINED = 5;

    public function label(): string
    {
        return match ($this) {
            self::SENT => 'Відправлено',
            self::APPROVED => 'Затверджено',
            self::IN_PROGRESS => 'Виконується',
            self::DELIVERED => 'Доставлено',
            self::DECLINED => 'Відхилено',
        };
    }

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
    public function isDeclined(): bool
    {
        return $this === self::DECLINED;
    }
}
