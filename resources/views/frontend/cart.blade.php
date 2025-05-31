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
                        <!-- <div class="cart-actions">
                            <span>No item Selected</span>
                            <a href="#">Select all items</a>
                        </div> -->
                    </div>
                    <hr />
                    @foreach($cartItems as $item)
                    <div class="cart-item">
                        <!-- <input type="checkbox" /> -->
                       @php
                            $images = json_decode($item->product->images ?? '[]', true);
                            $firstImage = isset($images[0]) ? str_replace('\\', '/', $images[0]) : 'default.jpg';
                        @endphp

                        <img src="{{ asset($firstImage) }}" alt="Product" class="product-image" />

                        <div class="product-details">
                            <h3>{{ $item->product->title ?? 'Product Name' }}</h3>
                            <p><strong>Size :</strong> {{ $item->size }} &nbsp;&nbsp;</p>
                           <div class="quantity-control" data-id="{{ $item->id }}">
                                <button type="button" class="qty-btn minus">−</button>

                                <span class="qty-display">{{ $item->quantity }}</span>

                                <button type="button" class="qty-btn plus">+</button>
                                <button class="delete-btn" type="button">Delete</button>
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
                    <a href="{{ route('shipping.index') }}">
                        <button class="checkout-btn">Proceed to checkout</button>
                    </a>
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
        const csrfToken = '{{ csrf_token() }}';

        document.querySelectorAll('.quantity-control').forEach(control => {
            const qtyDisplay = control.querySelector('.qty-display');
            const plusBtn = control.querySelector('.plus');
            const minusBtn = control.querySelector('.minus');
            const deleteBtn = control.querySelector('.delete-btn');
            const itemId = control.dataset.id;

            let quantity = parseInt(qtyDisplay.textContent);

            plusBtn.addEventListener('click', () => {
                quantity += 1;
                updateQuantity(itemId, quantity, qtyDisplay, control);
            });

            minusBtn.addEventListener('click', () => {
                if (quantity > 1) {
                    quantity -= 1;
                    updateQuantity(itemId, quantity, qtyDisplay, control);
                }
            });

            deleteBtn.addEventListener('click', () => {
                if (confirm("Are you sure you want to remove this item?")) {
                    deleteItem(itemId, control);
                }
            });

            function updateQuantity(id, qty, display, control) {
                fetch(`/cart/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ quantity: qty })
                })
                .then(response => response.json())
                .then(data => {
                    display.textContent = qty;

                    // Update subtotal for the item
                    const price = parseFloat(control.closest('.cart-item').querySelector('.price-details h3').textContent.replace('$', ''));
                    const priceText = control.closest('.cart-item').querySelector('.price-details span');
                    priceText.textContent = `x ${qty}`;

                    // Recalculate subtotal and total quantity
                    updateSubtotalAndCount();
                });
            }

            function deleteItem(id, control) {
                fetch(`/cart/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const item = control.closest('.cart-item');
                    item.remove();

                    updateSubtotalAndCount();
                });
            }

            function updateSubtotalAndCount() {
                let subtotal = 0;
                let totalQty = 0;

                document.querySelectorAll('.cart-item').forEach(item => {
                    const price = parseFloat(item.querySelector('.price-details h3').textContent.replace('$', ''));
                    const qty = parseInt(item.querySelector('.qty-display').textContent);

                    subtotal += price * qty;
                    totalQty += qty;
                });

                document.querySelectorAll('.subtotal strong').forEach(el => el.textContent = `$${subtotal.toFixed(2)}`);
                document.querySelectorAll('.subtotal span').forEach(el => el.textContent = `Subtotal (${totalQty} items)`);

                const checkoutLines = document.querySelectorAll('.checkout-line');
                checkoutLines[0].querySelector('span').textContent = `Subtotal (${totalQty} items)`;
                checkoutLines[0].querySelector('strong').textContent = `$${subtotal.toFixed(2)}`;
                checkoutLines[1].querySelector('strong').textContent = `$${subtotal.toFixed(2)}`;
            }
        });
    });
</script>




</body>

</html>
@endsection