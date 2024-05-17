<?php

namespace App\Services\Order;

use App\Enums\OrderStatus;
use App\Http\Requests\Order\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Ramsey\Uuid\Type\Decimal;

class OrderService
{
    public function index()
    {
        return auth()->user()->orders;
    }


    public function approvedOrderIndex()
    {
        return Order::all()->whereIn('status', [OrderStatus::APPROVED->value, OrderStatus::IN_PROGRESS->value]);
    }

    public function requestedOrderIndex()
    {
        return Order::whereHas('product', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->where('status', OrderStatus::SENT->value)->get();
    }

    public function changeStatus(Order $order, OrderStatus $status)
    {
        $order->update([
            'status' => $status->value
        ]);

        return $order;
    }

    public function store(OrderRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $data['price'] = $this->calculateOrderTotal($data['product_id'], $data['count']);

        return Order::create($data);
    }

    public function update(OrderRequest $request, Order $order)
    {
        $data = $request->validated();

        $order->update($data);

        return $order;
    }

    public function calculateOrderTotal(int $productId, int $count): float
    {
        $product = Product::find($productId);

        return $product->price * $count;
    }
}
