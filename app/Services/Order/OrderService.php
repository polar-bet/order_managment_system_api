<?php

namespace App\Services\Order;

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
