@extends('Frontend.Layouts.master')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection

@section('meta')
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{{ $seo_setting->seo_description }}">
    <meta name="keywords" content="{{ $seo_setting->seo_description }}">
@endsection

@section('content')

    <main>
        <!-- banner  -->
        <div class="inner-banner">
            <div class="container">
                <div class="row  ">
                    <div class="col-lg-12">
                        <div class="inner-banner-head">
                            <h1>{{ __('translate.Our Menu') }}</h1>
                        </div>

                        <div class="inner-banner-item">
                            <div class="left">
                                <a href="{{ route('index') }}">{{ __('translate.Home') }}</a>
                            </div>
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 7L14 12L10 17" stroke="#E5E6EB" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="left">
                                <span>{{ __('translate.Our Menu') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- banner  -->

        <!-- Food Details part start  -->
        <style>
            @media(max-width: 768px) {
                .mobile-show {
                    display: block !important;
                }

                .mobile-hide {
                    display: none !important;
                }
            }

            .active-box {
                background: var(--primary-color);
                color: #fff;
            }
        </style>

        <section class="food-details   ">
            <div class="container">
                <div class="row d-none mobile-show">
                    <div class="col-md-9">
                        <div class="food-details-btn-box">
                            <div class="food-details-btn-box-item">
                                <form method="GET" class="food-details-btn-box-item">
                                    <select class="form-select" name="category" aria-label="Default select example">
                                        <option>{{ __('translate.Select Category') }}</option>
                                        @foreach ($Allcategories as $category)
                                            <option {{ request()->get('category') == $category->slug ? 'selected' : '' }}
                                                value="{{ $category->slug }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 mobile-hide">
                        <ul class="row gap-1">
                            @foreach ($Allcategories as $category)
                                <li style="cursor: pointer; font-size: 16px;padding: 10px 5px;
    border: 1px solid var(--primary-color);
    border-radius: 10px;"
                                    class="nav-item text-center col-md-5 updateCategoryProduct"
                                    data-id="{{ strtolower($category->slug) }}">
                                    <div class="categories-icon">
                                        <img src="{{ asset($category->image) }}" height="50"
                                            alt="{{ $category->name }}">
                                    </div>
                                    {{ $category->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-9">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">

                                <div class="row g-4" id="productsContainer">
                                    @forelse ($products as $product)
                                        <div class=" col-xxl-4 col-xl-6  col-lg-6 col-md-6 featured-item-mt "
                                            data-category="{{ implode(',', $product->cat_name->pluck('slug')->toArray()) }}"
                                            data-search="{{ $product->name }}">
                                            <div class="featured-item">
                                                @if ($product->is_populer == 1)
                                                    <div class="featured-item-img-populer">

                                                    </div>
                                                @endif
                                                <div class="featured-item-img">
                                                    <img src="{{ asset($product['tumb_image']) }}" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $product['id'] }}" class="w-100"
                                                        alt="featured-thumb">

                                                    <div class="featured-item-img-overlay">
                                                        <div class="featured-item-img-over-text">
                                                            <div class="left-text">
                                                                @php
                                                                    $whish = null;
                                                                        if (auth()->check()) {
                                                                            $whish = App\Models\Wishlist::where('product_id', $product->id)
                                                                                ->where('user_id', auth()->id()) // Use auth()->id() instead of auth()->user()->id
                                                                                ->first();
                                                                        }
                                                                @endphp
                                                                <a href="#" class="wishlist-btn"
                                                                    @if ($whish === null) style="display: block;" @else style="display: none;" @endif
                                                                    data-action="add" id="btn-display{{ $product->id }}"
                                                                    data-product-id="{{ $product->id }}">
                                                                    <div class="icon">
                                                                        <span>
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M4.31804 6.31804C3.90017 6.7359 3.5687 7.23198 3.34255 7.77795C3.1164 8.32392 3 8.90909 3 9.50004C3 10.091 3.1164 10.6762 3.34255 11.2221C3.5687 11.7681 3.90017 12.2642 4.31804 12.682L12 20.364L19.682 12.682C20.526 11.8381 21.0001 10.6935 21.0001 9.50004C21.0001 8.30656 20.526 7.16196 19.682 6.31804C18.8381 5.47412 17.6935 5.00001 16.5 5.00001C15.3066 5.00001 14.162 5.47412 13.318 6.31804L12 7.63604L10.682 6.31804C10.2642 5.90017 9.7681 5.5687 9.22213 5.34255C8.67616 5.1164 8.09099 5 7.50004 5C6.90909 5 6.32392 5.1164 5.77795 5.34255C5.23198 5.5687 4.7359 5.90017 4.31804 6.31804V6.31804Z"
                                                                                    stroke="#F01543" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                </a>

                                                                <a href="#" class="wishlist-btn"
                                                                    id="btn-remove{{ $product->id }}"
                                                                    @if ($whish === null) style="display: none;" @else style="display: block;" @endif
                                                                    data-action="remove"
                                                                    data-product-id="{{ $product->id }}">
                                                                    <div class="icon">
                                                                        <span>
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M8.361 2.72748C9.03157 1.3148 10.9691 1.3148 11.6396 2.72748L12.7986 5.16895C13.0649 5.72993 13.5796 6.11875 14.175 6.20871L16.7664 6.60021C18.2659 6.82675 18.8646 8.74259 17.7796 9.84221L15.9044 11.7426C15.4736 12.1793 15.277 12.8084 15.3787 13.425L15.8213 16.1084C16.0775 17.6611 14.51 18.8452 13.1689 18.1121L10.851 16.8451C10.3184 16.554 9.68221 16.554 9.14964 16.8451L6.8318 18.1121C5.49065 18.8452 3.92318 17.6611 4.17931 16.1084L4.62198 13.425C4.72369 12.8084 4.52709 12.1793 4.09623 11.7426L2.22105 9.84221C1.13605 8.74259 1.73477 6.82675 3.23421 6.60021L5.82564 6.20871C6.42107 6.11875 6.9358 5.72993 7.20208 5.16895L8.361 2.72748Z"
                                                                                    fill="#FFB23E"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            @php
                                                                $discount = $product->price - $product->offer_price;
                                                                $discountPercentage =
                                                                    ($discount / $product->price) * 100;
                                                            @endphp
                                                            @if ($discountPercentage != 100.0)
                                                                <div class="right-text">
                                                                    <h5>{{ number_format($discountPercentage, 2) }}% Off
                                                                    </h5>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="featured-item-text">
                                                    <div class="text-item">
                                                        <div class="left">
                                                            <h3>{{ $setting->currency_icon }}{{ number_format($product->price, 2) }}
                                                            </h3>
                                                        </div>
                                                    </div>

                                                    <div class="text-item-center">
                                                        <h3><a title="{{ $product->name }}" href="javascript:;"
                                                                class="line-clamp-1" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal{{ $product['id'] }}">{{ $product->name }}</a>
                                                        </h3>
                                                    </div>

                                                    <div class="text-item-center-item-box">
                                                        @foreach (json_decode($product->specifaction, true) as $name)
                                                            @if($name)
                                                            <div class="text-item-center-item">
                                                                <div class="icon">
                                                                    <span>
                                                                        <svg width="20" height="20"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M8 12L10.5347 14.2812C10.9662 14.6696 11.6366 14.6101 11.993 14.1519L16 9M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                                                stroke="#FE724C" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </span>
                                                                </div>

                                                                <div class="text">
                                                                    <h5>{{ $name }}</h5>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        @endforeach

                                                        <div class="featured-item-btn">
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal{{ $product['id'] }}"
                                                                class="main-btn-three">
                                                                <span>
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M6 4H18C20.2091 4 22 5.79086 22 8V13C22 15.2091 20.2091 17 18 17H10C7.79086 17 6 15.2091 6 13V4ZM6 4C6 2.89543 5.10457 2 4 2H2"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M11 20.5C11 21.3284 10.3284 22 9.5 22C8.67157 22 8 21.3284 8 20.5C8 19.6716 8.67157 19 9.5 19C10.3284 19 11 19.6716 11 20.5Z"
                                                                            stroke-width="1.5" />
                                                                        <path
                                                                            d="M20 20.5C20 21.3284 19.3284 22 18.5 22C17.6716 22 17 21.3284 17 20.5C17 19.6716 17.6716 19 18.5 19C19.3284 19 20 19.6716 20 20.5Z"
                                                                            stroke-width="1.5" />
                                                                        <path d="M14 8L14 13" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M16.5 10.5L11.5 10.5" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                {{-- {{ __('translate.Add to Cart') }} --}}
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 blog-mt-25px text-center cart_empty_area">
                                            <img class="sorry-img" src="{{ asset($setting->empty_result) }}">
                                            <h3 class="sorry-text">{{ __('translate.Sorry!! Product not found.') }}</h3>
                                            <p class="mb-4">
                                                {{ __('translate.Whoops... this information is not available for a moment') }}
                                            </p>
                                            <a class="main-btn-four"
                                                href="{{ route('menu') }}"><span>{{ __('translate.Back to Menu') }}</span></a>
                                        </div>
                                    @endforelse
                                    {{-- <div class="text-center">
                                    {{ $products->links() }}
                                </div> --}}
                                    <style>
                                        .text-center nav ul.pagination {
                                            justify-content: center;
                                        }
                                    </style>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </section>

    </main>
    <script>
        $(document).ready(function() {

            // Trigger the filtering logic when the input or select changes
            $('select[name="category"]').on('input change', function() {
                const selectedCategory = $('select[name="category"]').val().toLowerCase();

                // Iterate over each product
                $('#productsContainer > div[data-category]').each(function() {
                    const productCategory = $(this).data('category')
                        .toLowerCase(); // Categories (comma-separated)
                    const productName = $(this).data('search').toLowerCase(); // Product name

                    // Check if the product matches the selected category and the search keyword
                    const matchesCategory = !selectedCategory || productCategory.split(',')
                        .includes(selectedCategory);


                    // Show or hide the product based on matches
                    if (matchesCategory) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            setTimeout(() => {
                $('.updateCategoryProduct:first').trigger('click');
            }, 100);
            $('.updateCategoryProduct').on('click', function() {
                const selectedCategory = $(this).attr('data-id');
                $('.updateCategoryProduct').removeClass('active-box');
                $(this).addClass('active-box');
                console.log(selectedCategory);
                // Iterate over each product
                $('#productsContainer > div[data-category]').each(function() {
                    const productCategory = $(this).data('category')
                        .toLowerCase(); // Categories (comma-separated)
                    const productName = $(this).data('search').toLowerCase(); // Product name

                    // Check if the product matches the selected category and the search keyword
                    const matchesCategory = !selectedCategory || productCategory.split(',')
                        .includes(selectedCategory);


                    // Show or hide the product based on matches
                    if (matchesCategory) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
@endsection
