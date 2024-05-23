<?php

namespace App\Http\Controllers\Trader\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ProductResource;
use App\Services\Product\ProductService;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\ProductDeleteRequest;

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
        Gate::authorize('viewAny', Product::class);

        return ProductResource::collection($this->service->traderProductIndex());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        Gate::authorize('create', Product::class);

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
        Gate::authorize('update', $product);

        return ProductResource::make($this->service->update($request, $product));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductDeleteRequest $request)
    {
        Gate::authorize('delete', Product::class);

        $data = $request->validated();

        Product::destroy($data['products']);

        return response()->noContent();
    }
}
