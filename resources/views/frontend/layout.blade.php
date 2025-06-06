@php
    use Illuminate\Support\Facades\Auth;
@endphp
@php
    $cartCount = 0;
    if(Auth::check()) {
        $cartCount = \App\Models\Cart::where('user_id', Auth::id())->count();
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/image/logo/logo.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
 <!-- Promo Image Banner with Close Button -->
 <div id="promoBanner" style="position: relative; width: 100%; overflow: hidden;">
        <img src="https://ishopp.ondocosmeticcoltd.com/uploads/banner-1744189153-2.jpg" alt="Promo Banner" style="width: 100%; display: block;">

        <!-- Close Button -->
        <button onclick="document.getElementById('promoBanner').style.display='none'"
            style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 24px; color: white; cursor: pointer;">
            &times;
        </button>
    </div>
    <!-- Top Info Bar -->
    <div class="container-fluid custom-navbar-top">
        <div class="mx-5 d-flex justify-content-between flex-wrap">
            <div>
                <span><i class="bi bi-envelope"></i> Mail info@Melaninstength.com</span> |
                <span><i class="bi bi-telephone"></i> Helpline 9729008578</span>
            </div>
            <div>
                <a href="#">BE A SELLER</a> |
                @auth
                <span><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</span> |
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                    <a href="{{url('login')}}"><i class="bi bi-arrow-clockwise"></i> LOGIN</a> |
                    <a href="{{url('register')}}"><i class="bi bi-person-plus"></i> REGISTER</a>
                @endauth        

            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <div class=" container-fluid custom-navbar-main" style="z-index:0;">
        <div class="mx-5 d-flex justify-content-between align-items-center">
            <!-- Toggle & Logo -->
            <div class="d-flex align-items-center gap-3">
                <button class="btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#sideMenu">
                    <i class="bi bi-list fs-3"></i>
                </button>
                <div class="custom-navbar-logo">
                    <a href="{{url('/')}}">
                    <img src="{{asset('assets/image/logo/logo.png')}}" alt="Logo" />
                    </a>
                </div>
            </div>

            <!-- Search -->
            <!-- Search -->
            <div class="input-group w-50 d-none d-lg-flex position-relative">
                <input type="text" id="search-input" class="form-control custom-navbar-search" placeholder="Search Here" autocomplete="off" />
                <button class="custom-navbar-search-btn"><i class="bi bi-search"></i></button>

                <!-- Results will appear here -->
                <div id="search-results" class="search-results-container">
                </div>
            </div>
            <style>
                #search-results {
                    border-radius: 9px;
                    background: #dbd8ca;
                    color: white;
                }

                /* Base search input */
                .custom-navbar-search {
                    border-radius: 8px 0 0 8px;
                    border: 1px solid #ced4da;
                    padding: 10px;
                    font-size: 16px;
                    width: 100%;
                }

                /* Search button */
                .custom-navbar-search-btn {
                    border-radius: 0 8px 8px 0;
                    border: 1px solid #ced4da;
                    background-color: #f8f9fa;
                    padding: 0 15px;
                    font-size: 18px;
                    cursor: pointer;
                    transition: background-color 0.2s ease;
                }

                .custom-navbar-search-btn:hover {
                    background-color: #e2e6ea;
                }

                /* Search results dropdown */
                #search-results {
                    position: absolute;
                    top: 100%;
                    left: 0;
                    z-index: 9999;
                    width: 100%;
                    border-radius: 9px;
                    background: #dbd8ca;
                    color: white;
                    border: 1px solid #dee2e6;
                    border-top: none;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    display: none;
                    max-height: calc(7 * 48px);
                    /* Assuming 48px per item */
                    overflow-y: auto;
                }

                /* Search item style */
                #search-results a {
                    padding: 12px 16px;
                    display: block;
                    color: #212529;
                    text-decoration: none;
                    font-size: 15px;
                    border-bottom: 1px solid #f1f1f1;
                    transition: background-color 0.2s ease;
                }

                #search-results a:last-child {
                    border-bottom: none;
                }

                #search-results a:hover {
                    background-color: #f8f9fa;
                    color: #007bff;
                }

                /* Scrollbar styling */
                #search-results::-webkit-scrollbar {
                    width: 6px;
                }

                #search-results::-webkit-scrollbar-thumb {
                    background-color: rgba(0, 0, 0, 0.2);
                    border-radius: 6px;
                }

                /* Responsive tweaks */
                @media (max-width: 768px) {
                    .input-group.w-50 {
                        width: 100% !important;
                    }

                    .custom-navbar-search,
                    .custom-navbar-search-btn {
                        font-size: 14px;
                        padding: 8px;
                    }

                    #search-results a {
                        font-size: 14px;
                        padding: 10px 14px;
                    }

                    #search-results {
                        max-height: 280px;
                        /* or keep the same as desktop if preferred */
                        border-radius: 9px;
                        background: #dbd8ca;
                        color: white;
                    }
                }
            </style>
            <!-- Account + Cart -->
            <div class="d-flex align-items-center gap-4 myaccount">
                <!-- My Account Dropdown -->
                <div class="dropdown">
                <a href="#" class="text-decoration-none text-dark fw-semibold dropdown-toggle" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::check() ? Auth::user()->name : 'My Account' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                    <li><a class="dropdown-item" href="#">Orders</a></li>
                    <li><a class="dropdown-item" href="#">Wishlist</a></li>
                </ul>
                </div>

                <a href="{{ url('cart') }}" class="text-decoration-none text-dark d-flex align-items-center">
                    <div class="custom-navbar-cart-icon">
                        <i class="bi bi-cart3 fs-5"></i>
                        <span class="badge rounded-pill" id="cart-count">{{ $cartCount }}</span>
                    </div>
                    <span class="ms-1">Cart</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Bottom Nav Links -->
    <div class="mx-5 py-2 custom-navbar-desktop">
        <div class="d-flex justify-content-between">
            <div class="custom-navbar-links">
                <a href="{{url('shop')}}">SHOP</a>
                <a href="{{url('categories')}}">CATEGORIES</a>
                <a href="{{url('empower')}}">EMPOWER</a>
                <a href="{{url('lead')}}">LEAD</a>
                <a href="{{url('csr')}}">CSR</a>
            </div>
            <div class="custom-navbar-links">
                <a href="#track">TRACK ORDER</a>
                <a href="#faq">FAQ</a>
                <a href="{{url('aboutus')}}">ABOUT US</a>
                <a href="{{url('contactus')}}">CONTACT US</a>
            </div>
        </div>
    </div>

    <!-- Offcanvas Sidebar Menu (Mobile) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <nav id="sideMenu" class="nav flex-column">
                <a class="nav-link" href="{{url('shop')}}">SHOP</a>
                <a class="nav-link" href="{{url('categories')}}">Categories</a>
                <a class="nav-link" href="{{url('empower')}}">EMPOWER</a>
                <a class="nav-link" href="{{url('lead')}}">LEAD</a>
                <a class="nav-link" href="{{url('csr')}}">CSR</a>
                <hr>
                <a class="nav-link" href="#track">Track Order</a>
                <a class="nav-link" href="#faq">FAQ</a>
                <a class="nav-link" href="{{url('aboutus')}}">ABOUT US</a>
                <a class="nav-link" href="{{url('contactus')}}">Contact Us</a>
            </nav>
        </div>
    </div>
    @yield('headerfooter')
      <!-- Newsletter Section -->
  <section class="ishop-newsletter-section py-3 bg-light-purple text-dark text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h2 class="ishop-newsletter-title mb-2">Subscribe to our Newsletter</h2>
                    <p class="ishop-newsletter-subtitle mb-4">Get our latest update in your email</p>

                </div>
                <div class="col-lg-7" style="align-content: center;">
                    <form class="ishop-newsletter-form d-flex justify-content-center">
                        <input type="email" class="form-control ishop-newsletter-input w-50  me-2" placeholder="Your email">
                        <button class="btn btn-custom">Subscribe</button>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer Main Navigation -->
    <footer class="ishop-footer bg-white py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gy-4">
                <!-- Column 1 -->
                <div class="ishop-footer-col">
                    <h5 class="ishop-footer-heading">Toys, Kids & Babies</h5>
                    <ul class="list-unstyled">
                        <li>Bath & Baby Care</li>
                        <li>Maternity Care</li>
                        <li>Kid's Furniture</li>
                    </ul>

                    <h5 class="ishop-footer-heading mt-4">Men's Bags</h5>
                    <ul class="list-unstyled">
                        <li>Totes</li>
                        <li>Briefcases</li>
                        <li>Suit Carriers</li>
                    </ul>

                    <h5 class="ishop-footer-heading mt-4">Food & Beverages</h5>
                    <ul class="list-unstyled">
                        <li>Snacks & Sweets</li>
                        <li>Meat & Seafood</li>
                    </ul>
                </div>

                <!-- Column 2 -->
                <div class="ishop-footer-col">
                    <h5 class="ishop-footer-heading">Men's Shoes</h5>
                    <ul class="list-unstyled">
                        <li>Formal Shoes</li>
                        <li>Sandals & Flip-Flops</li>
                        <li>Sneakers</li>
                    </ul>

                    <h5 class="ishop-footer-heading mt-4">Women Apparel</h5>
                    <ul class="list-unstyled">
                        <li>Tops</li>
                        <li>Dresses</li>
                        <li>Socks & Tights</li>
                        <li>Pants & Leggings</li>
                    </ul>

                    <h5 class="ishop-footer-heading mt-4">Travel & Luggage</h5>
                    <ul class="list-unstyled">
                        <li>Luggage</li>
                        <li>Travel Bags & Backpacks</li>
                        <li>Travel Accessories</li>
                    </ul>
                </div>

                <!-- Column 3 -->
                <div class="ishop-footer-col">
                    <h5 class="ishop-footer-heading">Home Appliances</h5>
                    <ul class="list-unstyled">
                        <li>Housekeeping</li>
                        <li>TV Accessories</li>
                        <li>Small Kitchen Appliances</li>
                    </ul>

                    <h5 class="ishop-footer-heading mt-4">Beauty & Personal Care</h5>
                    <ul class="list-unstyled">
                        <li>Women's Hair Care</li>
                        <li>Feminine Care</li>
                        <li>Skincare</li>
                    </ul>

                    <h5 class="ishop-footer-heading mt-4">Jewellery & Accessories</h5>
                    <ul class="list-unstyled">
                        <li>Hats & Caps</li>
                        <li>Key Chains</li>
                        <li>Eyewear</li>
                    </ul>
                </div>

                <!-- Column 4 -->
                <div class="ishop-footer-col">
                    <h5 class="ishop-footer-heading">Men's Wear</h5>
                    <ul class="list-unstyled">
                        <li>Pants</li>
                        <li>Crossbody & Shoulder Bags</li>
                        <li>Shirts</li>
                        <li>Jackets & Coats</li>
                        <li>Men's Wallet</li>
                        <li>Backpacks</li>
                    </ul>

                    <h5 class="ishop-footer-heading mt-4">Home & Living</h5>
                    <ul class="list-unstyled">
                        <li>Home Decor</li>
                        <li>Tools, DIY & Outdoors</li>
                        <li>Kitchen & Dining</li>
                    </ul>

                    <h5 class="ishop-footer-heading mt-4">Women's Bags</h5>
                    <ul class="list-unstyled">
                        <li>Sling Bags</li>
                        <li>Clutches & Mini Bags</li>
                        <li>Handbags</li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </footer>
<div style="text-align:center">
    <img src="{{asset('assets/image/logo/logo.png')}}" style="width: 10%;">

</div>
    <!-- Footer Bottom Section -->
    <div class="ishop-footer-bottom bg-light py-4">
        <div class="container">
            <div class="row  text-md-start">
                <div class="col-md-3 col-6">
                    <h6 class="ishop-footer-title">Services</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{url('aboutus')}}">About</a></li>
                        <li>Faq</li>
                        <li><a href="{{url('contactus')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-6">
                    <h6 class="ishop-footer-title">About</h6>
                    <ul class="list-unstyled">
                        <li>Refund Policy</li>
                        <li>Privacy Policy</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="col-md-3 col-6">
                    <h6 class="ishop-footer-title">Payment</h6>
                    <div class="ishop-payments d-flex gap-2">
                        <img width="70px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Stripe_Logo%2C_revised_2016.svg/2560px-Stripe_Logo%2C_revised_2016.svg.png" alt="">
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <h6 class="ishop-footer-title">Social</h6>
                    <ul class="list-unstyled">
                        <li><i class="fab fa-instagram"></i> Instagram</li>
                        <li><i class="fab fa-facebook"></i> Facebook</li>
                        <li><i class="fab fa-twitter"></i> Twitter</li>
                        <li><i class="fab fa-linkedin"></i> Linkedin</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center pt-2">© 2025 - All rights reserved by Melanin</div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                let query = $(this).val();
                console.log("Query:", query); // Debug

                if (query.length > 0) {
                    $.ajax({
                        url: "/live-search",
                        type: "GET",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            console.log("Response:", data); // Debug
                            $('#search-results').html(data).show();
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", error); // Debug
                        }
                    });
                } else {
                    $('#search-results').hide();
                }
            });
            // Hide dropdown when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('#search-input, #search-results').length) {
                    $('#search-results').hide();
                }
            });
        });
    </script>
 <script>
  document.addEventListener('DOMContentLoaded', function () {
    const editBtn = document.querySelector('.edit-btn');
    const form = document.getElementById('shipping-form');

    editBtn.addEventListener('click', function () {
      form.action = "{{ url('/shipping/update') }}"; // update route

      document.querySelector('[name="id"]').value = this.dataset.id;
      document.querySelector('[name="country"]').value = this.dataset.country;
      document.querySelector('[name="email"]').value = this.dataset.email;
      document.querySelector('[name="name"]').value = this.dataset.name;
      document.querySelector('[name="phone"]').value = this.dataset.phone;
      document.querySelector('[name="address"]').value = this.dataset.address;
      document.querySelector('[name="city"]').value = this.dataset.city;
      document.querySelector('[name="zip_code"]').value = this.dataset.zip;
      document.querySelector('[name="state"]').value = this.dataset.state;
      document.querySelector('[name="delivery_instruction"]').value = this.dataset.instruction;
    });
  });
</script>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>