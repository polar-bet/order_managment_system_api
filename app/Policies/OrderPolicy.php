<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{

    public function viewAny(User $user): bool
    {
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Order $order): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Order $order): bool
    {
        return $order->isOwner()
            && $order->isSent();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Order $order): bool
    {
        return $order->isOwner()
            && $order->isSent()
            && $order->isDeclined();
    }

    public function decline(User $user, Order $order): bool
    {
        return $order->isSent()
            && $user->isTrader()
            || $order->isApproved()
            && $user->isAdmin();
    }

    public function approve(User $user, Order $order): bool
    {
        return $order->isSent()
            && $user->isTrader();
    }

    public function execute(User $user, Order $order): bool
    {
        return $order->isApproved()
            && $user->isAdmin();
    }

    public function delivered(User $user, Order $order): bool
    {
        return $order->isInProgress()
            && $user->isAdmin();
    }

    public function adminIndex(User $user, Order $order): bool
    {
        return $user->isAdmin();
    }

    public function traderIndex(User $user, Order $order): bool
    {
        return $user->isTrader();
    }
}
