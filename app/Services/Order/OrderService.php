<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\Product;
use App\Enums\OrderStatus;
use Ramsey\Uuid\Type\Decimal;
use App\Services\Chat\ChatService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Order\OrderRequest;

class OrderService
{
    public function __construct(private ChatService $chatService)
    {
    }
    public function index()
    {
        // $orders = auth()->user()->orders;

        // foreach ($orders as $order) {
        //     $order['destination'] = $this->getLocation($order['destination']);
        // }

        return auth()->user()->orders()->orderByDesc('created_at')->get();
    }

    // public function getLocation(string $coordinate)
    // {
    //     [$lat, $lng] = explode(',', $coordinate);

    //     $response = Http::get('https://nominatim.openstreetmap.org/reverse', [
    //         'format' => 'json',
    //         'lat' => $lat,
    //         'lon' => $lng,
    //         'addressdetails' => 1,
    //     ]);

    //     return $response;
    // }


    public function stats()
    {
        $result = auth()->user()->orders()
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($order) {
                return [
                    'date' => $order->date,
                    'quantity' => $order->count,
                ];
            });

        return $result;
    }

    public function adminStats()
    {
        $result = Order::query()
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($order) {
                return [
                    'date' => $order->date,
                    'quantity' => $order->count,
                ];
            });

        return $result;
    }

    public function approvedOrderIndex()
    {
        return Order::all()->whereIn('status', [OrderStatus::APPROVED->value, OrderStatus::IN_PROGRESS->value]);
    }

    public function requestedOrderIndex()
    {
        return Order::whereHas('product', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
            ->orderBy('status')
            // ->where('status', OrderStatus::SENT->value)
            ->get();
    }

    public function changeStatus(Order $order, OrderStatus $status)
    {
        $order->update([
            'status' => $status->value
        ]);

        $changedOrder = Order::find($order->id);

        if (!$changedOrder->isInProgress()) {
            return $changedOrder;
        }

        $changedProduct = $this->sendProduct($changedOrder);

        return [$changedOrder, $changedProduct];
    }

    public function sendProduct(Order $order): Product
    {
        $product = $order->product;

        $productsLeft = $product->count - $order->count;

        $product->update([
            'count' => $productsLeft
        ]);

        return Product::find($product->id);
    }

    public function store(OrderRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $product = Product::find($data['product_id']);

        $this->chatService->store($product->user);

        $data['status'] = OrderStatus::SENT->value;

        $data['price'] = $this->calculateOrderTotal($product, $data['count']);

        return Order::create($data);
    }

    public function update(OrderRequest $request, Order $order)
    {
        $data = $request->validated();

        $product = Product::find($data['product_id']);

        $data['price'] = $this->calculateOrderTotal($product, $data['count']);

        $order->update($data);

        return $order;
    }

    public function calculateOrderTotal(Product $product, int $count)
    {
        return $product->price * $count;
    }
}
