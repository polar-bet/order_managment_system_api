<?php

namespace App\Http\Controllers\Order;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\Order\OrderService;

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
        return OrderResource::collection($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        return OrderResource::make($this->service->store($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return OrderResource::make($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        return OrderResource::make($this->service->update($request, $order));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->noContent();
    }

    public function requestOrderIndex()
    {
        return OrderResource::collection($this->service->requestOrderIndex());
    }

    public function delivered(Request $request, Order $order)
    {
        return OrderResource::make($this->service->changeStatus($order, OrderStatus::DELIVERED));
    }

    public function execute(Request $request, Order $order)
    {
        return OrderResource::make($this->service->changeStatus($order, OrderStatus::IN_PROGRESS));
    }

    public function approve(Request $request, Order $order)
    {
        return OrderResource::make($this->service->changeStatus($order, OrderStatus::APPROVED));
    }

    public function decline(Request $request, Order $order)
    {
        return OrderResource::make($this->service->changeStatus($order, OrderStatus::DECLINED));
    }
}
