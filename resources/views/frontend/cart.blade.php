@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css" />
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart">
                    <div class="cart-header">
                        <h2>Shopping cart</h2>
                        <div class="cart-actions">
                            <span>No item Selected</span>
                            <a href="#">Select all items</a>
                        </div>
                    </div>
                    <hr />
                    @foreach($cartItems as $item)
                    <div class="cart-item">
                        <input type="checkbox" />
                       @php
                            $images = json_decode($item->product->images ?? '[]', true);
                            $firstImage = isset($images[0]) ? str_replace('\\', '/', $images[0]) : 'default.jpg';
                        @endphp

                        <img src="{{ asset($firstImage) }}" alt="Product" class="product-image" />

                        <div class="product-details">
                            <h3>{{ $item->product->title ?? 'Product Name' }}</h3>
                            <p><strong>Size :</strong> {{ $item->size }} &nbsp;&nbsp;</p>
                           <div class="quantity-control">
                                <form method="POST" action="{{ route('cart.update', $item->id) }}" class="quantity-form">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="qty-btn minus">−</button>

                                    <!-- This hidden input is needed for the controller to receive the quantity -->
                                    <input type="hidden" name="quantity" value="{{ $item->quantity }}">

                                    <span class="qty-display">{{ $item->quantity }}</span>

                                    <button type="button" class="qty-btn plus">+</button>
                                    <button type="submit" style="display: none;">Update</button>
                                </form>

                                <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-btn" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="price-details">
                            <h3>${{ $item->product->price ?? 0 }}</h3>
                            <span>x {{ $item->quantity }}</span>
                        </div>
                    </div>
                    <hr />
                    @endforeach

                    <hr />
                   @php
                        $subtotal = $cartItems->sum(function($item) {
                            return ($item->product->price ?? 0) * $item->quantity;
                        });
                    @endphp

                    <div class="subtotal">
                        <span>Subtotal ({{ $cartItems->count() }} items)</span>
                        <strong>${{ $subtotal }}</strong>
                    </div>
                </div>
            </div>
            @php
                $subtotal = 0;
                $totalQuantity = 0;

                foreach ($cartItems as $item) {
                    $subtotal += $item->quantity * $item->product->price;
                    $totalQuantity += $item->quantity;
                }
            @endphp

            <div class="col-12 col-lg-4">
                <div class="checkout">
                    <h2>Checkout</h2>
                    <hr />
                    <div class="checkout-line">
                        <span>Subtotal ({{ $totalQuantity }} items)</span>
                        <strong>${{ number_format($subtotal, 2) }}</strong>
                    </div>
                    <div class="checkout-line">
                        <span>Total</span>
                        <strong>${{ number_format($subtotal, 2) }}</strong>
                    </div>
                    <button class="checkout-btn">Proceed to checkout</button>
                </div>
            </div>

        </div>
    </div>
    <style>
      
        .h2,
        h2 {
            font-size: 1.1em;
        }

        .cart,
        .checkout {
            background: white;
            border-radius: 12px;
            padding: 41px;
            flex: 1 1 600px;
            min-width: 300px;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-actions a {
            color: #005700;
            text-decoration: underline;
            margin-left: 10px;
        }

        .cart-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px 0;
        }

        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            object-fit: cover;
        }

        .product-details {
            flex: 1;
        }

        .product-details h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .old-price {
            color: red;
            text-decoration: line-through;
            margin-right: 10px;
        }

        .offer {
            color: green;
            font-weight: bold;
        }

        .quantity-control {
            margin-top: 10px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .quantity-control button {
            padding: 5px 12px;
            border: 1px solid #ccc;
            background: white;
            border-radius: 8px;
            cursor: pointer;
        }

        .delete-btn {
            background: #f1f1f1;
            padding: 5px 15px;
            border: 1px solid #ccc;
        }

        .price-details {
            text-align: right;
            white-space: nowrap;
        }

        .subtotal {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            padding-top: 10px;
        }

        .checkout {
            max-width: 320px;
        }

        .checkout h2 {
            margin-bottom: 10px;
        }

        .checkout-line {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }

        .checkout-btn {
            width: 100%;
            padding: 15px;
            background: #5C4730;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            margin-top: 15px;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .cart,
            .checkout {
                background: white;
                border-radius: 12px;
                padding: 20px;
                flex: 1 1 00px;
                min-width: 407px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.quantity-form').forEach(function (form) {
                const minusBtn = form.querySelector('.minus');
                const plusBtn = form.querySelector('.plus');
                const input = form.querySelector('input[name="quantity"]');
                const display = form.querySelector('.qty-display');
                const submitBtn = form.querySelector('button[type="submit"]');

                minusBtn.addEventListener('click', function () {
                    let qty = parseInt(input.value);
                    if (qty > 1) {
                        qty -= 1;
                        input.value = qty;
                        display.textContent = qty;
                        submitBtn.click();
                    }
                });

                plusBtn.addEventListener('click', function () {
                    let qty = parseInt(input.value);
                    qty += 1;
                    input.value = qty;
                    display.textContent = qty;
                    submitBtn.click();
                });
            });
        });
    </script>


</body>

</html>
@endsection