<?php

namespace App\Http\Controllers\Trader\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductDeleteRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProductResource;
use App\Services\Product\ProductService;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\ProductRequest;

class ProductController extends Controller
{
    public function __construct(private ProductService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection($this->service->traderProductIndex());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        return ProductResource::make($this->service->store($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        return ProductResource::make($this->service->update($request, $product));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductDeleteRequest $request)
    {
        $data = $request->validated();

        Product::destroy($data);

        return response()->noContent();
    }
}
