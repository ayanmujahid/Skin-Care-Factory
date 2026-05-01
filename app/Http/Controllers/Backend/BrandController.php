<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Repositories\FileRepository;
use App\Traits\MyTrait;


class BrandController extends Controller
{
    use MyTrait;

    protected $fileRepo;

    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }
    //
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.product-brands-management.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.product-brands-management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);
        $slug = $this->slug_maker($request->name, Brand::class);

        // Step 1: Create brand
        $brand = Brand::create([
            'name' => $request->name,
            'slug' => $slug,
            'is_featured' => $request->is_featured ? true : false,
        ]);

        // Step 2: Attach logo using FileRepository
        if ($request->hasFile('brand_logo')) {
            $this->fileRepo->upload(
                $request->file('brand_logo'),
                $brand,
                'brand_logo' // 👈 important identifier
            );
        }

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand created successfully!');
    }

    public function edit(Brand $brand)
    {
        return view('admin.product-brands-management.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $brand->update([
            'name' => $request->name,
            'is_featured' => $request->is_featured ? true : false,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand deleted successfully!');
    }
}
