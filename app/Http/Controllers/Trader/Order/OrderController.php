<?php

namespace App\Http\Controllers\Trader\Order;

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
        return OrderResource::collection($this->service->requestedOrderIndex());
    }

    public function approve(Request $request, Order $order)
    {
        return OrderResource::make($this->service->changeStatus($order, OrderStatus::APPROVED));
    }
}
