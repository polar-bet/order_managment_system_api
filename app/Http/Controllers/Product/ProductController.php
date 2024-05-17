<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return ProductResource::collection($this->service->index());
    }


    public function show(Product $product)
    {
        return ProductResource::make($product);
    }
}
