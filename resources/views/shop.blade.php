@extends('layouts.main')
@section('content')
    <section class="collection-banner text-center">
        <h2>{{ $categoryName }}</h2>
        <p>
            <a href="{{ route('index') }}" style="color: #000; text-decoration: none;">Home</a> /
            {{ $categoryName }}
        </p>
    </section>

    <section class="shop-products py-5">
        <div class="container">
            <div class="row">

                <!-- SIDEBAR -->
                <div class="col-lg-3 shop-sidebar">

                    <!-- CATEGORY -->
                    <div class="filter-box mb-3">

                        <div class="filter-item toggle-filter">
                            Category
                            <span class="toggle-icon">+</span>
                        </div>

                        <div class="filter-content">

                            @foreach ($categories as $category)
                                <div class="form-check mb-2">

                                    <input class="form-check-input filter-checkbox" type="checkbox"
                                        value="{{ $category->id }}" data-type="category" id="category{{ $category->id }}">

                                    <label class="form-check-label" for="category{{ $category->id }}">

                                        {{ $category->name }}

                                    </label>

                                </div>
                            @endforeach

                        </div>

                    </div>

                    <!-- BRAND -->
                    <div class="filter-box mb-3">

                        <div class="filter-item toggle-filter">
                            Brand
                            <span class="toggle-icon">+</span>
                        </div>

                        <div class="filter-content">

                            @foreach ($brands as $brand)
                                <div class="form-check mb-2">

                                    <input class="form-check-input filter-checkbox" type="checkbox"
                                        value="{{ $brand->id }}" data-type="brand" id="brand{{ $brand->id }}">

                                    <label class="form-check-label" for="brand{{ $brand->id }}">

                                        {{ $brand->name }}

                                    </label>

                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>


                <!-- PRODUCTS -->
                <div class="col-lg-9 pe-5">

                    <!-- TOP BAR -->
                    <form method="GET">

                        <div class="d-flex justify-content-between mb-4">

                            <div>
                                Displayed As

                                <button type="button" class="btn btn-light btn-sm display-btn" id="gridView">
                                    <i class="fa-solid fa-grip"></i>
                                </button>

                                <button type="button" class="btn btn-light btn-sm display-btn" id="listView">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                            </div>

                            <div>
                                Sort by
                                <select name="sort" onchange="this.form.submit()"
                                    class="form-select d-inline-block w-auto">

                                    <option value="featured">Featured</option>

                                    <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>
                                        Price Low → High
                                    </option>

                                    <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>
                                        Price High → Low
                                    </option>

                                    <option value="alphabetical-asc"
                                        {{ request('sort') == 'alphabetical-asc' ? 'selected' : '' }}>
                                        A → Z
                                    </option>

                                    <option value="alphabetical-desc"
                                        {{ request('sort') == 'alphabetical-desc' ? 'selected' : '' }}>
                                        Z → A
                                    </option>

                                </select>
                            </div>

                        </div>

                    </form>

                    <!-- GRID -->
                    <div class="row g-4" id="productsWrapper">

                        @include('partials.shop-products', ['products' => $products])

                    </div>

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center mt-4">

                        {{ $products->links('pagination::bootstrap-5') }}

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        /* LIST VIEW */
        .list-view .product-column {
            width: 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        .list-view .product-box {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
        }

        .list-view .product-img {
            width: 220px;
            flex-shrink: 0;
        }

        .list-view .product-img img {
            width: 100%;
        }

        .list-view .shop-btn {
            width: fit-content;
        }

        /* GRID VIEW */
        .grid-view .product-box {
            display: block;
        }

        .filter-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 12px 15px;
            background: #f5f5f5;
            border-radius: 5px;
            font-weight: 600;
        }

        .filter-content {
            display: none;
            padding: 15px;
            border: 1px solid #eee;
            border-top: 0;
        }

        .toggle-icon {
            font-size: 18px;
            transition: 0.3s;
        }

        .filter-item.active .toggle-icon {
            transform: rotate(45deg);
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
    <script>
        function applySort(sortOption) {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('sort', sortOption);
            window.location.href = currentUrl.toString();
        }
    </script>
    <script>
        $(document).ready(function() {

            const wrapper = $('#productsWrapper');

            function setActiveButton(type) {

                $('.display-btn')
                    .removeClass('btn-dark')
                    .addClass('btn-light');

                if (type == 'grid') {

                    $('#gridView')
                        .removeClass('btn-light')
                        .addClass('btn-dark');

                } else {

                    $('#listView')
                        .removeClass('btn-light')
                        .addClass('btn-dark');
                }
            }

            // DEFAULT VIEW
            if (localStorage.getItem('displayType') == 'list') {

                wrapper.removeClass('grid-view').addClass('list-view');

                setActiveButton('list');

            } else {

                wrapper.removeClass('list-view').addClass('grid-view');

                setActiveButton('grid');
            }

            // GRID VIEW
            $('#gridView').click(function() {

                wrapper.removeClass('list-view').addClass('grid-view');

                localStorage.setItem('displayType', 'grid');

                setActiveButton('grid');
            });

            // LIST VIEW
            $('#listView').click(function() {

                wrapper.removeClass('grid-view').addClass('list-view');

                localStorage.setItem('displayType', 'list');

                setActiveButton('list');
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            $('.toggle-filter').click(function() {

                const content = $(this).next('.filter-content');

                $('.filter-content').not(content).slideUp();

                $('.toggle-filter').not(this).removeClass('active');

                content.slideToggle();

                $(this).toggleClass('active');
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            function filterProducts() {

                let categories = [];
                let brands = [];

                $('.filter-checkbox[data-type="category"]:checked').each(function() {

                    categories.push($(this).val());

                });

                $('.filter-checkbox[data-type="brand"]:checked').each(function() {

                    brands.push($(this).val());

                });

                let sort = $('select[name="sort"]').val();

                $.ajax({

                    url: "{{ route('shop.filter.ajax') }}",
                    type: "GET",
                    dataType: "html",

                    data: {
                        categories: categories,
                        brands: brands,
                        sort: sort
                    },

                    success: function(response) {

                        $('#productsWrapper').html(response);

                    }

                });

            }

            // FILTER CHANGE
            $(document).on('change', '.filter-checkbox', function() {

                filterProducts();

            });

            // SORT CHANGE
            $('select[name="sort"]').change(function(e) {

                e.preventDefault();

                filterProducts();

            });

        });
    </script>
@endsection
