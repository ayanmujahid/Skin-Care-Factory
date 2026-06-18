@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="main-content app-content">
        <div class="container-fluid">

            <h1 class="mb-3">Create Coupon</h1>

            <form action="{{ route('admin.coupons.store') }}" method="POST">
                @csrf

                <div class="row">

                    {{-- LEFT SIDE --}}
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                Coupon Info
                            </div>

                            <div class="card-body">
                                <p class="text-muted mb-0">
                                    Create discount coupons for your customers.
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
                                    <input type="text" name="code" class="form-control"
                                        placeholder="Enter coupon code" required>
                                </div>

                                {{-- TYPE --}}
                                <div class="mb-3">
                                    <label>Discount Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percentage</option>
                                    </select>
                                </div>

                                {{-- VALUE --}}
                                <div class="mb-3">
                                    <label>Discount Value</label>
                                    <input type="number" name="value" class="form-control"
                                        placeholder="Enter discount value" required>
                                </div>

                                {{-- MIN CART --}}
                                <div class="mb-3">
                                    <label>Minimum Cart Amount</label>
                                    <input type="number" name="min_cart_amount" class="form-control"
                                        placeholder="Optional">
                                </div>

                                {{-- USAGE LIMIT --}}
                                <div class="mb-3">
                                    <label>Usage Limit</label>
                                    <input type="number" name="usage_limit" class="form-control" placeholder="Optional">
                                </div>

                                {{-- START DATE --}}
                                <div class="mb-3">
                                    <label>Start Date</label>
                                    <input type="date" name="starts_at" class="form-control">
                                </div>

                                {{-- EXPIRE DATE --}}
                                <div class="mb-3">
                                    <label>Expiry Date</label>
                                    <input type="date" name="expires_at" class="form-control">
                                </div>

                                {{-- FIRST ORDER --}}
                                <div class="mb-3">
                                    <label>First Order Only</label>
                                    <select name="is_first_order" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                                {{-- STATUS --}}
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">
                        Create Coupon
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
