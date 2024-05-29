<?php

namespace App\Http\Controllers\Trader\Order;

use App\Models\Order;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\OrderResource;
use App\Http\Requests\Order\OrderRequest;

class OrderController extends Controller
{
    public function __construct(private OrderService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('traderIndex', Order::class);

        return OrderResource::collection($this->service->requestedOrderIndex());
    }

    public function approve(Request $request, Order $order)
    {
        Gate::authorize('approve', $order);

        return OrderResource::make($this->service->changeStatus($order, OrderStatus::APPROVED));
    }

    public function stats()
    {
        Gate::authorize('traderStats', Order::class);

        return $this->service->traderStats();
    }
}
