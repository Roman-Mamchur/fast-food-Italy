@php
    $google_analytics = App\Models\GoogleAnalytic::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    @yield('meta')

    <!-- Fav Icon -->
	<link rel="icon" href="{{asset($setting->favicon)}}">

    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{asset('cdn/toastr.min.css')}}"/>

    <script src="{{asset('cdn/jquery-3.7.1.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    @if($google_analytics->status == 1)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytics->analytic_id }}"></script>

        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $google_analytics->analytic_id }}');
        </script>

    @endif

</head>

<body>
    @php 
        $cart = session()->get('cart', []);
        if(count($cart) == 0){
         @endphp
         <style>
            #hasCartM {display: none;}
            #cartBodyM {display: block;}
            </style>
         @php
         
        } else {
            @endphp
            <style>
               #hasCartM {display: block;}
               #cartBodyM {display: none;}
               </style>
            @php
            
        }
        $totalPrice = 0;
    @endphp
    <!-- header part start  -->
        @include('Frontend.Layouts.Partials.header')
    <!-- header part End  -->
    <!-- Main Content part start  -->
        @yield('content')
    <!-- header part End  -->
    <!-- Main Content start  -->
        @include('Frontend.Layouts.Partials.footer')

    <nav class="mobile-bottom-menu-main" >
        <ul class="mobile-bottom-menu" >
             <li>
                    <a href="{{route('menu')}}" class="{{ Route::is('menu') ? 'active' : '' }}">
                    <i class="fa-solid fa-layer-group"></i>
                    {{ __('translate.Menu') }}
                    </a>
                </li>

                <li>
                    <a href="javascript:;" data-name="cart-dropdown" class="click {{ Route::is('checkout') ? 'active' : '' }}">
                    <i class="fa-solid fa-cart-shopping" data-name="cart-dropdown"></i>
                    <div class="tag-count">
                       <span id="carCountM" data-name="cart-dropdown"> {{ session('cart') ? count(session('cart')) : 0 }}</span>
                    </div>
                    {{ __('translate.cart') }}
                </a>
                </li>

                @php
                    if (auth()->check()) {
                        $user_id = auth()->user()->id;
                        $totalWishlistItems = App\Models\Wishlist::where('user_id', $user_id)->count();
                    } else {
                        $totalWishlistItems = 0;
                    }
                @endphp

                <li>
                    @if (auth()->check()) 
                    <a href="{{route('user.wishlist')}}" class="{{ Route::is('user.wishlist') ? 'active' : '' }}">
                    @else
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModalLogin" class="{{ Route::is('user.wishlist') ? 'active' : '' }}">
                    @endif
                        <i class="fa-solid fa-heart"></i>
                    <div class="tag-count w-tag-count">
                       <span> {{ $totalWishlistItems }}</span>
                    </div>
                    {{ __('translate.Wishlist') }}
                </a>
                </li>
                <li style="top: 14px;">
                @if (auth()->user())
                    <a href="{{route('user.dashboard')}}" class="{{ Route::is('user.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-circle-user"></i>
                    {{ __('translate.account') }}
                </a>
                @else
                <a href="javascript:;"
                data-bs-toggle="modal" data-bs-target="#exampleModalLogin" class="{{ Route::is('user.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-circle-user"></i>
                @endif
                {{ __('Login') }}
                </a>
                </li>
        </ul>
    </nav>
    <style>
            
            
        @media (max-width: 676px){
            #cart-dropdown {
            position: fixed;
            left: 0;
            z-index: 9999;
            top: 30%;
            background: white;
            width: 100%;
            height: 300px;
            overflow-y: scroll;
            padding: 10px;
        }
        }
    </style>
    <div class="cart-dropdown header-dropdown" id="cart-dropdown">


        <div class="cart-dropdown-text d-flex">
            <div class="text">
                <h3>{{ __('translate.My Cart') }}</h3>
            </div>

            <div class="cart-dropdown-btn">
                <button type="button" class="close-btn" onclick="closeCart()" aria-label="Close">
                    <span>
                        <svg width="10" height="10" viewBox="0 0 10 10"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.24309 0.757865L0.757812 9.24315M9.24309 9.24309L0.757812 0.757812"
                                stroke="#9EA3AE" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>

                </button>
            </div>
        </div>

        <div id="cartBox">
            @foreach ($cart as $item)
                @php
                    $product = App\Models\Product::where('status', 'active')
                        ->whereIn('id', [$item['product_id']])
                        ->first();
                    $total = 0;
                    $calculate = 0;
                @endphp

            <div class="cart-dropdown-item-box"
            data-product-id="{{ $product['id'] }}">
            <div class="cart-dropdown-item">
                <div class="cart-dropdown-item-img">
                    <img src="{{ asset($product['tumb_image']) }}"
                        alt="img">
                </div>
                <div class="cart-dropdown-item-text">
                    <a href="javascript:;">
                        <h3>{{ $product->name }}</h3>
                    </a>
                    <div class="d-flex">
                        <p id="price1-{{ $product['id'] }}">{{ $setting->currency_icon }}{{ number_format($item['total'], 2) }}</p>
                        <div class="d-flex w-75">
                            <button type="button" class="btn btn-minus-custom"
                                onclick="decrementQuantity1({{ $product['id'] }})" style="width: 40px; line-height: 10px; height: 30px;">-</button>
                            <input type="number" style="height: 30px; text-align: center;" id="quantity1-{{ $product['id'] }}" value="{{$item['qty']}}"
                                min="1" class="form-control product-qty quantity-input" readonly>
                            <button type="button" class="btn btn-plus-custom"
                                onclick="incrementQuantity1({{ $product['id'] }})" style="width: 40px; line-height: 10px; height: 30px;">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart-dropdown-inner">
                <div class="cart-dropdown-inner-btn">
                    <a href="javascript:;" class="remove-cart-item" onclick="removeCartItem({{ $product['id']}})"
                        data-product-id="{{ $product['id'] }}">
                        <span>
                            <svg width="18" height="18"
                                viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.75 6V13.5C3.75 15.1569 5.09315 16.5 6.75 16.5H11.25C12.9069 16.5 14.25 15.1569 14.25 13.5V6M10.5 8.25V12.75M7.5 8.25L7.5 12.75M12 3.75L10.9453 2.16795C10.6671 1.75065 10.1988 1.5 9.69722 1.5H8.30278C7.80125 1.5 7.3329 1.75065 7.0547 2.16795L6 3.75M12 3.75H6M12 3.75H15.75M6 3.75H2.25"
                                    stroke="#F01543" stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>

                @php
                    $totalPrice += $item['total'];
                @endphp



</div>
</div>
            @endforeach
        </div>

        @php $cart = session('cart');
        $cartCount = is_array($cart) ? count($cart) : 0;
        @endphp
        <div class="cart-dropdown-sub-total" id="hasCart"
            @if ($cartCount == 0) style="display:none;" @else style="display:block;" @endif>
            <div class="cart-dropdown-sub-total-item d-none" style="display: none;">
                <div class="text">
                    <h3>{{ __('translate.Sub Total') }}</h3>
                </div>
                <div class="text">
                    <h3><a id="updateSubTotal"
                            href="javascript:;">{{ $setting->currency_icon }}{{ number_format($totalPrice, 2) }}</a>
                    </h3>
                </div>
            </div>
            <div class="cart-dropdown-sub-total-btn">
                <a href="{{ route('menu') }}" class="main-btn-three mb-3">Add More Items</a>
                @if (Auth::user())
                    <a href="{{ route('checkout') }}"
                        class="main-btn-four">{{ __('Checkout') }}</a>
                @else
                    <a href="javascript:;" type="button" class="main-btn-six" onclick="closeCart()"
                        data-bs-toggle="modal" data-bs-target="#exampleModalLogin">
                        {{ __('Login/Sign Up to Checkout') }}</a>
                @endif
            </div>

        </div>
        <div class="card-body" id="cartBody"
            @if ($cartCount != 0) style="display:none;" @endif>
            <h5 class="card-title">{{ __('translate.Empty Cart') }}</h5>
            <p class="card-text">{{ __('translate.Browse Product') }}</p>
            <a href="{{ route('menu') }}"
                class="btn btn-primary">{{ __('translate.Shop Now') }}</a>
        </div>



    </div>


<script src="{{asset('frontend/assets/js/venobox.min.js') }}"></script>
<script src="{{asset('frontend/assets/js/aos.js') }}"></script>
<script src="{{asset('frontend/assets/js/slick.min.js') }}"></script>
<script src="{{asset('frontend/assets/js//jquery.shuffle.min.js') }}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('frontend/assets/js/custom.js') }}"></script>
<script src="{{asset('cdn/toster.main.js')}}"></script>
<style>
    .btn-success {
        color: #fff;
        margin-left: 20px;
        background-color: #198754;
        border-color: #198754;
    }
</style>

@if(Session::has('message'))
        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
                }
                var type="{{Session::get('alert-type','info')}}"
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
    </script>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif

</body>
</html>
