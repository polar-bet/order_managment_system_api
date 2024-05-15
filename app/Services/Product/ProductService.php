<?php

namespace App\Services\Product;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }
}
