@extends('Layout.master')

@section('content')

<div class="shop-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcats as $subcat)
                            <tr class="table-body-row">
                                <td class="product-image">
                                    <img src="{{ asset('uploades/subcat/' . $subcat->img) }}" alt="{{ $subcat->name }}">
                                </td>
                                <td class="product-name">{{ $subcat->name }}</td>
                                <td class="product-price">${{ $subcat->price }}</td>
                                <td class="product-quantity">
                                    <input type="number" class="quantity-input"
                                        data-price="{{ $subcat->price }}"
                                        placeholder="0"
                                        min="0">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td id="total-price">After Check-out</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <form action="{{ route('check-us') }}" method="POST">
                            @csrf
                            <input type="hidden" name="products" id="products">
                            <input type="hidden" name="totalPrice" id="total-price-hidden">
                            <button type="submit" class="boxed-btn black">Check Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const totalPriceElement = document.getElementById('total-price');
        const productsInput = document.getElementById('products');
        const totalPriceHiddenInput = document.getElementById('total-price-hidden');

        function updateTotalPrice() {
            let total = 0;
            const products = [];

            quantityInputs.forEach(input => {
                const price = parseFloat(input.dataset.price);
                const quantity = parseInt(input.value) || 0;

                if (quantity > 0) {
                    products.push({
                        name: input.closest('tr').querySelector('.product-name').textContent,
                        price: price,
                        quantity: quantity
                    });
                }

                total += price * quantity;
            });

            totalPriceElement.textContent = `$${total.toFixed(2)}`;
            productsInput.value = JSON.stringify(products);
            totalPriceHiddenInput.value = total;
        }

        quantityInputs.forEach(input => {
            input.addEventListener('input', updateTotalPrice);
        });
    });
</script>

@stop
