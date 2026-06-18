@extends('layouts.main')

@section('content')
    <!-- BANNER -->
    <section class="collection-banner text-center">
        <h2>Payment Success</h2>
        <p>Home / Payment Success</p>
    </section>

    <!-- THANK YOU CONTENT -->
    <section class="thank-you-page py-5 text-center" style="background:#fbf5ec;">
        <div class="container">
            <div class="card shadow-sm p-5" style="background:#fbf5ec;">
                <div class="mb-4">
                    <i class="fa fa-check-circle text-success" style="font-size:60px;"></i>
                </div>

                <h3 class="mb-3">Thank You for Your Payment!</h3>

                <p class="mb-4">
                    Your transaction has been completed successfully. 
                    We appreciate your trust in us.
                </p>

                {{-- Optional dynamic data --}}
                {{-- @if(isset($order))
                    <p><strong>Order ID:</strong> {{ $order->id }}</p>
                    <p><strong>Amount Paid:</strong> {{ $order->total }}</p>
                @endif --}}

                <div class="mt-4">
                    <a href="{{ url('/') }}" id="cta-btn" class="btn btn-dark mt-3 px-4 py-2">
                        Go to Home
                    </a>

                    {{-- <a href="{{ url('/orders') }}" class="btn btn-outline-secondary">
                        View Orders
                    </a> --}}
                </div>
            </div>
        </div>
    </section>
@endsection