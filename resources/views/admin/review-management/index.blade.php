@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">
                Reviews List
            </h6>

            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin.dashboard.index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Reviews</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Reviews List</h5>

                <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">
                    Add Review
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table bordered-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Date</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($reviews as $review)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        @php
                                            $file = $review->files
                                                ->where('table_name', 'review')
                                                ->first();
                                        @endphp

                                        @if ($file)
                                            <img src="{{ asset('storage/' . $file->url) }}"
                                                width="70"
                                                class="radius-8">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $review->product->name ?? 'N/A' }}
                                    </td>

                                    <td>{{ $review->name }}</td>

                                    <td>{{ $review->email }}</td>

                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            {{ $review->rating }}/5
                                        </span>
                                    </td>

                                    <td>
                                        {{ \Illuminate\Support\Str::limit($review->content, 50) }}
                                    </td>

                                    <td>
                                        {{ $review->created_at->format('d M Y') }}
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.reviews.show', $review->id) }}"
                                            class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="lucide:edit"></iconify-icon>
                                        </a>

                                        <form action="{{ route('admin.reviews.destroy', $review->id) }}"
                                            method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this review?')"
                                                class="border-0 w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        <h5>No Reviews Found</h5>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3 px-3 pb-3">
                {{ $reviews->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>
@endsection