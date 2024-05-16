<?php

namespace App\Services\Category;

use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Order\OrderRequest;
use App\Models\Category;

class CategoryService
{
    public function index()
    {
        return Category::all();
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        return Category::create($data);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);

        return $category;
    }
}
