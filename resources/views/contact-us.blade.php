@extends('layouts.main')
@section('content')

    <!-- Banner -->
    <section class="collection-banner text-center">
        <h2>Contact Us</h2>
        <p>Home / Contact Us</p>
    </section>

    <!-- Contact Info -->
    <section class="py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Get In Touch</h2>
                <p class="text-muted">
                    We'd love to hear from you. Reach out for product inquiries,
                    support, or general questions.
                </p>
            </div>

            <div class="row g-4 mb-5">

                <div class="col-md-4">
                    <div class="contact-card text-center">
                        <i class="fa fa-map-marker"></i>
                        <h5>Address</h5>
                        <p>
                            SkinCare Factory<br>
                            Austin, Texas
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-card text-center">
                        <i class="fa fa-envelope"></i>
                        <h5>Email</h5>
                        <p>
                            info@skincarefactory.com
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-card text-center">
                        <i class="fa fa-phone"></i>
                        <h5>Phone</h5>
                        <p>
                            +1 (123) 123-1234
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Contact Form + Details -->
    <section class="pb-5">
        <div class="container">

            <div class="row g-5">

                <div class="col-lg-7">

                    <div class="contact-box">

                        <h3 class="mb-4">
                            Send Us a Message
                        </h3>

                        <form action="{{ route('contactSubmit') }}" method="POST">
                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           placeholder="Full Name"
                                           required>
                                </div>

                                <div class="col-md-6">
                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           placeholder="Email Address"
                                           required>
                                </div>

                                <div class="col-12">
                                    <input type="text"
                                           name="subject"
                                           class="form-control"
                                           placeholder="Subject"
                                           required>
                                </div>

                                <div class="col-12">
                                    <textarea name="message"
                                              rows="6"
                                              class="form-control"
                                              placeholder="Write your message..."
                                              required></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4">
                                        Send Message
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="contact-box h-100">

                        <h3 class="mb-4">
                            Business Information
                        </h3>

                        <p class="text-muted">
                            SkinCare Factory is dedicated to helping customers
                            discover high-quality skincare solutions and expert
                            educational resources.
                        </p>

                        <ul class="list-unstyled contact-list">
                            <li>
                                <strong>Working Hours</strong><br>
                                Monday - Friday: 9:00 AM - 6:00 PM
                            </li>

                            <li>
                                <strong>Email</strong><br>
                                info@skincarefactory.com
                            </li>

                            <li>
                                <strong>Phone</strong><br>
                                +1 (123) 123-1234
                            </li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- Map -->
    <section class="pb-5">
        <div class="container">
            <div class="map-wrapper">

                <iframe
                    src="https://maps.google.com/maps?q=austin&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>

            </div>
        </div>
    </section>

@endsection
@section('css')
<style>

section{
    background: #fbf5ec;
}

    .contact-card{
        background:#f2ddc3;
        border:1px solid #ececec;
        border-radius:15px;
        padding:30px 20px;
        transition:.3s;
        height:100%;
    }

    .contact-card:hover{
        transform:translateY(-5px);
        box-shadow:0 15px 30px rgba(0,0,0,.08);
    }

    .contact-card i{
        font-size:35px !important;
        margin-bottom:15px;
    }

    .contact-box{
        background:#fbf5ec;
        border:1px solid #ececec;
        border-radius:15px;
        padding:35px;
        box-shadow:0 5px 20px rgba(0,0,0,.04);
    }

    .contact-box .form-control{
        height:52px;
        border-radius:10px;
    }

    .contact-box textarea.form-control{
        height:auto;
    }

    .contact-list li{
        margin-bottom:25px;
        color:#6c757d;
    }

    .map-wrapper{
        overflow:hidden;
        border-radius:15px;
        box-shadow:0 10px 25px rgba(0,0,0,.08);
    }

     .btn-primary {
            background: #000;
            border-color: #000;
        }

        .btn-primary:hover {
            background: #fbf5ec;
            border-color: #000;
            color: #000
        }

    @media(max-width:767px){

        .contact-box{
            padding:25px;
        }

        .contact-card{
            padding:25px 15px;
        }

    }

</style>
@endsection
@section('js')
<script>
    (() => {

    })();
</script>
@endsection