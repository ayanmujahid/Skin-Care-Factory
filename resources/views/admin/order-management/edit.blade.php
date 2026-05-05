@extends('admin.layouts.main')

@section('content')
@include('admin.layouts.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <h1 class="mb-3">Order Details & Status Update</h1>

        <div class="row">

            {{-- LEFT COLUMN --}}
            <div class="col-md-4">

                {{-- ORDER CUSTOMER INFO --}}
                <div class="card mb-3">
                    <div class="card-header">Customer Info (Order)</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $order->name }}</p>
                        <p><strong>Email:</strong> {{ $order->email }}</p>
                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                        <p><strong>Address:</strong> {{ $order->address }}</p>
                        <p><strong>City:</strong> {{ $order->city }}</p>
                        <p><strong>State:</strong> {{ $order->state }}</p>
                        <p><strong>ZIP:</strong> {{ $order->zip }}</p>
                    </div>
                </div>

                {{-- USER ACCOUNT INFO --}}
                <div class="card mb-3">
                    <div class="card-header">User Account Info</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $order->user->name ?? $order->name }}</p>
                        <p><strong>Email:</strong> {{ $order->user->email ?? $order->email }}</p>
                    </div>
                </div>

                {{-- PROFESSIONAL INFO --}}
                @if ($order->professional)
                    <div class="card mb-3">
                        <div class="card-header">Professional Info</div>
                        <div class="card-body">

                            <p><strong>Name:</strong> {{ $order->professional->name }}</p>
                            <p><strong>Email:</strong> {{ $order->professional->email }}</p>

                            @if ($order->professional->professionalProfile)
                                <p><strong>Phone:</strong> {{ $order->professional->professionalProfile->phone }}</p>
                                <p><strong>Type:</strong>
                                    {{ $order->professional->professionalProfile->professional_type }}
                                </p>
                            @endif

                        </div>
                    </div>
                @endif

                {{-- ORDER SUMMARY --}}
                <div class="card mb-3">
                    <div class="card-header">Order Summary</div>
                    <div class="card-body">
                        <p><strong>Total:</strong> ${{ $order->total }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                        <p><strong>Created:</strong> {{ $order->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                {{-- STATUS UPDATE --}}
                <div class="card">
                    <div class="card-header">Update Status</div>
                    <div class="card-body">

                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select name="status" class="form-control mb-3">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>

                            <button class="btn btn-success w-100">
                                Update Status
                            </button>

                        </form>

                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN (ORDER ITEMS) --}}
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        Order Items
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->variant->product->name ?? 'N/A' }}</td>
                                        <td>${{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ $item->price * $item->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
@section('css')
    <style>
        .preview-box {
            position: relative;
            width: 90px;
            height: 90px;
        }

        .preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .remove-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: #fff;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            text-align: center;
            line-height: 22px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
@endsection
@section('js')
@endsection
