@extends('Layout.master')

@section('content')

<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <!-- Billing Form -->
            <div class="col-lg-4">
                <div class="billing-form bg-white p-4 rounded shadow-sm">
                    <h4 class="mb-4"><span class="orange-text">Billing</span> Details</h4>
                    <form action="{{ route('client-create-us') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                        </div>
                        <!-- Hidden Inputs for Total Price and Products -->
                        <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                        <input type="hidden" name="products" value="{{ json_encode($products) }}">
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-orange btn-lg btn-block">
                                Complete Purchase
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-8">
                <div class="order-details bg-light p-4 rounded shadow-sm">
                    <h4 class="mb-4"><span class="orange-text">Order</span> Summary</h4>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product['name'] }}</td>
                                    <td>${{ number_format((float) $product['price'], 2) }}</td>
                                    <td>{{ $product['quantity'] }}</td>
                                    <td>${{ number_format($product['quantity'] * $product['price'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right mt-3">
                        <h5><strong>Total Price: </strong> <span class="text-success">${{ number_format((float) $totalPrice, 2) }}</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
