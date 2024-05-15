<?php

namespace App\Services\Product;

use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService
{
    public function index()
    {
        return Product::all();
    }


    public function post(ProductRequest $request)
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

    public function delete(Product $product)
    {
        $product->delete();
    }
}
