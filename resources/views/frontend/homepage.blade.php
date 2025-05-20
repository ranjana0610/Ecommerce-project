@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>melanin</title>
     <link rel="icon" type="image/x-icon" href="logo.png">
   

</head>

<body data-bs-spy="scroll" data-bs-target="#sideMenu" data-bs-offset="50" tabindex="0">
    


    <section class="px-5 style-carousel-section container-fluid py-4">
        <div class="row g-3">
            <!-- Left Carousel -->
            <div class="col-lg-9">
                <div id="styleCarousel" class="carousel slide style-carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/footer-1744188982-2.jpg" class="d-block w-100" alt="Style Image 1">

                        </div>
                        <div class="carousel-item">
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/footer-1744188982-2.jpg" class="d-block w-100" alt="Style Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/footer-1744188982-2.jpg" class="d-block w-100" alt="Style Image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#styleCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#styleCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <!-- Right Static Banners -->
            <div class="col-lg-3 d-flex flex-column justify-content-between gap-3">
                <div class="banner-card position-relative overflow-hidden">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/footer-1744189309-1.jpg" class="img-fluid w-100" alt="New Arrival">
                    <div class="position-absolute top-0 start-0 w-100 h-100 banner-overlay text-white p-3 d-flex flex-column justify-content-between">
                        <div class="text-end">
                            <span class="badge bg-light text-dark">50% OFF</span>
                        </div>
                        <div>
                            <h5 class="fw-bold">NEW ARRIVAL</h5>
                            <p class="small">LIMITED EDITION</p>
                            <!-- <a href="#" class="btn btn-primary btn-sm">SHOP NOW</a> -->
                        </div>
                    </div>
                </div>
                <div class="banner-card position-relative overflow-hidden">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/footer-1744189327-4.jpg" class="img-fluid w-100" alt="Best Seller">
                    <div class="position-absolute top-0 start-0 w-100 h-100 banner-overlay text-white p-3 d-flex flex-column justify-content-between">
                        <h6 class="fw-bold">OUR BEST SELLER</h6>
                        <p class="small">( LEATHER BAG )</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Icons Section -->
    <section id="info-section" class="px-5 info-icons container-fluid py-4">
        <div class="row row-cols-2 row-cols-md-4 g-3 text-center">
            <div class="col">
                <div class="p-3 bg-white rounded shadow-sm">
                    <i class="fas fa-shipping-fast fa-2x text-warning mb-2"></i>
                    <h6 class="fw-bold mb-1">Rapid shipping</h6>
                    <p class="text-muted small mb-0">With a short period of time</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3 bg-white rounded shadow-sm">
                    <i class="fas fa-credit-card fa-2x text-primary mb-2"></i>
                    <h6 class="fw-bold mb-1">Secure transaction</h6>
                    <p class="text-muted small mb-0">Checkout securely</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3 bg-white rounded shadow-sm">
                    <i class="fas fa-headset fa-2x text-info mb-2"></i>
                    <h6 class="fw-bold mb-1">24/7 support</h6>
                    <p class="text-muted small mb-0">Ready to pickup calls</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3 bg-white rounded shadow-sm">
                    <i class="fas fa-gifts fa-2x text-success mb-2"></i>
                    <h6 class="fw-bold mb-1">Bundle offer</h6>
                    <p class="text-muted small mb-0">On many products</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Promo Banners Section -->
    <section class=" px-5 promo-banners container-fluid py-4">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="promo-card rounded overflow-hidden shadow-sm">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/banner-1744189445-7.jpg" class="img-fluid w-100" alt="Promo 1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="promo-card rounded overflow-hidden shadow-sm">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/banner-1744189416-8.jpg" class="img-fluid w-100" alt="Promo 2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="promo-card rounded overflow-hidden shadow-sm">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/banner-1744189393-9.jpg" class="img-fluid w-100" alt="Promo 3">
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Products Section -->
    <section id="feature" class="px-5 py-2">
        <div class="div1">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold">Featured products</h5>
                <a href="#" class="text-decoration-underline text-dark">Show all</a>
            </div>

            <div class="position-relative">
                <!-- Left button -->
                <button class="carousel-btn left-btn" onclick="scrollCarousel(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
<style>
    a{
        text-decoration: none;
        color: black;
    }
</style>
                <!-- Product slider -->
                <div class="featured-carousel d-flex overflow-auto">
                    <!-- Repeat this block for each product -->
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                <button class="carousel-btn right-btn" onclick="scrollCarousel(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
    <section id="trending" class="px-5 py-2">
        <div class="div1">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold">Trending Products</h5>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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
                            <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190896-4.jpg" class="img-fluid rounded" alt="Product">
                            <!-- Optional Badge -->
                        </div>
                          <a href="{{url('product/details')}}"><h6 class="mt-2 mb-1 text-truncate">Boots for women</h6></a>
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


    <div class="mx-5 py-4 px-1 my-5 rounded bg-light">
        <div class="d-flex justify-content-between align-items-center mb-3 px-3">
            <h5 class="fw-bold">Featured Categories
            <div style="display: inline ;padding-left: 20px;">
                
                <button class="nav-btn" onclick="scrollCategory(-1)">&#8592;</button>
                <button class="nav-btn" onclick="scrollCategory(1)">&#8594;</button>
            </div>
            </h5>
            
            <a href="#" class="text-decoration-underline fw-medium small text-dark">Show all</a>
        </div>

        <div class="d-flex align-items-center gap-2 mb-3 px-3">

            <!-- <div class="d-flex overflow-auto gap-3 flex-nowrap" id="categoryWrapper" style="scroll-behavior: smooth;"> -->
            <div class="d-flex overflow-auto gap-3 flex-nowrap" id="categoryWrapper" style="scroll-behavior: smooth;">

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <div class="category-item text-center">
                    <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-category-1744193892-6.jpg" class="img-fluid rounded mb-2" alt="Tops" />
                    <div class="fw-semibold small">Tops</div>
                </div>

                <!-- Add more items as needed -->
            </div>

        </div>
    </div>

    <script>
        function scrollCategory(direction) {
            const container = document.getElementById("categoryWrapper");
            const scrollAmount = 120; // adjust based on card width
            container.scrollLeft += direction * scrollAmount;
        }
    </script>


    <div id="feature-brands" class="mx-5 p-1 bg-light rounded">
        <div class="d-flex justify-content-between align-items-center mb-3 px-3 pt-2">
            <h5 class="fw-bold">Featured Brands</h5>
            <div style="position: absolute;left: 500px;">
                <button class="brand-nav-btn" onclick="changeBrandSlide(-1)">&#8592;</button>
                <button class="brand-nav-btn" onclick="changeBrandSlide(1)">&#8594;</button>

            </div>
            <a href="#" class="text-decoration-underline small fw-medium text-dark">Show all</a>

        </div>

        <div class="row">
            <!-- Left: Brands -->
            <div class="col-md-5 px-4">
                <div class="d-flex align-items-center mb-3 gap-2">

                    <div id="brandSlideWrapper" class="w-100">
                        <!-- Brand slides go here -->
                    </div>


                </div>
            </div>

            <!-- Right: Image -->
            <div class="col-md-7">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/banner-1744188850-2.jpg" alt="Featured Display" class="img-fluid rounded shadow-sm" />
            </div>
        </div>
    </div>



    <script>
        const brands = [{
                name: "Addidas",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Rolex",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Gucci",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "H&M",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Apple",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Schnell",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Nike",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Zara",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Puma",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Levi's",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Samsung",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            },
            {
                name: "Sony",
                img: "https://ishopp.ondocosmeticcoltd.com/uploads/thumb-brand-1744193220-8.jpg"
            }
        ];

        let currentBrandSlide = 0;

        function renderBrands() {
            const wrapper = document.getElementById("brandSlideWrapper");
            wrapper.innerHTML = "";

            const visibleBrands = brands.slice(currentBrandSlide * 6, currentBrandSlide * 6 + 6);

            const rows = [
                [],
                []
            ];
            visibleBrands.forEach((brand, idx) => {
                rows[idx < 3 ? 0 : 1].push(`
        <div class="col-4">
          <div class="brand-card">
            <img src="${brand.img}" alt="${brand.name}">
            <div class="fw-semibold small">${brand.name}</div>
          </div>
        </div>
      `);
            });

            wrapper.innerHTML = `
      <div class="row">${rows[0].join('')}</div>
      <div class="row">${rows[1].join('')}</div>
    `;
        }

        function changeBrandSlide(direction) {
            const maxSlides = Math.ceil(brands.length / 6) - 1;
            currentBrandSlide += direction;
            if (currentBrandSlide < 0) currentBrandSlide = 0;
            if (currentBrandSlide > maxSlides) currentBrandSlide = maxSlides;
            renderBrands();
        }

        renderBrands();
    </script>





    <div id="top-selling" class="mx-5  my-3 bg-light p-3 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
            <h5 class="fw-bold mb-0">Top selling products</h5>
            <a href="#" class="text-decoration-underline small fw-medium text-dark">Show all</a>
        </div>

        <div id="top-selling" class="row g-3">
            <!-- Product Card -->
            <div class="col-md-4 d-flex gap-2" style="align-items: center;">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190626-5.jpg" alt="Product" class="" width="80" height="80" style="object-fit: cover;">
                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">charcoal-jeans</div>
                    <div>
                        <span class="text-muted text-decoration-line-through">$100</span>
                        <span class="fw-bold mx-1">$95</span>
                        <span class="badge bg-light text-dark small">-5%</span>
                        <i class="bi bi-arrow-clockwise ms-1 text-muted"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2" style="align-items: center;">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190626-5.jpg" alt="Product" class="" width="80" height="80" style="object-fit: cover;">
                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">charcoal-jeans</div>
                    <div>
                        <span class="text-muted text-decoration-line-through">$100</span>
                        <span class="fw-bold mx-1">$95</span>
                        <span class="badge bg-light text-dark small">-5%</span>
                        <i class="bi bi-arrow-clockwise ms-1 text-muted"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2" style="align-items: center;">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190626-5.jpg" alt="Product" class="" width="80" height="80" style="object-fit: cover;">
                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">charcoal-jeans</div>
                    <div>
                        <span class="text-muted text-decoration-line-through">$100</span>
                        <span class="fw-bold mx-1">$95</span>
                        <span class="badge bg-light text-dark small">-5%</span>
                        <i class="bi bi-arrow-clockwise ms-1 text-muted"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2" style="align-items: center;">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190626-5.jpg" alt="Product" class="" width="80" height="80" style="object-fit: cover;">
                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">charcoal-jeans</div>
                    <div>
                        <span class="text-muted text-decoration-line-through">$100</span>
                        <span class="fw-bold mx-1">$95</span>
                        <span class="badge bg-light text-dark small">-5%</span>
                        <i class="bi bi-arrow-clockwise ms-1 text-muted"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2" style="align-items: center;">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190626-5.jpg" alt="Product" class="" width="80" height="80" style="object-fit: cover;">
                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">charcoal-jeans</div>
                    <div>
                        <span class="text-muted text-decoration-line-through">$100</span>
                        <span class="fw-bold mx-1">$95</span>
                        <span class="badge bg-light text-dark small">-5%</span>
                        <i class="bi bi-arrow-clockwise ms-1 text-muted"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2" style="align-items: center;">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190626-5.jpg" alt="Product" class="" width="80" height="80" style="object-fit: cover;">
                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">charcoal-jeans</div>
                    <div>
                        <span class="text-muted text-decoration-line-through">$100</span>
                        <span class="fw-bold mx-1">$95</span>
                        <span class="badge bg-light text-dark small">-5%</span>
                        <i class="bi bi-arrow-clockwise ms-1 text-muted"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2" style="align-items: center;">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190626-5.jpg" alt="Product" class="" width="80" height="80" style="object-fit: cover;">
                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">charcoal-jeans</div>
                    <div>
                        <span class="text-muted text-decoration-line-through">$100</span>
                        <span class="fw-bold mx-1">$95</span>
                        <span class="badge bg-light text-dark small">-5%</span>
                        <i class="bi bi-arrow-clockwise ms-1 text-muted"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2" style="align-items: center;">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190626-5.jpg" alt="Product" class="" width="80" height="80" style="object-fit: cover;">
                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">charcoal-jeans</div>
                    <div>
                        <span class="text-muted text-decoration-line-through">$100</span>
                        <span class="fw-bold mx-1">$95</span>
                        <span class="badge bg-light text-dark small">-5%</span>
                        <i class="bi bi-arrow-clockwise ms-1 text-muted"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2" style="align-items: center;">
                <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744190626-5.jpg" alt="Product" class="" width="80" height="80" style="object-fit: cover;">
                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">charcoal-jeans</div>
                    <div>
                        <span class="text-muted text-decoration-line-through">$100</span>
                        <span class="fw-bold mx-1">$95</span>
                        <span class="badge bg-light text-dark small">-5%</span>
                        <i class="bi bi-arrow-clockwise ms-1 text-muted"></i>
                    </div>
                </div>
            </div>



            <!-- Continue for other 7 products similarly -->
        </div>
    </div>

    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <section>
        <div class="px-5 py-4 text-center">
            <img style="border-radius: 12px;" width="100%" src="https://ishopp.ondocosmeticcoltd.com/uploads/banner-1744189502-1.jpg" alt="">
        </div>
    </section>

    <div class="px-5 my-4">
        <div class="bg-light p-3 rounded">
            <h5 class="mb-3 fw-bold">Daily discover</h5>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-3">

                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->
                <!-- Card Start -->
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/thumb-product-1744192073-8.jpg" class="card-img-top" alt="Product">
                        <div class="card-body p-2 ">
                             <a href="{{url('product/details')}}"> <h6 class="card-title small fw-semibold">Anna by Anuschka Satchel Handbag | Genuine…</h6></a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <small class="text-decoration-line-through text-muted me-2">$170</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">$104</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-39%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card End -->


            </div>

        </div>
    </div>

    <div class="px-5 my-4 text-center">
        <button class="show-more-btn">Show more</button>
    </div>


    <section>
        <div class="px-5 py-4 text-center">
            <img style="border-radius: 12px;" width="100%" src="https://ishopp.ondocosmeticcoltd.com/uploads/banner-1744189530-5.jpg" alt="">
        </div>
    </section>




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

</body>

</html>
@endsection