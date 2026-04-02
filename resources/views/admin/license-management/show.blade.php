@extends('admin.layouts.main')
@section('content')
    @include('admin.layouts.sidebar')

    <div class="dashboard-main-body">

    <!-- Header -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Professional Review</h6>
    </div>

    <div class="card h-100 p-0 radius-12 overflow-hidden">
        <div class="card-body p-40">

            <div class="row">

                <!-- STATUS -->
                <div class="col-12 mb-3 text-center">
                    @if($professional->user->verified_status == 0)
                        <span class="badge bg-warning">Pending</span>
                    @elseif($professional->user->verified_status == 1)
                        <span class="badge bg-success">Approved</span>
                    @elseif($professional->user->verified_status == 2)
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </div>

                <!-- NAME -->
                <div class="col-sm-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" 
                        value="{{ $professional->user->name }}" readonly>
                </div>

                <!-- EMAIL -->
                <div class="col-sm-6">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" 
                        value="{{ $professional->user->email }}" readonly>
                </div>

                <!-- PHONE -->
                <div class="col-sm-6 mt-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" 
                        value="{{ $professional->phone }}" readonly>
                </div>

                <!-- TYPE -->
                <div class="col-sm-6 mt-3">
                    <label class="form-label">Professional Type</label>
                    <input type="text" class="form-control" 
                        value="{{ $professional->professional_type }}" readonly>
                </div>

                <!-- LICENSE NUMBER -->
                <div class="col-sm-6 mt-3">
                    <label class="form-label">License Number</label>
                    <input type="text" class="form-control" 
                        value="{{ $professional->license_number }}" readonly>
                </div>

                <!-- LICENSE STATE -->
                <div class="col-sm-6 mt-3">
                    <label class="form-label">License State</label>
                    <input type="text" class="form-control" 
                        value="{{ $professional->license_state }}" readonly>
                </div>

                <!-- LICENSE EXPIRY -->
                <div class="col-sm-6 mt-3">
                    <label class="form-label">License Expiration</label>
                    <input type="text" class="form-control" 
                        value="{{ $professional->license_expiration }}" readonly>
                </div>

                <!-- LICENSE FILE -->
                <div class="col-sm-6 mt-3">
                    <label class="form-label">License File</label><br>

                    @if($professional->license_upload)
                        <a href="{{ asset('storage/'.$professional->license_upload) }}" target="_blank">
                            <img src="{{ asset('storage/'.$professional->license_upload) }}" width="120">
                        </a>
                    @else
                        <span class="text-muted">Not Uploaded</span>
                    @endif
                </div>

                <!-- STUDENT ID -->
                <div class="col-sm-6 mt-3">
                    <label class="form-label">Student ID</label><br>

                    @if($professional->student_id_upload)
                        <a href="{{ asset('storage/'.$professional->student_id_upload) }}" target="_blank">
                            <img src="{{ asset('storage/'.$professional->student_id_upload) }}" width="120">
                        </a>
                    @else
                        <span class="text-muted">Not Uploaded</span>
                    @endif
                </div>

                <!-- BUSINESS -->
                <div class="col-sm-6 mt-3">
                    <label class="form-label">Business Name</label>
                    <input type="text" class="form-control" 
                        value="{{ $professional->business_name }}" readonly>
                </div>

                <!-- WEBSITE -->
                <div class="col-sm-6 mt-3">
                    <label class="form-label">Website</label>
                    <input type="text" class="form-control" 
                        value="{{ $professional->website }}" readonly>
                </div>

                <!-- ADDRESS -->
                <div class="col-12 mt-3">
                    <label class="form-label">Business Address</label>
                    <textarea class="form-control" readonly>{{ $professional->business_address }}</textarea>
                </div>

            </div>

            <!-- ACTION BUTTONS -->
            @if($professional->user->verified_status == 0)
            <div class="text-center mt-5">

                <!-- APPROVE -->
                <form action="{{ route('admin.professional.approve', $professional->user_id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-success px-4">Approve</button>
                </form>

                <!-- REJECT BUTTON -->
                <button class="btn btn-danger px-4" onclick="toggleReject()">Reject</button>

                <!-- REJECT FORM -->
                <form action="{{ route('admin.professional.reject', $professional->user_id) }}" method="POST" id="rejectForm" class="mt-3" style="display:none;">
                    @csrf

                    <textarea name="reason" class="form-control mb-3" placeholder="Enter rejection reason" required></textarea>

                    <button class="btn btn-danger">Submit Rejection</button>
                </form>

            </div>
            @endif

        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        /* Page specific CSS */
    </style>
@endsection

@section('js')
    <script>
        (() => {
            /* Page specific JS */
        })();
    </script>
    <script>
function toggleReject() {
    let form = document.getElementById('rejectForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}
</script>
@endsection
