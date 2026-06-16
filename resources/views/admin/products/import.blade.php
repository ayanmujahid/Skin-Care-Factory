@extends('admin.layouts.main')

@section('content')
@extends('admin.layouts.sidebar')

<div class="card">

    <div class="card-header">
        Shopify Import
    </div>

    <div class="card-body">

        <form method="POST"
              action="{{ url('/admin/products/import') }}">

            @csrf

            <div class="mb-3">

                <label>Store URL</label>

                <input
                    type="text"
                    name="store_url"
                    class="form-control"
                    placeholder="https://store.com">

            </div>

            <button class="btn btn-primary">

                Import Products

            </button>

        </form>

    </div>

</div>

@endsection