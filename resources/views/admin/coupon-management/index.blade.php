@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

        {{-- HEADER --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">

            <h6 class="fw-semibold mb-0">
                Coupons List
            </h6>

            <ul class="d-flex align-items-center gap-2">

                <li class="fw-medium">
                    <a href="javascript:void(0);" class="d-flex align-items-center gap-1 hover-text-primary">

                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>

                        Dashboard
                    </a>
                </li>

                <li>-</li>

                <li class="fw-medium">
                    Coupons
                </li>

            </ul>

            <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
                + Add Coupon
            </a>

        </div>

        {{-- TABLE --}}
        <div class="card basic-data-table">

            <div class="card-header">
                <h5 class="card-title mb-0">
                    All Coupons
                </h5>
            </div>

            <div class="card-body">

                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Min Cart</th>
                            <th>Usage</th>
                            <th>First Order</th>
                            <th>Start</th>
                            <th>Expire</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($coupons as $coupon)
                            <tr>

                                {{-- ID --}}
                                <td>{{ $coupon->id }}</td>

                                {{-- CODE --}}
                                <td>
                                    <h6 class="text-md mb-0 fw-medium">
                                        {{ $coupon->code }}
                                    </h6>
                                </td>

                                {{-- TYPE --}}
                                <td>
                                    {{ ucfirst($coupon->type) }}
                                </td>

                                {{-- VALUE --}}
                                <td>
                                    {{ $coupon->value }}
                                </td>

                                {{-- MIN CART --}}
                                <td>
                                    {{ $coupon->min_cart_amount ?? '-' }}
                                </td>

                                {{-- USAGE --}}
                                <td>
                                    {{ $coupon->used_count }} / {{ $coupon->usage_limit ?? '∞' }}
                                </td>

                                {{-- FIRST ORDER --}}
                                <td>
                                    @if ($coupon->is_first_order)
                                        <span class="bg-success-focus text-success-main px-12 py-2 rounded-pill text-sm">
                                            Yes
                                        </span>
                                    @else
                                        <span class="bg-secondary text-white px-12 py-2 rounded-pill text-sm">
                                            No
                                        </span>
                                    @endif
                                </td>

                                {{-- START DATE --}}
                                <td>
                                    {{ $coupon->starts_at ? \Carbon\Carbon::parse($coupon->starts_at)->format('d M, Y') : '-' }}
                                </td>

                                {{-- EXPIRE DATE --}}
                                <td>
                                    {{ $coupon->expires_at ? \Carbon\Carbon::parse($coupon->expires_at)->format('d M, Y') : '-' }}
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    @if ($coupon->status)
                                        <span class="bg-success-focus text-success-main px-12 py-2 rounded-pill text-sm">
                                            Active
                                        </span>
                                    @else
                                        <span class="bg-danger-focus text-danger-main px-12 py-2 rounded-pill text-sm">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- ACTIONS --}}
                                <td>

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.coupons.edit', $coupon->id) }}"
                                        class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">

                                        <iconify-icon icon="lucide:edit"></iconify-icon>

                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST"
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
