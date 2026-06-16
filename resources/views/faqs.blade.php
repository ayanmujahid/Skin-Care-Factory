@extends('layouts.main')

@section('content')
    <!-- Breadcrumb Area -->
      <section class="collection-banner text-center">
        <h2>FAQs</h2>
        <p>Home / Faqs</p>
    </section>

    <!-- FAQ Section -->
    <section class="faqs-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="text-center mb-4">
                        <h2>Frequently Asked Questions</h2>
                        <p class="text-muted">
                            Find answers to common questions below.
                        </p>
                    </div>

                    <div class="accordion" id="faqAccordion">

                        <!-- FAQ 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne"
                                        aria-expanded="true"
                                        aria-controls="collapseOne">
                                    What services do you provide?
                                </button>
                            </h2>

                            <div id="collapseOne"
                                 class="accordion-collapse collapse show"
                                 aria-labelledby="headingOne"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We provide web development, mobile app development,
                                    UI/UX design, and digital solutions tailored to your needs.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo"
                                        aria-expanded="false"
                                        aria-controls="collapseTwo">
                                    How can I contact support?
                                </button>
                            </h2>

                            <div id="collapseTwo"
                                 class="accordion-collapse collapse"
                                 aria-labelledby="headingTwo"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can contact our support team via email,
                                    phone, or the contact form on our website.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree"
                                        aria-expanded="false"
                                        aria-controls="collapseThree">
                                    Do you offer custom solutions?
                                </button>
                            </h2>

                            <div id="collapseThree"
                                 class="accordion-collapse collapse"
                                 aria-labelledby="headingThree"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we create custom solutions based on your business
                                    requirements and goals.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour"
                                        aria-expanded="false"
                                        aria-controls="collapseFour">
                                    How long does a project take?
                                </button>
                            </h2>

                            <div id="collapseFour"
                                 class="accordion-collapse collapse"
                                 aria-labelledby="headingFour"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Project timelines vary depending on scope and complexity.
                                    After discussing your requirements, we provide a detailed timeline.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
<style>
    .faqs-section {
        background-color: #fbf5ec;
    }
    .accordion-item {
        border: 1px solid #e5e5e5;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 12px;
    }

    .accordion-button {
        font-weight: 600;
        padding: 18px 20px;
    }

    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #000;
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: transparent;
    }

    .accordion-body {
        padding: 20px;
        color: #666;
        line-height: 1.7;
    }

    /* Smoother transition */
    .accordion-collapse {
        transition: all 0.35s ease;
    }
</style>
@endsection

@section('js')
<script>
    (() => {
        // Optional custom JS
    })();
</script>
@endsection