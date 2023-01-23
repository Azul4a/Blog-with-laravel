<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::withCount('posts')->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('category.index');
    }

    public function update(UpdateRequest $request, Category $category) {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('category.index');
    }

    public function edit(Category $category) {
        return view('admin.categories.edit', compact('category'));
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('category.index');
    }
}
