<?php

namespace App\Http\Controllers\Order;

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
        return OrderResource::make($this->service->index());
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
}
