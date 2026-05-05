@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Basic Table</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Basic Table</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Default Datatables</h5>
            </div>
            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price (Min)</th>
                            <th>Total Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $product->name }}</strong>
                                </td>

                                <td>
                                    {{ $product->min_price ? '$' . $product->min_price : '-' }}
                                </td>

                                <td>
                                    {{ $product->total_stock ?? 0 }}
                                </td>

                                <td>
                                    @if (($product->total_stock ?? 0) > 0)
                                        <span class="badge bg-success">In Stock</span>
                                    @else
                                        <span class="badge bg-danger">Out of Stock</span>
                                    @endif
                                </td>

                                <td>
                                    {{-- <a href="{{(route('admin.products.show', $product->id))}}"
                                        class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                    </a> --}}
                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                        class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>
                                    <form id="delete-form-{{ $product->id }}"
                                        action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a href="javascript:void(0);"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();"
                                        class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
