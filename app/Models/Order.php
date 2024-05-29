<?php

namespace App\Models;

use App\Casts\OrderCast;
use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'destination',
        'status',
        'count',
        'price'
    ];

    // protected $casts = [
    //     'status' => OrderCast::class
    // ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function isOwner(): bool
    {
        return $this->user->is(auth()->user());
    }

    public function isSent(): bool
    {
        return OrderStatus::from($this->status)->isSent();
    }

    public function isApproved(): bool
    {
        return OrderStatus::from($this->status)->isApproved();
    }

    public function isInProgress(): bool
    {
        return OrderStatus::from($this->status)->isInProgress();
    }

    public function isDelivered(): bool
    {
        return OrderStatus::from($this->status)->isDelivered();
    }

    public function isDeclined(): bool
    {
        return OrderStatus::from($this->status)->isDeclined();
    }

}
