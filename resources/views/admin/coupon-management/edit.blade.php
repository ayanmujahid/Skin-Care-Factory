@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="main-content app-content">
        <div class="container-fluid">

            <h1 class="mb-3">Edit Coupon</h1>

            <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- LEFT SIDE --}}
                    <div class="col-md-3">
                        <div class="card mb-3">

                            <div class="card-header">
                                Coupon Info
                            </div>

                            <div class="card-body">
                                <p class="text-muted mb-0">
                                    Update coupon details and rules.
                                </p>
                            </div>

                        </div>
                    </div>

                    {{-- RIGHT SIDE --}}
                    <div class="col-md-9">

                        <div class="card">

                            <div class="card-body">

                                {{-- CODE --}}
                                <div class="mb-3">
                                    <label>Coupon Code</label>
                                    <input type="text" name="code" class="form-control" value="{{ $coupon->code }}"
                                        required>
                                </div>

                                {{-- TYPE --}}
                                <div class="mb-3">
                                    <label>Discount Type</label>
                                    <select name="type" class="form-control" required>

                                        <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>
                                            Fixed
                                        </option>

                                        <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>
                                            Percentage
                                        </option>

                                    </select>
                                </div>

                                {{-- VALUE --}}
                                <div class="mb-3">
                                    <label>Discount Value</label>
                                    <input type="number" name="value" class="form-control" value="{{ $coupon->value }}"
                                        required>
                                </div>

                                {{-- MIN CART --}}
                                <div class="mb-3">
                                    <label>Minimum Cart Amount</label>
                                    <input type="number" name="min_cart_amount" class="form-control"
                                        value="{{ $coupon->min_cart_amount }}">
                                </div>

                                {{-- USAGE LIMIT --}}
                                <div class="mb-3">
                                    <label>Usage Limit</label>
                                    <input type="number" name="usage_limit" class="form-control"
                                        value="{{ $coupon->usage_limit }}">
                                </div>

                                {{-- START DATE --}}
                                <div class="mb-3">
                                    <label>Start Date</label>
                                    <input type="date" name="starts_at" class="form-control"
                                        value="{{ optional($coupon->starts_at)->format('Y-m-d') }}">
                                </div>

                                {{-- EXPIRE DATE --}}
                                <div class="mb-3">
                                    <label>Expiry Date</label>
                                    <input type="date" name="expires_at" class="form-control"
                                        value="{{ optional($coupon->expires_at)->format('Y-m-d') }}">
                                </div>

                                {{-- FIRST ORDER --}}
                                <div class="mb-3">
                                    <label>First Order Only</label>
                                    <select name="is_first_order" class="form-control">

                                        <option value="0" {{ !$coupon->is_first_order ? 'selected' : '' }}>
                                            No
                                        </option>

                                        <option value="1" {{ $coupon->is_first_order ? 'selected' : '' }}>
                                            Yes
                                        </option>

                                    </select>
                                </div>

                                {{-- STATUS --}}
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control">

                                        <option value="1" {{ $coupon->status ? 'selected' : '' }}>
                                            Active
                                        </option>

                                        <option value="0" {{ !$coupon->status ? 'selected' : '' }}>
                                            Inactive
                                        </option>

                                    </select>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">
                        Update Coupon
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection

@section('css')
    <style>
        /* Optional page specific styling */
    </style>
@endsection

@section('js')
    <script>
        (() => {
            /* Optional page specific JS */
        })();
    </script>
@endsection
