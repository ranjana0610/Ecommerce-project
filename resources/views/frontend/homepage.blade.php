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



    @php
    $carouselImages = [
    $homepage->image_1,
    $homepage->image_2,
    $homepage->image_3,
    ];

    $bannerImages = [
    [
    'img' => $homepage->image_4,
    'title' => $homepage->title,
    'desc' => $homepage->description,
    ],
    [
    'img' => $homepage->image_5,
    'title' => $homepage->title,
    'desc' => $homepage->description, ],
    ];
    @endphp


    <section class="px-5 style-carousel-section container-fluid py-4">
        <div class="row g-3">
            <!-- Left Carousel (image_1 to image_3) -->
            <div class="col-lg-9">
                <div id="styleCarousel" class="carousel slide style-carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($carouselImages as $index => $img)
                        @if($img)
                        <div class="carousel-item @if($index === 0) active @endif">
                            <img src="{{ asset($img) }}" class="d-block w-100" alt="Style Image {{ $index + 1 }}">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#styleCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#styleCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <!-- Right Static Banners (image_4 & image_5) -->
            <div class="col-lg-3 d-flex flex-column justify-content-between gap-3">
                @foreach($bannerImages as $index => $banner)
                @if($banner['img'])
                <div class="banner-card position-relative overflow-hidden">
                    <img src="{{ asset($banner['img']) }}" class="img-fluid w-100" alt="Banner Image {{ $index + 4 }}">
                    <div class="position-absolute top-0 start-0 w-100 h-100 banner-overlay text-white p-3 d-flex flex-column justify-content-between">
                        <div class="text-end">
                            <span class="badge bg-light text-dark">50% OFF</span>
                        </div>
                        <div>
                            <h5 class="fw-bold">{{ $banner['title'] ?? 'Default Title' }}</h5>
                            <p class="small">{{ $banner['desc'] ?? 'Default Description' }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
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

                <!-- Product slider -->
                <div class="featured-carousel d-flex overflow-auto">
                    @foreach($featuredProducts as $product)
                    @php
                    $images = json_decode($product->images, true); // Decode JSON string to array
                    $firstImage = isset($images[0]) ? asset($images[0]) : asset('default.jpg'); // Fallback if no image
                    @endphp
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="{{ $firstImage }}" class="img-fluid rounded" alt="{{ $product->name }}">
                        </div>
                        <a href="{{ url('product/details/'.$product->id) }}">
                            <h6 class="mt-2 mb-1 text-truncate">{{ $product->title }}</h6>
                        </a>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <div>
                                <span class="fw-bold">${{ number_format($product->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                    @foreach ($trendingProducts as $product)
                    @php
                    $images = json_decode($product->images, true); // Decode JSON string to array
                    $firstImage = isset($images[0]) ? asset($images[0]) : asset('default.jpg'); // Fallback if no image
                    @endphp
                    <div class="product-card flex-shrink-0 me-3">
                        <div class="position-relative">
                            <img src="{{ $firstImage }}" class="img-fluid rounded" alt="{{ $product->name }}">
                        </div>
                        <a href="{{ url('product/details', $product->id) }}">
                            <h6 class="mt-2 mb-1 text-truncate">{{ $product->title }}</h6>
                        </a>
                        <div class="text-warning small">
                            ★★★★☆ <span class="text-muted">2 Reviews</span>
                        </div>
                        <div>
                            <span class="fw-bold">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                    @endforeach
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
                @foreach($allcategories as $category)
                    <div class="category-item text-center">
                        <img src="{{ asset('backend/categories/' . $category->image) }}" class="img-fluid rounded mb-2" alt="{{ $category->title }}">
                        <div class="fw-semibold small">{{ $category->title }}</div>
                    </div>
                @endforeach
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

        <div class="row g-3">
            @foreach($topsellingProducts as $product)
            <div class="col-md-4 d-flex gap-2 align-items-center">
                @php
                $images = json_decode($product->images, true);
                @endphp

                @if (!empty($images) && isset($images[0]))
                <img src="{{ asset($images[0]) }}" alt="{{ $product->title }}" width="80" height="80" style="object-fit: cover;">
                @else
                <img src="{{ asset('default.jpg') }}" alt="No image" width="80" height="80" style="object-fit: cover;">
                @endif

                <div>
                    <div class="fw-semibold text-truncate" style="max-width: 200px;">{{ $product->title }}</div>
                    <div>
                        <span class="fw-bold mx-1">${{ number_format($product->price, 2) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
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
        <h5 class="mb-3 fw-bold">Daily Discover</h5>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-3">
            @foreach($allProducts as $product)
                @php
                    $images = json_decode($product->images, true);
                @endphp
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="{{ asset($images[0] ?? 'default.jpg') }}" class="card-img-top" alt="{{ $product->title }}" style="height: 150px; object-fit: cover;">
                        <div class="card-body p-2">
                            <a href="{{ url('product/details', $product->id) }}">
                                <h6 class="card-title small fw-semibold">{{ Str::limit($product->title, 40) }}</h6>
                            </a>
                            <div class="text-warning small">
                                ★★★★☆ <span class="text-muted fw-bold">1 Reviews</span>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                {{-- Assuming price is the current price, and you want to show an old price and discount --}}
                                <small class="text-decoration-line-through text-muted me-2">${{ $product->price + 50 }}</small>
                                <h6 class="mb-0 me-2 text-dark fw-bold">${{ $product->price }}</h6>
                                <span class="badge bg-light text-dark border rounded-pill small">-{{ round(100 * 50 / ($product->price + 50)) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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