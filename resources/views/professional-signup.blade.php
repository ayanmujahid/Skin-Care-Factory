@extends('layouts.main')
@section('content')
    <section class="collection-banner text-center">
        <h2>ACCOUNT</h2>
        <p>Home / Professional Signup</p>
    </section>

    <section>
        <div class="account professional-register py-5">

            <form method="POST" action="{{ route('professionalRegistration') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-grid">

        <!-- First Name -->
        <div class="form-group">
            <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Phone -->
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <input type="password" name="password" placeholder="Password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
        </div>

        <!-- Professional Type -->
        <div class="form-group">
            <select name="professional_type" id="professional_type">
                <option value="">Select Professional Type</option>

                @foreach ($types as $type => $data)
                    <option value="{{ $type }}" {{ old('professional_type') == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
            @error('professional_type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Other Type -->
        <div class="form-group" id="other_type_box" style="{{ old('professional_type') == 'Other' ? '' : 'display:none;' }}">
            <input type="text" name="other_professional_type" placeholder="Enter Professional Type" value="{{ old('other_professional_type') }}">
            @error('other_professional_type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

    </div>

    <!-- LICENSE SECTION -->
    <div id="license_section" style="{{ old('professional_type') == 'Student' ? 'display:none;' : '' }}">
        <div class="form-grid">

            <div class="form-group">
                <input type="text" name="license_number" placeholder="License Number" value="{{ old('license_number') }}">
                @error('license_number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <input type="text" name="license_state" placeholder="State of License" value="{{ old('license_state') }}">
                @error('license_state') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <input type="date" name="license_expiration" value="{{ old('license_expiration') }}">
                @error('license_expiration') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Upload License</label>
                <input type="file" name="license_upload">
                @error('license_upload') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        </div>
    </div>

    <!-- STUDENT SECTION -->
    <div id="student_section" style="{{ old('professional_type') == 'Student' ? '' : 'display:none;' }}">
        <div class="form-grid">

            <div class="form-group">
                <input type="text" name="school_name" placeholder="School Name" value="{{ old('school_name') }}">
                @error('school_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <input type="text" name="program_enrolled" placeholder="Program Enrolled" value="{{ old('program_enrolled') }}">
                @error('program_enrolled') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <input type="date" name="expected_graduation" value="{{ old('expected_graduation') }}">
                @error('expected_graduation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Upload Student ID (optional)</label>
                <input type="file" name="student_id_upload">
                @error('student_id_upload') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        </div>
    </div>

    <!-- OPTIONAL INFO -->
    <h4 class="optional-title">Optional Information</h4>

    <div class="form-grid">

        <div class="form-group">
            <input type="text" name="business_name" placeholder="Business Name" value="{{ old('business_name') }}">
        </div>

        <div class="form-group">
            <input type="text" name="instagram" placeholder="Instagram Handle" value="{{ old('instagram') }}">
        </div>

        <div class="form-group">
            <input type="text" name="website" placeholder="Website" value="{{ old('website') }}">
        </div>

        <div class="form-group">
            <input type="text" name="tax_id" placeholder="Resale / Tax ID" value="{{ old('tax_id') }}">
        </div>

        <div class="form-group full-width">
            <input type="text" name="business_address" placeholder="Business Address" value="{{ old('business_address') }}">
        </div>

    </div>

    <button type="submit">Create Professional Account</button>

    <div class="account-links">
        <a href="{{ route('login') }}">Already have an account?</a>
        <a href="{{ route('index') }}">Return to Store</a>
    </div>
</form>

        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
    <script>
        let typeSelect = document.getElementById("professional_type");
        let studentSection = document.getElementById("student_section");
        let licenseSection = document.getElementById("license_section");
        let otherType = document.getElementById("other_type_box");

        typeSelect.addEventListener("change", function() {

            if (this.value === "Student") {
                studentSection.style.display = "block";
                licenseSection.style.display = "none";
            } else {
                studentSection.style.display = "none";
                licenseSection.style.display = "block";
            }

            if (this.value === "Other") {
                otherType.style.display = "block";
            } else {
                otherType.style.display = "none";
            }

        });
    </script>
@endsection
