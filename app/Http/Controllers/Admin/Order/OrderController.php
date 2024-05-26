<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use App\Services\Chat\ChatService;
use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\OrderResource;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function __construct(private OrderService $service)
    {
    }

    public function stats()
    {
        Gate::authorize('adminStats', Order::class);

        return $this->service->adminStats();
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        Gate::authorize('adminIndex', Order::class);

        return OrderResource::collection($this->service->approvedOrderIndex());
    }
    public function execute(Request $request, Order $order)
    {
        Gate::authorize('execute', $order);

        [$order, $product] = $this->service->changeStatus($order, OrderStatus::IN_PROGRESS);

        return ['order' => OrderResource::make($order), 'product' => ProductResource::make($product)];
    }

    public function delivered(Request $request, Order $order)
    {
        Gate::authorize('delivered', $order);

        return OrderResource::make($this->service->changeStatus($order, OrderStatus::DELIVERED));
    }
}
