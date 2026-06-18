@forelse($products as $product)

<div class="col-md-4 product-column">

    <div class="product-box">

        <div class="product-img">

            <img src="{{ $product->mainImage?->url
    ? asset('storage/' . $product->mainImage->url)
    : asset('assets/images/placeholder.png') }}">

        </div>

        <small>{{ $product->category->name ?? '' }}</small>

        <a class="text-dark text-decoration-none"
            href="{{ route('productDetails', $product->slug) }}">

            <h6>{{ $product->name }}</h6>

        </a>

        <strong>${{ $product->firstVariant->price }}</strong>

        <button id="cta-btn"
            class="shop-btn quick-view-btn"
            data-product-id="{{ $product->id }}">

            Add to Cart

        </button>

    </div>

</div>

@empty

<div class="col-12 text-center">

    <h4>No Products Found</h4>

</div>

@endforelse