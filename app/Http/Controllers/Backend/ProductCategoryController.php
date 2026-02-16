<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    //
    public function index()
    {
        $categories = ProductCategory::latest()->paginate(10);
        return view('admin.product-category-management.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.product-category-management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        ProductCategory::create([
            'name' => $request->name,
            'featured' => $request->featured ? true : false,
        ]);

        return redirect()->route('admin.product-categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(ProductCategory $category)
    {
        return view('admin.product-category-management.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update([
            'name' => $request->name,
            'featured' => $request->featured ? true : false,
        ]);

        return redirect()->route('admin.product-categories.index')->with('success', 'Category updated successfully!');
    }

   public function destroy(ProductCategory $category)
{
    $category->delete();
    return redirect()->route('admin.product-categories.index')
                     ->with('success', 'Category deleted successfully!');
}

}
