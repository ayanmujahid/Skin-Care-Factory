@extends('admin.layouts.main')
@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

        <!-- Header -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Inquiry Details</h6>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-body p-40">

                <div class="row">

                    <!-- ID -->
                    <div class="col-sm-6">
                        <label class="form-label">Inquiry ID</label>
                        <input type="text" class="form-control"
                               value="{{ $inquiry->id }}" readonly>
                    </div>

                    <!-- Created At -->
                    <div class="col-sm-6">
                        <label class="form-label">Date</label>
                        <input type="text" class="form-control"
                               value="{{ $inquiry->created_at->format('d M, Y h:i A') }}" readonly>
                    </div>

                    <!-- Name -->
                    <div class="col-sm-6 mt-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control"
                               value="{{ $inquiry->name }}" readonly>
                    </div>

                    <!-- Email -->
                    <div class="col-sm-6 mt-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control"
                               value="{{ $inquiry->email }}" readonly>
                    </div>

                    <!-- Phone -->
                    <div class="col-sm-6 mt-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control"
                               value="{{ $inquiry->phone }}" readonly>
                    </div>

                    <!-- Subject -->
                    <div class="col-sm-6 mt-3">
                        <label class="form-label">Subject</label>
                        <input type="text" class="form-control"
                               value="{{ $inquiry->subject }}" readonly>
                    </div>

                    <!-- Message -->
                    <div class="col-12 mt-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="6" readonly>{{ $inquiry->message }}</textarea>
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="text-center mt-5">
                    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary px-4">
                        Back
                    </a>

                    {{-- <a href="{{ route('admin.inquiries.edit', $inquiry->id) }}" class="btn btn-primary px-4">
                        Edit
                    </a> --}}

                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Delete this inquiry?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger px-4">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection