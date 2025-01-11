@extends('Layout.master')

@section('content')

<div class="subcategory-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Products in <span class="orange-text">{{ $cat->name }}</span></h3>
                    <p>Browse through the products in this category.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($subcats as $subcat)
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <img src="{{ asset('uploades/subcat/' . $subcat->img) }}" alt="{{ $subcat->name }}">
                        </div>
                        <h3>{{ $subcat->name }}</h3>
                        <p>${{ number_format((float) $subcat->price, 2) }}</p>
                        <form action="{{ route('shop-us', $cat->id) }}" method="GET">
                            <input type="hidden" name="product_name" value="{{ $subcat->name }}">
                            <input type="hidden" name="product_price" value="{{ $subcat->price }}">
                            <button type="submit" class="cart-btn" style=" background-color: #ff7f27; /* Orange button color */
      color: white;
      font-size: 16px;
      font-weight: bold;
      padding: 10px 20px;
      border: none;      border-radius: 25px; /* Rounded edges */
"><i class="fas fa-shopping-cart"></i> Add to Cart</button>

                        </form>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>

@stop
