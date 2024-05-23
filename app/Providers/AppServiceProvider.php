<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Message;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Policies\OrderPolicy;
use App\Policies\MessagePolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
        Gate::policy(Order::class, OrderPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(Message::class, MessagePolicy::class);
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(Role::class, RolePolicy::class);
    }
}
