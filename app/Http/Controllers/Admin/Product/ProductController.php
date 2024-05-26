<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductDeleteRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function destroy(ProductDeleteRequest $request)
    {
        $data = $request->validated();

        Gate::authorize('delete', [Product::class, $data['products']]);

        Product::destroy($data['products']);

        return response()->noContent();
    }
}
