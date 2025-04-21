@php
    $language = App\Models\Language::get();
    $contact = App\Models\ContactPage::first();
    $section = App\Models\SectionTitel::first();
    $setting = App\Models\Setting::first();
    if (auth()->check()) {
        $user_id = auth()->user()->id;
        $totalWishlistItems = App\Models\Wishlist::where('user_id', $user_id)->count();
    } else {
        $totalWishlistItems = 0;
    }
    $cart = session()->get('cart', []);
    $totalPrice = 0;
@endphp
<style>
    .header .menu-bg .nav-btn-main .nav-btn-two .love:after {
        content: "{{ $totalWishlistItems }}";
    }

    #carCount {
        position: absolute;
        border-radius: 50%;
        top: 0;
        z-index: 9999;
        right: 0;
        width: 16px;
        height: 16px;
        text-align: center;
        line-height: 16px;
        background-color: var(--primary-color);
        color: #fff;
        font-size: 10px;
        font-weight: 500;
    }
    .header .menu-bg .nav-login-btn-main .main-btn-four.custom-btn {
        border: 1px solid #f01543;
        color: #fff;
    }   

    .header .nav-bg {
        top: 48px;
    }
    .header .menu-bg {
        background-color: #000;
    }
    .header .menu-bg .nav-main .nav-main .menu ul li a {
        color: #fff;
    }
    .header .nav-bg .nav-main .nav-main .menu ul li a {
        color: #fff;
    }
</style>

<header class="header">
    <div class="container">
        <div class="header-main">
            <div class="header-left-center">
                <a href="{{ route('menu') }}">{{ $section->top_ber_message }}</a>
            </div>
            <div class="header-left-center">
                {{-- <p class="text-white">Opening hours: 4:00 PM to 11:00 PM</p> --}}
            </div>
            <div class="header-right">
                <div class="header-right-item">
                    <div class="header-right-inner">
                        <div class="icon">
                            <span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.75 14.25V13.0155C15.75 12.4022 15.3766 11.8506 14.8071 11.6228L13.2815 11.0126C12.5571 10.7229 11.7316 11.0367 11.3828 11.7345L11.25 12C11.25 12 9.375 11.625 7.875 10.125C6.375 8.625 6 6.75 6 6.75L6.26551 6.61724C6.96328 6.26836 7.27714 5.44285 6.98741 4.71852L6.37717 3.19291C6.14937 2.62343 5.59781 2.25 4.98445 2.25H3.75C2.92157 2.25 2.25 2.92157 2.25 3.75C2.25 10.3774 7.62258 15.75 14.25 15.75C15.0784 15.75 15.75 15.0784 15.75 14.25Z"
                                        stroke-width="1.5" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="text">
                            <a href="tel:{{ $section->top_ber_phone }}">{{ $section->top_ber_phone }}</a>
                        </div>
                    </div>
                    {{-- <div class="header-right-inner">
                            <div class="icon">
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.66699 10V5.83333C1.66699 3.99238 3.15938 2.5 5.00033 2.5H15.0003C16.8413 2.5 18.3337 3.99238 18.3337 5.83333V14.1667C18.3337 16.0076 16.8413 17.5 15.0003 17.5H6.66699M5.00033 6.66667L8.15133 8.76733C9.27099 9.51378 10.7297 9.51378 11.8493 8.76733L15.0003 6.66667M1.66699 12.5H6.66699M1.66699 15H6.66699"
                                            stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="text">
                                <a href="mailto:{{$section->top_ber_email}}">{{$section->top_ber_email}}</a>
                            </div>
                        </div> --}}
                    {{-- <div class="header-right-inner">
                        <a href="">
                            <div class="icon">
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 2.25H9C7.75736 2.25 6.75 3.25736 6.75 4.5V6.75H4.5V9.75H6.75V15.75H9.75V9.75H12L12.75 6.75H9.75V4.5C9.75 4.25736 9.99316 4.01421 10.25 4.01421H12V2.25Z"
                                            stroke-width="1.5" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="">
                            <div class="icon">
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.75 2.25H5.25C4.00736 2.25 3 3.25736 3 4.5V13.5C3 14.7426 4.00736 15.75 5.25 15.75H12.75C13.9926 15.75 15 14.7426 15 13.5V4.5C15 3.25736 13.9926 2.25 12.75 2.25Z"
                                            stroke-width="1.5" stroke-linejoin="round" />
                                        <path
                                            d="M9 6.75C7.75736 6.75 6.75 7.75736 6.75 9C6.75 10.2426 7.75736 11.25 9 11.25C10.2426 11.25 11.25 10.2426 11.25 9C11.25 7.75736 10.2426 6.75 9 6.75Z"
                                            stroke-width="1.5" stroke-linejoin="round" />
                                        <path
                                            d="M12.1875 5.0625C12.4764 5.0625 12.75 4.78889 12.75 4.5C12.75 4.21111 12.4764 3.9375 12.1875 3.9375C11.8986 3.9375 11.625 4.21111 11.625 4.5C11.625 4.78889 11.8986 5.0625 12.1875 5.0625Z"
                                            stroke-width="1.5" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                        </a>

                    </div> --}}
                    {{-- <div class="location-btn">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">

                                @if (Session::get('front_lang'))
                                    {{ Session::get('front_lang_name') }}
                                @else
                                    {{ __('translate.Select Language') }}
                                @endif
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach ($language as $language)
                                    <li><a class="dropdown-item"
                                            href="{{ route('set.language', $language->lang_code) }}">{{ $language->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="location-btn-icon">
                            <span>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.83301 8.33203L9.99967 11.6654L14.1663 8.33203" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- menu part start -->


    <nav class="menu-bg">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="nav-main">
                        <div class="nav-main">
                            <div class="logo">
                                <a href="{{ route('index') }}"> <img width="80" src="{{ asset('frontend/assets/images/logo/logo-header.png') }}"
                                        alt="logo"></a>
                            </div>

                            <div class="menu">
                                <ul>
                                    @if ($setting->theam == 0)
                                        <li><a href="{{ route('index') }}">{{ __('translate.Home') }}
                                            </a>
                                            {{-- <ul>
                                                <li>
                                                    <a href="{{route('change.fontend.theme',1)}}">{{ __('translate.Home') }}-01</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('change.fontend.theme',2)}}">{{ __('translate.Home') }}-02</a>
                                                </li>
                                            </ul> --}}
                                        </li>
                                    @else
                                        <li><a href="{{ route('index') }}">{{ __('translate.Home') }}</a></li>
                                    @endif


                                    <li><a href="{{ route('menu') }}">{{ __('translate.Menu') }}
                                    </a>

                                    </li>
                                    <li><a href="{{ route('about') }}">{{ __('translate.About Us') }}</a></li>
                                    <li><a href="{{ route('contact')}}">{{ __('Reservation') }}</a></li>
                                    {{-- <li><a href="{{route('blog')}}">{{ __('translate.Blog') }}</a></li> --}}
                                </ul>
                            </div>
                        </div>



                        <div class="nav-btn-main">
                            {{-- <form action="{{ route('menu') }}" method="GET">
                                <div class="nav-btn-one">
                                    <input type="text" name="keyword" class="form-control"
                                        id="exampleFormControlInput1" placeholder="{{ __('translate.Search here') }}">
                                    <input type="hidden" name="category">
                                    <div class="nav-search">
                                        <button type="submit">
                                            <span>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M19.25 10.5C19.25 15.3325 15.3325 19.25 10.5 19.25C5.66751 19.25 1.75 15.3325 1.75 10.5C1.75 5.66751 5.66751 1.75 10.5 1.75C15.3325 1.75 19.25 5.66751 19.25 10.5ZM10.5 20.75C16.1609 20.75 20.75 16.1609 20.75 10.5C20.75 4.83908 16.1609 0.25 10.5 0.25C4.83908 0.25 0.25 4.83908 0.25 10.5C0.25 16.1609 4.83908 20.75 10.5 20.75ZM19.5303 18.4697C19.2374 18.1768 18.7626 18.1768 18.4697 18.4697C18.1768 18.7626 18.1768 19.2374 18.4697 19.5303L20.4696 21.5303C20.7625 21.8232 21.2374 21.8232 21.5303 21.5303C21.8232 21.2374 21.8232 20.7625 21.5303 20.4696L19.5303 18.4697Z"
                                                        fill="#4D5461" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>

                                </div>
                            </form> --}}
                            <div class="nav-btn-two">
                                <a @if(!auth()->user()) href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModalLogin" @else href="{{route('user.wishlist')}}" @endif>
                                    <div class="love">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.833 7.584C21.1216 7.584 22.1663 8.62867 22.1663 9.91733M13.9997 6.65363L14.7989 5.834C17.285 3.2845 21.3157 3.2845 23.8018 5.834C26.2211 8.31503 26.2954 12.3134 23.9701 14.8872L17.2893 22.2819C15.5145 24.2463 12.4848 24.2463 10.71 22.2819L4.02926 14.8873C1.70392 12.3135 1.77826 8.31506 4.19757 5.83402C6.68365 3.28451 10.7144 3.28452 13.2005 5.83402L13.9997 6.65363Z"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                </a>


                                <div class="love cart">
                                    <span id="carCount">{{ session('cart') ? count(session('cart')) : 0 }}</span>

                                    <div class="click" data-name="cart-dropdown">

                                    </div>
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.99967 4.66536H20.9997C23.577 4.66536 25.6663 6.7547 25.6663 9.33203V15.1654C25.6663 17.7427 23.577 19.832 20.9997 19.832H11.6663C9.08901 19.832 6.99967 17.7427 6.99967 15.1654V4.66536ZM6.99967 4.66536C6.99967 3.3767 5.95501 2.33203 4.66634 2.33203H2.33301"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M12.833 23.918C12.833 24.8845 12.0495 25.668 11.083 25.668C10.1165 25.668 9.33301 24.8845 9.33301 23.918C9.33301 22.9515 10.1165 22.168 11.083 22.168C12.0495 22.168 12.833 22.9515 12.833 23.918Z"
                                                stroke-width="1.5" />
                                            <path
                                                d="M23.333 23.918C23.333 24.8845 22.5495 25.668 21.583 25.668C20.6165 25.668 19.833 24.8845 19.833 23.918C19.833 22.9515 20.6165 22.168 21.583 22.168C22.5495 22.168 23.333 22.9515 23.333 23.918Z"
                                                stroke-width="1.5" />
                                            <path d="M16.333 9.33203L16.333 15.1654" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M19.2503 12.25L13.417 12.25" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>





                                <!-- login korar por aita show hobe  -->
                                @if (Auth::user())
                                    <div class="love user">
                                        <div class="click" data-name="profile-dropdown" id="profileDropdown">

                                        </div>
                                        <span style="color: #fff">
                                            {{ strtok(Auth::user()->name, ' ') }}
                                            {{-- <i class="fa fa-user"></i> --}}
                                            {{-- {{ auth()->user()->name }} --}}
                                        </span>


                                        <div class="profile-dropdown header-dropdown" id="profile-dropdown">
                                            {{-- <div class="profile-dropdown-img">
                                                @if (Auth::user()->image)
                                                    <img src="{{ asset(Auth::user()->image) }}" alt="img">
                                                @else
                                                    <img src="{{ asset($setting->empty_cart) }}" alt="img">
                                                @endif

                                            </div> --}}

                                            <div class="profile-dropdown-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p>{{ __('translate.User Id') }} #{{ Auth::user()->id }}</p>
                                            </div>



                                            <div class="profile-dropdown-menu">
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('user.order') }}">
                                                            <span>
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <ellipse cx="12" cy="17.5"
                                                                        rx="7" ry="3.5"
                                                                        stroke-width="1.5" stroke-linejoin="round" />
                                                                    <circle cx="12" cy="7" r="4"
                                                                        stroke-width="1.5" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                            {{ __('translate.Dashboard') }}

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="profile-dropdown-menu profile-dropdown-menu-two ">
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('logout') }}">
                                                            <span>
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M20 14L21.2929 12.7071C21.6834 12.3166 21.6834 11.6834 21.2929 11.2929L20 10"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M21 12H13M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8"
                                                                        stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </span>

                                                            {{ __('translate.Logout') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if (!Auth::user())
                                <div class="nav-login-btn-main">
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModalLogin" class="main-btn-four custom-btn">{{ __('Log In') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </nav>
</header>

<!-- mobile navigation start -->
<header class="mobile-header">
    <div class="ul-header-bottom">
        {{-- <div class="d-flex pt-3 pb-3 ml-1" style="background: #ff9a00;">
            <div class="d-flex" style="width: 35%!important">
                <div class="icon">
                    <span>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="white"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.75 14.25V13.0155C15.75 12.4022 15.3766 11.8506 14.8071 11.6228L13.2815 11.0126C12.5571 10.7229 11.7316 11.0367 11.3828 11.7345L11.25 12C11.25 12 9.375 11.625 7.875 10.125C6.375 8.625 6 6.75 6 6.75L6.26551 6.61724C6.96328 6.26836 7.27714 5.44285 6.98741 4.71852L6.37717 3.19291C6.14937 2.62343 5.59781 2.25 4.98445 2.25H3.75C2.92157 2.25 2.25 2.92157 2.25 3.75C2.25 10.3774 7.62258 15.75 14.25 15.75C15.0784 15.75 15.75 15.0784 15.75 14.25Z"
                                stroke-width="1.5" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="text">
                    <a style="font-size: 14px; color: white;"
                        href="tel:{{ $section->top_ber_phone }}">{{ $section->top_ber_phone }}</a>
                </div>
            </div>
            <div class="">
                <p style="font-size: 14px; color: white; margin-top: 4px;">Opening hours: 4:00 PM to 11:00 PM</p>
            </div>
        </div> --}}
        <div class="container-full" style="background: #ff9a00;">
            <div class="mobile-header__container">
                <div class="p-left d-flex">
                    <div class="logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('frontend/assets/images/logo/logo-header.png') }}" width="70" alt="logo">
                        </a>
                    </div>
                    <div style="text-align: center; margin-left: 30px;">
                        <a style="font-wight: 700;font-size: 14px; color: white;     align-self: center;"
                        href="tel:{{ $section->top_ber_phone }}"><i class="fa fa-phone"></i>{{ $section->top_ber_phone }}</a>
                        <p style="font-size: 11px; color: white; margin-top: 2px;">Opening hours: 4:00PM to 11:00PM</p>
                    </div>
                </div>
                <div class="p-right">
                    <button id="nav-opn-btn">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- offcanvas -->
<aside id="offcanvas-nav">
    <nav class="m-nav">
        <button id="nav-cls-btn"><i class="fa-solid fa-xmark"></i></button>
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('frontend/assets/images/logo/logo-header.png') }} height="70" alt="logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('index') }}">{{ __('translate.Home') }}</a></li>
            <li><a href="{{ route('menu') }}">{{ __('translate.Menu') }}</a></li>
            <li><a href="{{ route('about') }}">{{ __('translate.About Us') }}</a></li>
            <li><a href="{{ route('contact') }}">{{ __('Reservation') }}</a></li>
            {{-- <li><a href="{{ route('blog') }}">{{ __('translate.Blog') }}</a></li> --}}
        </ul>

    </nav>
</aside>
<!-- header part end  -->
