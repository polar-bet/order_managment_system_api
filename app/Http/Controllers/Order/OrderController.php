<?php

namespace App\Http\Controllers\Order;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\Chat\ChatService;
use App\Services\Order\OrderService;

class OrderController extends Controller
{
    public function __construct(private OrderService $service)
    {
    }

    public function index()
    {
        return OrderResource::collection($this->service->index());
    }

    public function store(OrderRequest $request)
    {
        return OrderResource::make($this->service->store($request));
    }

    public function show(Order $order)
    {
        return OrderResource::make($order);
    }

    public function update(OrderRequest $request, Order $order)
    {
        return OrderResource::make($this->service->update($request, $order));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->noContent();
    }

    public function decline(Request $request, Order $order)
    {
        return OrderResource::make($this->service->changeStatus($order, OrderStatus::DECLINED));
    }
}
