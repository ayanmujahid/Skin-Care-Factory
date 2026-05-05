@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

        {{-- HEADER --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">
                Orders List
                @if ($status)
                    <span class="badge bg-primary ms-2">{{ ucfirst($status) }}</span>
                @endif
            </h6>

            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Orders</li>
            </ul>
        </div>

        {{-- TABLE --}}
        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">All Orders</h5>
            </div>

            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($orders as $order)
                            <tr>

                                <td>{{ $order->id }}</td>

                                <td>{{ $order->name }}</td>

                                <td>{{ $order->email }}</td>

                                <td>{{ $order->phone }}</td>

                                <td><strong>${{ number_format($order->total, 2) }}</strong></td>

                                <td>
                                    @php $status = strtolower($order->status); @endphp

                                    <span
                                        class="badge
                @if ($status == 'pending') bg-warning
                @elseif($status == 'processing') bg-info
                @elseif($status == 'delivered') bg-success
                @elseif($status == 'cancelled') bg-danger
                @elseif($status == 'returned') bg-dark
                @else bg-secondary @endif
            ">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>

                                <td>{{ $order->created_at->format('d M, Y') }}</td>

                                <td class="d-flex gap-2">

                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="w-32-px h-32-px bg-primary-focus text-primary-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                    </a>

                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this order?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center py-5">

                                    <div class="py-4">

                                        <iconify-icon icon="mdi:package-variant-closed-remove" width="50"
                                            class="text-muted mb-2"></iconify-icon>

                                        <h5 class="mb-1">
                                            No {{ $status ? ucfirst($status) : '' }} Orders Found
                                        </h5>

                                        <p class="text-muted mb-0">
                                            There are currently no orders matching this filter.
                                        </p>

                                    </div>

                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
