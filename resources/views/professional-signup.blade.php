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

                    <!-- Row 1 -->
                    <div class="form-group">
                        <input type="text" name="first_name" placeholder="First Name" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="last_name" placeholder="Last Name" required>
                    </div>

                    <!-- Row 2 -->
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Phone Number" required>
                    </div>

                    <!-- Row 3 -->
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>

                    <!-- Row 4 -->
                    <div class="form-group">
                        <select name="professional_type" id="professional_type">

                            <option value="">Select Professional Type</option>

                            @foreach ($types as $type => $data)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group" id="other_type_box" style="display:none;">
                        <input type="text" name="other_professional_type" placeholder="Enter Professional Type">
                    </div>

                </div>

                <!-- LICENSE SECTION -->
                <div id="license_section">

                    <div class="form-grid">

                        <div class="form-group">
                            <input type="text" name="license_number" placeholder="License Number">
                        </div>

                        <div class="form-group">
                            <input type="text" name="license_state" placeholder="State of License">
                        </div>

                        <div class="form-group">
                            <input type="date" name="license_expiration">
                        </div>

                        <div class="form-group">
                            <label>Upload License</label>
                            <input type="file" name="license_upload">
                        </div>

                    </div>

                </div>


                <!-- STUDENT SECTION -->
                <div id="student_section" style="display:none;">

                    <div class="form-grid">

                        <div class="form-group">
                            <input type="text" name="school_name" placeholder="School Name">
                        </div>

                        <div class="form-group">
                            <input type="text" name="program_enrolled" placeholder="Program Enrolled">
                        </div>

                        <div class="form-group">
                            <input type="date" name="expected_graduation">
                        </div>

                        <div class="form-group">
                            <label>Upload Student ID (optional)</label>
                            <input type="file" name="student_id_upload">
                        </div>

                    </div>

                </div>


                <!-- OPTIONAL BUSINESS INFO -->

                <h4 class="optional-title">Optional Information</h4>

                <div class="form-grid">

                    <div class="form-group">
                        <input type="text" name="business_name" placeholder="Business Name">
                    </div>

                    <div class="form-group">
                        <input type="text" name="instagram" placeholder="Instagram Handle">
                    </div>

                    <div class="form-group">
                        <input type="text" name="website" placeholder="Website">
                    </div>

                    <div class="form-group">
                        <input type="text" name="tax_id" placeholder="Resale / Tax ID">
                    </div>

                    <div class="form-group full-width">
                        <input type="text" name="business_address" placeholder="Business Address">
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
