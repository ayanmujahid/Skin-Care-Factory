@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

        {{-- HEADER --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Brands List</h6>

            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Brands</li>
            </ul>

            <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">
                + Add Brand
            </a>
        </div>

        {{-- TABLE --}}
        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">All Brands</h5>
            </div>

            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand</th>
                            <th>Featured</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                {{-- ID --}}
                                <td>{{ $brand->id }}</td>

                                {{-- BRAND + IMAGE --}}
                                @php
                                    $logo = $brand->files->where('table_name', 'brand_logo')->first();
                                @endphp
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $logo ? asset('storage/'.$logo->url) : asset('assets/images/default.png') }}" alt="Brand"
                                            class="flex-shrink-0 me-12 radius-8" width="40" height="40">
                                        <h6 class="text-md mb-0 fw-medium flex-grow-1">
                                            {{ $brand->name }}
                                        </h6>
                                    </div>
                                </td>

                                {{-- FEATURED --}}
                                <td>
                                    @if ($brand->is_featured)
                                        <span class="bg-success-focus text-success-main px-12 py-2 rounded-pill text-sm">
                                            Yes
                                        </span>
                                    @else
                                        <span class="bg-secondary text-white px-12 py-2 rounded-pill text-sm">
                                            No
                                        </span>
                                    @endif
                                </td>

                                {{-- DATE --}}
                                <td>{{ $brand->created_at->format('d M, Y') }}</td>

                                {{-- ACTIONS --}}
                                <td>
                                    <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                        class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>

                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST"
                                        style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $brands->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
