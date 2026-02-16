@extends('admin.layouts.main')

@section('content')
@include('admin.layouts.sidebar')

<div class="main-content app-content">
    <div class="container-fluid page-container main-body-container">

        {{-- PAGE HEADER --}}
        <div class="page-header-breadcrumb mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="page-title fs-18">Products</h1>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    + Add Product
                </a>
            </div>
        </div>

        {{-- STATS --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h6>Total Products</h6>
                        <h3>{{ $stats['total'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h6>In Stock</h6>
                        <h3 class="text-success">{{ $stats['in_stock'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h6>Out of Stock</h6>
                        <h3 class="text-danger">{{ $stats['out_stock'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h6>Total Revenue</h6>
                        <h3>${{ number_format($stats['revenue'], 2) }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- FILTERS --}}
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" id="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search product">
                    </div>
                    <div class="col-md-3">
                        <select id="stock" class="form-control">
                            <option value="">All Stock</option>
                            <option value="in-stock" {{ request('stock')=='in-stock'?'selected':'' }}>In Stock</option>
                            <option value="out-of-stock" {{ request('stock')=='out-of-stock'?'selected':'' }}>Out of Stock</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="sort" class="form-control">
                            <option value="">Sort By</option>
                            <option value="date" {{ request('sort')=='date'?'selected':'' }}>Latest</option>
                            <option value="price" {{ request('sort')=='price'?'selected':'' }}>Price</option>
                            <option value="name" {{ request('sort')=='name'?'selected':'' }}>Name</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button onclick="applyFilters()" class="btn btn-dark w-100">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- PRODUCT TABLE --}}
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Stock</th>
                                <th>Created</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $product->mainImage->url) }}"
                                        class="rounded"
                                        width="50">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>${{ $product->price }}</td>
                                <td>
                                    {{ $product->discounted_price ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                                        {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                    </span>
                                </td>
                                <td>{{ $product->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                        method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete product?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No products found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $products->withQueryString()->links() }}
        </div>

    </div>
</div>
@endsection
@section('js')
<script>
function applyFilters() {
    const params = new URLSearchParams({
        search: document.getElementById('search').value,
        stock: document.getElementById('stock').value,
        sort: document.getElementById('sort').value
    });

    window.location.href = `?${params.toString()}`;
}
</script>
@endsection
