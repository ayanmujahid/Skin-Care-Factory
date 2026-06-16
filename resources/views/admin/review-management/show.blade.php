@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

        <!-- Header -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Review Details</h6>

            <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
                Back to Reviews
            </a>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-body p-40">

                <div class="row">

                    <!-- STATUS -->
                    <div class="col-12 mb-4 text-center">

                        @if ($review->status == 0)
                            <span class="badge bg-warning fs-6 px-4 py-2">
                                Pending Review
                            </span>
                        @elseif ($review->status == 1)
                            <span class="badge bg-success fs-6 px-4 py-2">
                                Approved
                            </span>
                        @elseif ($review->status == 2)
                            <span class="badge bg-danger fs-6 px-4 py-2">
                                Rejected
                            </span>
                        @endif

                    </div>

                    <!-- NAME -->
                    <div class="col-md-6">
                        <label class="form-label">Reviewer Name</label>
                        <input type="text"
                            class="form-control"
                            value="{{ $review->name }}"
                            readonly>
                    </div>

                    <!-- EMAIL -->
                    <div class="col-md-6">
                        <label class="form-label">Reviewer Email</label>
                        <input type="text"
                            class="form-control"
                            value="{{ $review->email }}"
                            readonly>
                    </div>

                    <!-- PRODUCT -->
                    <div class="col-md-6 mt-3">
                        <label class="form-label">Product</label>
                        <input type="text"
                            class="form-control"
                            value="{{ $review->product->name ?? 'N/A' }}"
                            readonly>
                    </div>

                    <!-- RATING -->
                    <div class="col-md-6 mt-3">
                        <label class="form-label">Rating</label>
                        <input type="text"
                            class="form-control"
                            value="{{ $review->rating }} / 5 Stars"
                            readonly>
                    </div>

                    <!-- CREATED DATE -->
                    <div class="col-md-6 mt-3">
                        <label class="form-label">Submitted Date</label>
                        <input type="text"
                            class="form-control"
                            value="{{ $review->created_at->format('d M Y h:i A') }}"
                            readonly>
                    </div>

                    <!-- REVIEW ID -->
                    <div class="col-md-6 mt-3">
                        <label class="form-label">Review ID</label>
                        <input type="text"
                            class="form-control"
                            value="#{{ $review->id }}"
                            readonly>
                    </div>

                    <!-- REVIEW CONTENT -->
                    <div class="col-12 mt-3">
                        <label class="form-label">Review Content</label>

                        <textarea class="form-control"
                            rows="6"
                            readonly>{{ $review->content }}</textarea>
                    </div>

                    <!-- REVIEW MEDIA -->
                    <div class="col-12 mt-4">

                        <label class="form-label">Uploaded Media</label>

                        <div class="row">

                            @forelse($review->files->where('table_name', 'review') as $file)

                                @php
                                    $extension = strtolower(pathinfo($file->url, PATHINFO_EXTENSION));

                                    $isVideo = in_array($extension, [
                                        'mp4',
                                        'mov',
                                        'avi',
                                        'webm',
                                        'mkv',
                                    ]);
                                @endphp

                                <div class="col-md-3 col-sm-6 mb-3">

                                    @if ($isVideo)

                                        <div class="card">
                                            <div class="card-body">

                                                <video width="100%" controls>
                                                    <source
                                                        src="{{ asset('storage/' . $file->url) }}">
                                                </video>

                                            </div>
                                        </div>

                                    @else

                                        <div class="card">
                                            <div class="card-body text-center">

                                                <a href="{{ asset('storage/' . $file->url) }}"
                                                    target="_blank">

                                                    <img src="{{ asset('storage/' . $file->url) }}"
                                                        class="img-fluid rounded"
                                                        style="max-height:200px; object-fit:cover;">

                                                </a>

                                            </div>
                                        </div>

                                    @endif

                                </div>

                            @empty

                                <div class="col-12">
                                    <div class="alert alert-light border">
                                        No media uploaded with this review.
                                    </div>
                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>

                <!-- ACTION BUTTONS -->
                @if ($review->status == 0)

                    <div class="text-center mt-5">

                        <!-- APPROVE -->
                        <form action="{{ route('admin.reviews.approve', $review->id) }}"
                            method="POST"
                            class="d-inline">
                            @csrf

                            <button type="submit"
                                class="btn btn-success px-5">
                                Approve Review
                            </button>
                        </form>

                        <!-- REJECT -->
                        <form action="{{ route('admin.reviews.reject', $review->id) }}"
                            method="POST"
                            class="d-inline ms-2">
                            @csrf

                            <button type="submit"
                                class="btn btn-danger px-5"
                                onclick="return confirm('Are you sure you want to reject this review?')">
                                Reject Review
                            </button>
                        </form>

                    </div>

                @elseif($review->status == 1)

                    <div class="text-center mt-5">
                        <div class="alert alert-success mb-0">
                            This review has already been approved.
                        </div>
                    </div>

                @elseif($review->status == 2)

                    <div class="text-center mt-5">
                        <div class="alert alert-danger mb-0">
                            This review has been rejected.
                        </div>
                    </div>

                @endif

            </div>
        </div>

    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection