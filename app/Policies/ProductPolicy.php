<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isTrader();
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
        return $user->isTrader();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        return $product->isOwner();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, array $products): bool
    {
        $isOwner = !Product::findMany($products)
            ->doesntContain('user_id', $user->id);

        return $user->isAdmin()
            || $isOwner;
    }
}
