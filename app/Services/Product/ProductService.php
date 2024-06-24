<?php

namespace App\Services\Product;

use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService
{
    public function index()
    {
        $query = Product::orderBy('updated_at')->where('count', '>', 0);

        if (auth()->user()->isTrader()) {
            return $query->whereNot('user_id', auth()->user()->id)->get();
        }

        return $query->get();
    }

    public function traderProductIndex()
    {
        return auth()->user()->products()->orderBy('updated_at')->get();
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        return Product::create($data);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $product->update($data);

        return $product;
    }
}
