@extends('frontend.layout')
@section('headerfooter')


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Responsive Ecommerce </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<style>
    .product-img-container {
        width: 100%;
        overflow: hidden;
        position: relative;
    }

    .product-img {
        width: 100%;
        transition: transform 0.3s ease;
    }

   

    .product-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
    }

    .product-rating span {
        color: #555;
        font-size: 0.9rem;
    }

    .product-stock {
        color: green;
        font-weight: 600;
    }

    .bogo-btn,
    .size-btn {
        padding: 5px 10px;
        border: 1px dashed #6c63ff;
        background: none;
        color: #000;
        cursor: pointer;
    }

    .price {
        font-size: 1.75rem;
        font-weight: bold;
    }

    .btn-purple {
        background-color: #5C4730 !important;
        color: white !important;
    }

    .btn-purple:hover {
        background-color:rgb(249, 240, 195);
        color: white;
    }

    .qty-box .input-group button {
        min-width: 40px;
    }

    .product-purchase {
        border-top: 1px solid #eee;
        position: sticky;
        
    }

    .secure-text {
        font-size: 0.85rem;
    }

    @media (max-width: 768px) {
        .sticky-top {
            position: static !important;
        }
        .product-title{
            padding-top: 20px;
        }
    }

    .product-img-container {
        width: 100%;
        overflow: hidden;
        /* border: 1px solid #ddd; */
    }

    .product-img {
        width: 100%;
        transition: transform 0.3s ease;
    }

   

    .thumb-img {
        width: 65px;
        height: 65px;
        object-fit: cover;
        cursor: pointer;
        border-radius: 4px;
        transition: 0.2s;
        border: 1px groove #C4BBA3 !important;

    }

    .thumb-img:hover {
        border: 2px solid #4b0082;
        transform: scale(1.05);
    }

    .product-img-container {
        width: 100%;
        max-width: 400px;
        position: relative;
        overflow: hidden;
        border: 1px solid #ddd;
    }

    .product-img {
        width: 100%;
        display: block;
    }

    .zoom-box {
        position: absolute;
        top: 0;
        left: 0;
        width: 200px;
        height: 200px;
        pointer-events: none;
        background-repeat: no-repeat;
        border: 2px solid #ccc;
        display: none;
        z-index: 10;
    }
    .toast-success {
        background-color: #5C4730 !important; 
        color: #fff !important;
    }
</style>

<body>

    <section>
        <div class="mx-5 my-4">
            <div class="row">
                <!-- Left: Product Image -->
                <div class="col-md-3">
                    <!-- Main Image Preview -->
                    <div class="product-img-container mb-3 position-relative" onmousemove="zoom(event)" onmouseleave="resetZoom()">
                        <img id="mainImage" src="{{ asset($images[0]) }}" alt="Product" class="product-img" />
                        <div class="zoom-box" id="zoomBox"></div>
                    </div>

                    <!-- Thumbnail Images -->
                    <div class="justify-content-center thumbnail-row d-flex gap-2 flex-wrap">
    @foreach($images as $image)
        <img src="{{ asset($image) }}" class="thumb-img border" onclick="changeImage(this)">
    @endforeach
</div>

                </div>

                <!-- Right: Product Details -->
                <div class="col-md-6">
                    <h2 class="product-title">{{ $product->title }}</h2>
                    <p class="product-rating">⭐⭐⭐⭐⭐ <span>1 Reviews</span></p>
                    <p class="product-stock">In Stock</p>

                    <div class="product-details">
                        <p><strong>Bundle deal:</strong> <button class="bogo-btn">BOGO</button></p>
                        <p><strong>Brand:</strong> Apple</p>
                        <p><strong>Size:</strong> <button class="size-btn">{{ $product->size }}</button></p>
                        <p><strong>Refund & warranty:</strong><br />Refundable<br />Change of mind is not applicable</p>
                        <p><strong>Authenticity:</strong> 100% authentic</p>
                    </div>

                    <ul class="product-features">
                        <li><strong>Is Discontinued:</strong> No</li>
                        <li><strong>Product Dimensions:</strong> 3 x 3 x 3 inches; 1.76 Ounces</li>
                    </ul>


                </div>
                <div class="col-md-3">
                    <!-- Price & Buttons -->
                    <div class="product-purchase mt-4 pt-3" style="background: #fff;">
                        <h3 class="price">
                            <span class="" style="color:rgb(201, 155, 29);">${{ $product->price }}</span> <del class="text-muted">$150</del>
                        </h3>
                        <p class="shipping-fee">+ $10 Shipping Fee</p>

                        <div class="qty-box my-2">
                            <label>Quantity:</label>
                            <div class="input-group w-50">
                                <button class="btn btn-outline-secondary">-</button>
                                <input type="text" class="form-control text-center" id="quantity" value="1">
                                <button class="btn btn-outline-secondary">+</button>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-purple" id="addToCartBtn">Add to cart</button>
                            <button class="btn btn-light border">Buy now</button>
                            <button class="btn btn-light border">Add to wishlist</button>
                        </div>

                        <div class="secure-text mt-3 text-muted">
                            <i class="bi bi-lock-fill"></i> Secure transaction
                        </div>
                    </div>


                </div>
            </div>

            <input type="hidden" id="product_id" value="{{ $product->id }}">
            <input type="hidden" id="size" value="{{ $product->size }}"> 

        </div>

    </section>


    <section>
        <!-- Reviews & Ratings Section -->
        <div class="row mx-5 mt-5 border-top pt-4">
            <!-- Ratings Breakdown -->
            <div class="col-md-3">
                <h5><strong>Customer reviews</strong></h5>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning fs-5 me-2">★★★★★</span>
                    <span class="fs-5">4.67 out of 5</span>
                </div>
                <p class="mb-4 text-muted">3 people reviewed this product</p>

                <!-- Rating Bars -->
                <div class="mb-2 d-flex align-items-center">
                    <span class="me-2" style="width: 50px;">5 star</span>
                    <div class="progress w-50 me-2" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: 66%"></div>
                    </div>
                    <small>66% (2)</small>
                </div>
                <div class="mb-2 d-flex align-items-center">
                    <span class="me-2" style="width: 50px;">4 star</span>
                    <div class="progress w-50 me-2" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: 33%"></div>
                    </div>
                    <small>33% (1)</small>
                </div>
                <div class="mb-2 d-flex align-items-center">
                    <span class="me-2" style="width: 50px;">3 star</span>
                    <div class="progress w-50 me-2 bg-light" style="height: 10px;"></div>
                    <small>0% (0)</small>
                </div>
                <div class="mb-2 d-flex align-items-center">
                    <span class="me-2" style="width: 50px;">2 star</span>
                    <div class="progress w-50 me-2 bg-light" style="height: 10px;"></div>
                    <small>0% (0)</small>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <span class="me-2" style="width: 50px;">1 star</span>
                    <div class="progress w-50 me-2 bg-light" style="height: 10px;"></div>
                    <small>0% (0)</small>
                </div>


            </div>
            <div class="col-md-6">
                <!-- Individual Reviews -->
                <div class="mb-4 d-flex">
                    <img width="32px" height="32px" src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" width="40" class="me-3" alt="User icon">
                    <div>
                        <strong>John Doe</strong>
                        <div class="text-warning mb-1">★★★★★</div>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                        <small class="text-muted">03:04 am, 10 Jun, 23</small>
                    </div>
                </div>
                <div class="mb-4 d-flex">
                    <img width="32px" height="32px" src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" width="40" class="me-3" alt="User icon">
                    <div>
                        <strong>John Doe</strong>
                        <div class="text-warning mb-1">★★★★★</div>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                        <small class="text-muted">03:04 am, 10 Jun, 23</small>
                    </div>
                </div>
                <div class="mb-4 d-flex">
                    <img width="32px" height="32px" src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" width="40" class="me-3" alt="User icon">
                    <div>
                        <strong>John Doe</strong>
                        <div class="text-warning mb-1">★★★★☆</div>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                        <small class="text-muted">03:04 am, 10 Jun, 23</small>
                    </div>
                </div>
            </div>

            <!-- Side Ad or Image -->
            <div class="col-md-3">
                <img src="https://cdn.ishop.cholobangla.com/uploads/banner-7.webp" class="img-fluid" alt="Ad Banner">
            </div>
        </div>
    </section>

    <section id="trending" class="">
        <div class="div1">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold">Recommended for you</h5>
                <a href="#" class="text-decoration-underline text-dark">Show all</a>
            </div>

            <div class="position-relative">
                <!-- Left button -->
                <button class="carousel-btn left-btn" onclick="scrollCarousel2(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- Product slider -->
                <div class="featured-carousel featured-carousel2 d-flex overflow-auto">
                    <!-- Repeat this block for each product -->
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-32-1.webp" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                        <h6 class="mt-2 mb-1 text-truncate">Sunglasses for Women</h6>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <del class="text-muted me-1">$100</del>
                            <span class="fw-bold">$93</span>
                            <span class="discount-badge">-7%</span>
                        </div>
                    </div>

                    <!-- Copy & modify above block for more products -->
                </div>

                <!-- Right button -->
                <button class="carousel-btn right-btn" onclick="scrollCarousel2(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const decrement = document.querySelector(".qty-box .btn-outline-secondary:first-child");
        const increment = document.querySelector(".qty-box .btn-outline-secondary:last-child");
        const input = document.querySelector(".qty-box input");

        decrement.addEventListener("click", () => {
            let value = parseInt(input.value);
            if (value > 1) input.value = value - 1;
        });

        increment.addEventListener("click", () => {
            let value = parseInt(input.value);
            input.value = value + 1;
        });
    });
</script>

<script>
    function changeImage(el) {
        document.getElementById("mainImage").src = el.src;
    }
</script>

<script>
  const zoomBox = document.getElementById('zoomBox');
  const mainImage = document.getElementById('mainImage');

  function zoom(e) {
    const rect = mainImage.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const xPercent = (x / rect.width) * 100;
    const yPercent = (y / rect.height) * 100;

    zoomBox.style.display = 'block';
    zoomBox.style.left = `${x - 100}px`;
    zoomBox.style.top = `${y - 100}px`;
    zoomBox.style.backgroundImage = `url(${mainImage.src})`;
    zoomBox.style.backgroundSize = `${rect.width * 2}px ${rect.height * 2}px`;
    zoomBox.style.backgroundPosition = `${xPercent}% ${yPercent}%`;
  }

  function resetZoom() {
    zoomBox.style.display = 'none';
  }
</script>
<script>
        function scrollCarousel(direction) {
            const container = document.querySelector('.featured-carousel');
            const scrollAmount = 200;
            container.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }

        function scrollCarousel2(direction) {
            const container2 = document.querySelector('.featured-carousel2');
            const scrollAmount = 200;
            container2.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>

    <script>
        $('#addToCartBtn').click(function () {
            let $btn = $(this);
            $btn.prop('disabled', true);

            let product_id = $('#product_id').val();
            let size = $('#size').val();
            let quantity = $('#quantity').val();
   
            $.ajax({
                url: '/add-to-cart',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: product_id,
                    size: size,
                    quantity: quantity
                },
                success: function (response) {
                    toastr.success(response.message);
                    $('#cart-count').text(response.count); 
                },
                error: function (xhr) {
                    if (xhr.status === 401) {
                        toastr.error('Please log in to add items to your cart.');
                        window.location.href = '/login';
                    } else {
                        toastr.error('Something went wrong.');
                    }
                },
                complete: function () {
                    $btn.prop('disabled', false); 
                }
            });
        });

    </script>

    </body>

@endsection