<?php

namespace App\Http\Controllers\Order;

use App\Models\Order;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\OrderResource;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Requests\Order\OrderDeleteRequest;

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
        Gate::authorize('update', $order);

        return OrderResource::make($this->service->update($request, $order));
    }

    public function destroy(OrderDeleteRequest $request)
    {
        Gate::authorize('delete', Order::class);

        $data = $request->validated();

        Order::destroy($data['orders']);

        return response()->noContent();
    }

    public function decline(Request $request, Order $order)
    {
        Gate::authorize('decline', $order);

        return OrderResource::make($this->service->changeStatus($order, OrderStatus::DECLINED));
    }
}
