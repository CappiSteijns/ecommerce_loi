@extends('frontend.main_master')

@section('content')
<div class="container">
    <h2 class="my-4">{{ $category->category_name_en }}</h2>
    
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" alt="{{ $product->product_name_en }}">
                <div class="card-body">
                    <h5>{{ $product->product_name_en }}</h5>
                    <p>€{{ $product->selling_price }}</p>
                    <a href="#" class="btn btn-primary">Bekijk product</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
