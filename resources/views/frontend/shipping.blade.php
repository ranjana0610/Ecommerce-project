@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout Page</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
    }
    
    .container {
      display: flex;
      gap: 20px;
      padding: 20px;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .left,
    .right {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
    }

    .left {
      flex: 2;
      min-width: 300px;
    }

    .right {
      flex: 1;
      min-width: 280px;
    }

    /* Delivery Address */
    .address-section {
      margin-bottom: 30px;
    }

    .address-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .add-address {
      border: 2px dashed #ccc;
      padding: 40px 20px;
      border-radius: 10px;
      text-align: center;
      cursor: pointer;
    }

    .add-address .plus {
      font-size: 40px;
      color: #888;
      line-height: 1;
    }

    .add-address .text {
      font-size: 16px;
      margin-top: 10px;
      color: #333;
    }

    /* Order Summary */
    .order-summary-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .order-item {
      display: flex;
      gap: 15px;
      margin-bottom: 15px;
    }

    .order-item img {
      width: 80px;
      height: 80px;
      border-radius: 8px;
      object-fit: cover;
      border: 1px solid #ccc;
    }

    .order-info {
      flex: 1;
    }

    .order-info h4 {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .order-info p {
      font-size: 14px;
      margin: 3px 0;
    }

    .order-info .strike {
      text-decoration: line-through;
      color: #888;
    }

    .order-info .offer {
      color: green;
      font-weight: bold;
    }

    /* Checkout Box */
    .checkout-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .checkout-line {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
      font-size: 16px;
    }

    .checkout-total {
      font-weight: bold;
      font-size: 18px;
      border-top: 1px solid #ddd;
      padding-top: 10px;
      margin-top: 10px;
    }

    .checkout-button {
      width: 100%;
      background: #9b59b6;
      color: #fff;
      border: none;
      padding: 15px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      margin: 20px 0;
    }

    .saving-box {
      background: #e6fff1;
      padding: 15px;
      border-radius: 8px;
      color: #009b5a;
      font-weight: bold;
      font-size: 16px;
      text-align: center;
    }

    /* Mobile Responsive */
    @media screen and (max-width: 768px) {
      .container {
        flex-direction: column;
      }
    }

    .pickup-section {
      max-width: 800px;
      margin: auto;
    }

    .pickup-title {
      font-weight: bold;
      font-size: 20px;
      margin-bottom: 10px;
    }

    .pickup-box {
      background-color: #eefcf6;
      padding: 15px 20px;
      border-radius: 12px;
      color: #224422;
      font-size: 16px;
      line-height: 1.5;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
    }

    .pickup-address {
      flex: 1;
      min-width: 250px;
    }

    .pickup-address span {
      display: block;
      margin-top: 5px;
    }

    .pickup-buttons {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .pickup-buttons button {
      padding: 6px 12px;
      font-size: 14px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .edit-btn {
      background-color: #ddd;
      color: #000;
    }

    .delete-btn {
      background-color: #ff4d4d;
      color: #fff;
    }

    /* Responsive */
    @media (max-width: 600px) {
      .pickup-box {
        flex-direction: column;
      }

      .pickup-buttons {
        justify-content: flex-end;
        margin-top: 15px;
      }
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .modal-dialog {
        max-width: 680px;
    }

      .modal-content {
        max-height: 90vh;
        display: flex;
        flex-direction: column;
        border-radius: 12px;
        padding: 0;
      }

      .modal-header,
      .modal-footer {
        padding: 20px 30px;
        background-color: #fff;
        border-bottom: 1px solid #dee2e6;
      }

      .modal-footer {
        border-top: 1px solid #dee2e6;
      }

      .modal-body {
        padding: 20px 30px;
        overflow-y: auto;
        flex-grow: 1;
      }

      .form-control,
      .form-select {
        border-radius: 10px;
        height: 48px;
      }

      .form-label {
        font-weight: 600;
      }

      .btn-primary {
        background-color: #5f259f;
        border: none;
        border-radius: 12px;
        padding: 10px 25px;
      }

      .btn-secondary {
        border-radius: 12px;
        background-color: #f1f1f1;
        color: #000;
        border: 1px solid #ccc;
      }

      .input-group-text {
        border-radius: 10px 0 0 10px;
      }

      .form-control:focus,
      .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(95, 37, 159, 0.25);
        border-color: #5f259f;
      }
  </style>
</head>

<body>

  <div class="container">
    <!-- Left Section -->
    <div class="left">
      <div class="address-section">
        <div class="address-title">Delivery Address</div>

        <div class="add-address" data-bs-toggle="modal" data-bs-target="#addressModal" style="cursor: pointer;">
          <div class="plus">+</div>
          <div class="text">Add new<br>address</div>
        </div>
      </div>

      <div class="pickup-section">
  <div class="pickup-title">Pickup Address</div>

  @if($shipping)
  <div class="pickup-box">
    <div class="pickup-address">
      {{ $shipping->address }}, {{ $shipping->city }}, {{ $shipping->state }}, {{ $shipping->zip_code }}, {{ $shipping->country }},
      <span>Tel: {{ $shipping->phone }}</span>
    </div>
    <div class="pickup-buttons">
      <button class="edit-btn">Edit</button>
      <button class="delete-btn">Delete</button>
    </div>
  </div>
  @else
    <p>No shipping data found.</p>
  @endif
</div>
      <hr>
      <div class="order-summary-title">Order Summary</div>
       @foreach($cartItems as $item)
      <div class="order-item">
        @php
          $images = json_decode($item->product->images, true);
          $firstImage = $images[0] ?? 'default.jpg'; // fallback if empty
      @endphp

      <img src="{{ asset($firstImage) }}" alt="{{ $item->product->title }}" width="80">
        <div class="order-info">
          <h4>Women's Regrowth Kit Plus</h4>
          <p>Size: {{ $item->size }}</p>
           @if($item->product->original_price > $item->product->price)
            <span class="strike">${{ $item->product->original_price }}</span>
            <span class="offer">{{ 100 - round(($item->product->price / $item->product->original_price) * 100) }}% Offer</span>
          @endif
          <p>${{ $item->product->price }} x {{ $item->quantity }}</p>
        </div>
      </div>
       @endforeach
    </div>

    <!-- Right Section -->
<div class="right">
  <div class="checkout-title">Checkout</div>

@php
    $subtotal = $cartItems->sum(function($item) {
        return $item->product->price * $item->quantity;
    });

    $tax = $subtotal * 0.03; // Example 3% tax
    $total = $subtotal + $tax;

    $savings = $cartItems->sum(function($item) {
        return ($item->product->original_price - $item->product->price) * $item->quantity;
    });
@endphp


  <div class="checkout-line">
    <span>Subtotal ({{ $cartItems->sum('quantity') }} items)</span>
    <span>${{ number_format($subtotal, 2) }}</span>
  </div>
  <div class="checkout-line">
    <span>Tax</span>
    <span>${{ number_format($tax, 2) }}</span>
  </div>
  <div class="checkout-line checkout-total">
    <span>Total</span>
    <span>${{ number_format($total, 2) }}</span>
  </div>

  <button class="checkout-button">Proceed to Payment</button>

  <div class="saving-box">
    Your total saving amount<br>on this order <strong>${{ number_format($savings, 2) }}</strong>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="addressModalLabel">User Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Body -->
        <div class="modal-body">
          <form method="POST" action="{{ route('shipping.store') }}">
            @csrf
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Country</label>
                <select name="country" class="form-select">
                  <option value="USA">USA</option>
                  <option value="India">India</option>
                  <!-- Add more countries -->
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Full Address</label>
              <textarea name="address" class="form-control" rows="2" required></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Phone</label>
              <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save Address</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            
          </form>
        </div>
        <!-- Footer -->
        
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
@endsection