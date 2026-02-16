<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
    //
    public function index()
    {
        $categories = ProductCategory::orderBy('name')->get();

        $subcategories = ProductSubCategory::with('category')->latest()->paginate(10);
        return view('admin.product-sub-category-management.index', compact('subcategories', 'categories'));
    }

    public function create()
    {
        $categories = ProductCategory::orderBy('name')->get();
        return view('admin.product-sub-category-management.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
        ]);

        ProductSubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'featured' => $request->featured ? true : false,
        ]);

        return redirect()->route('admin.product-subcategories.index')->with('success', 'Sub Category created successfully!');
    }

    public function edit(ProductSubCategory $subcategory)
    {
        $categories = ProductCategory::orderBy('name')->get();
        return view('admin.product-sub-category-management.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, ProductSubCategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
        ]);

        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'featured' => $request->featured ? true : false,
        ]);

        return redirect()->route('admin.product-subcategories.index')->with('success', 'Sub Category updated successfully!');
    }

    public function destroy(ProductSubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('admin.product-subcategories.index')->with('success', 'Sub Category deleted successfully!');
    }
}
