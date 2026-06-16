@if($products->count())

    @foreach($products as $product)

        <a href="{{ route('productDetails', $product->slug) }}"
            class="text-dark text-decoration-none">

            <div class="search-product">

                <img src="{{ asset('storage/' . $product->mainImage->url) }}" alt="">

                <div>
                    <h6>{{ $product->name }}</h6>
                    <p>${{ number_format(optional($product->firstVariant)->price ?? 0, 2) }}</p>
                </div>

            </div>

        </a>

    @endforeach

@else

    <div class="p-4 text-center">
        No products found
    </div>

@endif