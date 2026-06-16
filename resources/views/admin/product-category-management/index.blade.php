@extends('admin.layouts.main')

@section('content')
@include('admin.layouts.sidebar')

<div class="dashboard-main-body">

    {{-- HEADER --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">

        <h6 class="fw-semibold mb-0">
            Categories List
        </h6>

        <ul class="d-flex align-items-center gap-2">

            <li class="fw-medium">
                <a href="javascript:void(0);"
                    class="d-flex align-items-center gap-1 hover-text-primary">

                    <iconify-icon icon="solar:home-smile-angle-outline"
                        class="icon text-lg"></iconify-icon>

                    Dashboard
                </a>
            </li>

            <li>-</li>

            <li class="fw-medium">
                Product Categories
            </li>

        </ul>

        <a href="{{ route('admin.product-categories.create') }}"
            class="btn btn-primary">

            + Add Category
        </a>

    </div>

    {{-- TABLE --}}
    <div class="card basic-data-table">

        <div class="card-header">
            <h5 class="card-title mb-0">
                All Categories
            </h5>
        </div>

        <div class="card-body">

            <table class="table bordered-table mb-0"
                id="dataTable"
                data-page-length="10">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Featured</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($categories as $category)

                        <tr>

                            {{-- ID --}}
                            <td>
                                {{ $category->id }}
                            </td>

                            {{-- CATEGORY NAME --}}
                            <td>

                                <h6 class="text-md mb-0 fw-medium">
                                    {{ $category->name }}
                                </h6>

                            </td>

                            {{-- FEATURED --}}
                            <td>

                                @if ($category->featured)

                                    <span class="bg-success-focus text-success-main px-12 py-2 rounded-pill text-sm">
                                        Yes
                                    </span>

                                @else

                                    <span class="bg-secondary text-white px-12 py-2 rounded-pill text-sm">
                                        No
                                    </span>

                                @endif

                            </td>

                            {{-- CREATED DATE --}}
                            <td>
                                {{ $category->created_at->format('d M, Y') }}
                            </td>

                            {{-- ACTIONS --}}
                            <td>

                                {{-- EDIT --}}
                                <a href="{{ route('admin.product-categories.edit', $category->id) }}"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">

                                    <iconify-icon icon="lucide:edit"></iconify-icon>

                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.product-categories.destroy', $category->id) }}"
                                    method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Are you sure?');">

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
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection

@section('css')
<style>
/* Optional page-specific CSS */
</style>
@endsection

@section('js')
<script>
(() => {
    /* Optional page-specific JS */
})();
</script>
@endsection