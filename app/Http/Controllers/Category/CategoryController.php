<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryResource::collection($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        return CategoryResource::make($this->service->store($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return CategoryResource::make($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        return CategoryResource::make($this->service->update($request, $category));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
