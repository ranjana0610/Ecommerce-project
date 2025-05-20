@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Responsive Ecommerce </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>


<body>




    <div class="container-fluid rounded">
        <div class="d-flex justify-content-between align-items-center px-3 py-2 bg-light border mb-3 ">
            <div id="showing">
                <span>Showing 1 to 30 of 53 results for <strong>"Discover"</strong></span>
            </div>
            <div class="d-flex align-items-center">
                <label for="sortSelect" class="me-2 mb-0">Sort by</label>
                <select id="sortSelect" class="form-select" style="width: 130px;">
                    <option selected>Featured</option>
                    <option value="1">Price: Low to High</option>
                    <option value="2">Price: High to Low</option>
                    <option value="3">Newest</option>
                </select>
            </div>
        </div>

        <div class="row mb-5">

            <!-- Left Panel -->
            <div class="col-md-2 filter-panel px-3">
                <h5 class="mb-3">Categories</h5>
                <ul class="list-unstyled mb-4">
                    <li><a href="#">Men's Wear</a></li>
                    <li><a href="#">Women Apparel</a></li>
                    <li><a href="#">Beauty & Personal Care</a></li>
                    <li><a href="#">Jewellery & Accessories</a></li>
                    <li><a href="#">Women's Bags</a></li>
                    <li><a href="#">Travel & Luggage</a></li>
                    <li><a href="#">Men's Shoes</a></li>
                    <li><a href="#">Home Appliances</a></li>
                    <li><a href="#">Home & Living</a></li>
                    <li><a href="#">Men's Bags</a></li>
                    <li><a href="#">Toys, Kids & Babies</a></li>
                    <li><a href="#">Food & Beverages</a></li>
                </ul>

                <h5 class="mb-3">Price</h5>
                <div class="d-flex mb-3">
                    <input type="text" class="form-control me-2" placeholder="$ Min">
                    <input type="text" class="form-control me-2" placeholder="$ Max">
                    <button class="btn btn-outline-secondary">Go</button>
                </div>

                <h5 class="mb-2">Customer reviews</h5>
                <p class="text-muted">Clear</p>
                <div class="mb-2 star-rating">★★★★★ <span class="text-muted">& up</span></div>
                <div class="mb-2 star-rating">★★★★☆ <span class="text-muted">& up</span></div>
                <div class="mb-2 star-rating">★★★☆☆ <span class="text-muted">& up</span></div>
                <div class="mb-4 star-rating">★★☆☆☆ <span class="text-muted">& up</span></div>

                <h5 class="mb-2">Brands</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="brand1">
                    <label class="form-check-label" for="brand1">Levi's</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="brand2">
                    <label class="form-check-label" for="brand2">Addidas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="brand3">
                    <label class="form-check-label" for="brand3">H&M</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="brand4">
                    <label class="form-check-label" for="brand4">Rolex</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="brand5">
                    <label class="form-check-label" for="brand5">Apple</label>
                </div>
                <a href="#" class="d-block mt-2 text-dark">Show all</a>

                <!-- 🔽 New Section: Collections -->
                <h5 class="mt-4">Collections</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="collection1">
                    <label class="form-check-label" for="collection1">Featured products</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="collection2">
                    <label class="form-check-label" for="collection2">Trending products</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="collection3">
                    <label class="form-check-label" for="collection3">Top selling products</label>
                </div>

                <!-- 🔽 New Section: Shipping Options -->
                <h5 class="mb-2">Shipping Options</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="shipping1">
                    <label class="form-check-label" for="shipping1">Default</label>
                </div>
            </div>


            <!-- Product Cards -->
            <div class="col-md-10">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 py-3">
                    @foreach($products as $product)
                        <!-- Card 1 -->
                        <div class="col">
                            <div class="card h-100 border-0">
                                @php
                          $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                          $firstImage = is_array($images) && count($images) > 0 ? $images[0] : null;
                      @endphp


                      @if($firstImage)
                          <img src="{{ asset($firstImage) }}" class="card-img-top" alt="Product">
                      @else
                          <span>No Image</span>
                      @endif
                                <div class="card-body p-2">
                                <a href="{{ url('product/details', ['id' => $product->id]) }}"> <h6 class="card-title">
                                        {{ $product->title }}
                                    </h6></a>
                                    <div class="d-flex align-items-center mb-1 star-rating">
                                        <span>★★★★★</span>
                                        <span class="ms-1 text-dark ">1 Reviews</span>
                                    </div>
                                    <div class="card-price">
                                        <del>$500</del> <strong>{{ $product->price }}</strong> <span class="badge  text-dark">-32%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</body>
</html>
@endsection