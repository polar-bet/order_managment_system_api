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
        Gate::authorize('adminIndex', Order::class);

        return OrderResource::collection($this->service->approvedOrderIndex());
    }
    public function execute(Request $request, Order $order)
    {
        Gate::authorize('execute', $order);

        return OrderResource::make($this->service->changeStatus($order, OrderStatus::IN_PROGRESS));
    }

    public function delivered(Request $request, Order $order)
    {
        Gate::authorize('delivered', $order);

        return OrderResource::make($this->service->changeStatus($order, OrderStatus::DELIVERED));
    }
}
