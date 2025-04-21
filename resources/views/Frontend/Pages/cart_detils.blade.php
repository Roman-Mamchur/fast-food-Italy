@extends('Frontend.Layouts.master')

@section('title')
    <title>{{$setting->app_name}} - {{ __('translate.Shopping Cart') }}</title>
@endsection

@section('content')
<main>

    <!-- banner  -->

    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1>{{ __('translate.Shopping Cart') }}</h1>
                    </div>

                    <div class="inner-banner-item">
                        <div class="left">
                            <a href="{{route('index')}}">{{ __('translate.Home') }}</a>
                        </div>
                        <div class="icon">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 7L14 12L10 17" stroke="#E5E6EB" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="left">
                            <span>{{ __('translate.Shopping Cart') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner  -->



    <!-- Shopping Cart  start -->

    <section class="shopping-cart">
        <div class="container">
            <div class="row pt-5 pb-5">
                @if (count($cart) > 0)
                <div class="col-lg-12">
                    <div class="tabel-main">
                        <table class="table  ">
                            <thead>
                                <tr class="tabel-main-top">

                                    <th>
                                        {{ __('translate.Image') }}
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        {{ __('translate.Details') }}
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        {{ __('translate.Price') }}
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        {{ __('translate.Quantity') }}
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        {{ __('translate.Sub Total') }}
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </th>
                                    <th class="details-control-two">
                                        {{ __('translate.Action') }}
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                    stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cart as $item)
                                @php
                                    $product = App\Models\Product::where('status', 'active')->whereIn('id', [$item['product_id']])->first();
                                    $total = 0;
                                    $calculate = 0;
                                    $total = ($product['price'] * $item['qty']);
                                @endphp
                                <tr>
                                    <td>
                                        <div class="tabel-item">
                                            <div class="tabel-img">
                                                @if ($product)
                                                <img src="{{ asset($product['tumb_image']) }}" alt="img">
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tabel-text">
                                            @if ($product)
                                            <h5>{{ $product['name'] }}</h5>
                                            @endif
                                            <a href="#">
                                                @if($item['size'])
                                                    <span>{{ __('translate.Size') }}:</span>
                                                @endif
                                                @foreach ($item['size'] as $size => $price)
                                                    {{ $size }} (<strong>{{ $setting->currency_icon }}{{ $price }}</strong>)
                                                    @php $total = $total + ($price * $item['qty']) @endphp
                                                @endforeach
                                            </a>
                                            @if (is_array($item['addons']))
                                            <p>
                                                @if($item['addons'])
                                                 <span>{{ __('translate.Addon') }}:</span>
                                                @endif
                                                @foreach ($item['addons'] as $addonId => $quantity)
                                                        @php
                                                            $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                                            $calculate += ($addonsDb->first()->price * $quantity);
                                                        @endphp
                                                        @if ($addonsDb->isNotEmpty())
                                                            {{ $addonsDb->first()->name }} <span>({{ $setting->currency_icon }}{{ $addonsDb->first()->price }} * {{ $quantity }})</span>|
                                                        @endif

                                                @endforeach

                                            </p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tabel-text">
                                            @if ($product)
                                                <h6>{{ $setting->currency_icon }}{{ $item['price'] }}</h6>
                                            @endif

                                        </div>
                                    </td>
                                    <td>
                                        <div class="tabel-text-btn">
                                            <div class="grid">
                                                <a href="{{route('cart.decrement',$product['id'])}}" class="btn btn-minus-custom">
                                                    <i class="fa-solid fa-minus"></i>
                                                </a>
                                                    <div class="column product-qty">{{ $item['qty'] }}</div>
                                                    <input class="column product-qty" type="hidden" name="qty" value="{{ $item['qty'] }}">
                                                <a href="{{route('cart.increment',$product['id'])}}" class="btn btn-plus-custom">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tabel-text">
                                            <h6>{{ $setting->currency_icon }}{{ $item['total'] }}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tabel-modal-btn">
                                            <button type="button" class="view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $product['id'] }}">
                                                <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M21.1303 14.1469C22.2899 12.9268 22.2899 11.0732 21.1303 9.8531C19.1745 7.79533 15.8155 5 12 5C8.18448 5 4.82549 7.79533 2.86971 9.8531C1.7101 11.0732 1.7101 12.9268 2.86971 14.1469C4.82549 16.2047 8.18448 19 12 19C15.8155 19 19.1745 16.2047 21.1303 14.1469ZM12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                                            fill="white" />
                                                    </svg></span> {{ __('translate.View') }}
                                            </button>
                                            <a href="{{route('cart.remove',$product['id'])}}">
                                                <span>
                                                    <svg width="17" height="20" viewBox="0 0 17 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.834 0.890599C6.20493 0.334202 6.8294 0 7.4981 0H9.35737C10.0261 0 10.6505 0.334202 11.0215 0.8906L11.9277 2.25H15.6777C16.0919 2.25 16.4277 2.58579 16.4277 3C16.4277 3.41421 16.0919 3.75 15.6777 3.75H1.17773C0.763521 3.75 0.427734 3.41421 0.427734 3C0.427734 2.58579 0.763521 2.25 1.17773 2.25H4.92773L5.834 0.890599ZM11.4277 20H5.42773C3.2186 20 1.42773 18.2091 1.42773 16V5H15.4277V16C15.4277 18.2091 13.6369 20 11.4277 20ZM6.42773 8.25C6.84195 8.25 7.17773 8.58579 7.17773 9V16C7.17773 16.4142 6.84195 16.75 6.42773 16.75C6.01352 16.75 5.67773 16.4142 5.67773 16L5.67773 9C5.67773 8.58579 6.01352 8.25 6.42773 8.25ZM10.4277 8.25C10.8419 8.25 11.1777 8.58579 11.1777 9V16C11.1777 16.4142 10.8419 16.75 10.4277 16.75C10.0135 16.75 9.67774 16.4142 9.67773 16V9C9.67773 8.58579 10.0135 8.25 10.4277 8.25Z"
                                                            fill="white" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>


                                <!-- modal  -->
                                <div class="modal fade" id="exampleModal{{ $product['id'] }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"> </button>
                                            <div class="modal-body">
                                                <div class="featured-item  ">
                                                    <div class="featured-item-img">
                                                        <img  src="{{ asset($product['tumb_image']) }}" class="w-100"
                                                            alt="featured-thumb">

                                                        <div class="featured-item-img-overlay">
                                                            <div class="featured-item-img-over-text">
                                                                <div class="right-text">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="modal-body-text">
                                                    <h3>{{ $product['name'] }} </h3>

                                                </div>

                                                <form action="{{route('update.order.cart',$product['id'])}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body-item-box pb-2">
                                                        <div class="together-box-text">
                                                            <h5>{{ __('translate.Select Size') }}</h5>
                                                        </div>
                                                        @foreach(json_decode($product->size, true) as $size => $price)
                                                        <div class="together-box-item">
                                                            <div class="form-check">
                                                                    @php
                                                                        $cart_size = null;
                                                                        foreach ($item['size'] as $sizes => $prices) {
                                                                            $cart_size = $sizes;
                                                                        }
                                                                    @endphp
                                                                    <input class="form-check-input" type="radio" name="size" value="{{ $size }},{{ $price }}" id="size_{{ $loop->index }}" data-price="{{ $price }}"
                                                                    @if($cart_size == $size) checked @endif>

                                                                <label class="form-check-label" for="size_{{ $loop->index }}">
                                                                    {{ $size }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check-btn">
                                                                <div class="grid">
                                                                    {{$setting->currency_icon}}{{ $price }}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @endforeach

                                                        <div class="together-box-text pb-2">
                                                            <h5>{{ __('translate.Select Addon (Optional)') }}</h5>
                                                        </div>
                                                        @if($product->items == null)
                                                            @foreach(json_decode($product->items, true) as $id)
                                                            @php
                                                            $addons = App\Models\OptionalItem::where('id', $id)->get();
                                                            @endphp
                                                                @foreach ($addons as $addon)
                                                                <div class="together-box-item">
                                                                    <div class="form-check">

                                                                        <input class="form-check-input" type="checkbox" name="addons[]" value="{{ $addon->id }}" id="addon_{{ $loop->parent->index }}_{{ $loop->index }}"
                                                                            @if(isset($item['addons'][$addon->id])) checked @endif>
                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                            {{ $addon->name }} ({{$setting->currency_icon}}{{ $addon->price }})
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check-btn">
                                                                        <div class="form-check-btn">
                                                                            <div class="grid">
                                                                                <button class="btn btn-minus" data-addon-index="{{ $loop->parent->index }}_{{ $loop->index }}"><i class="fa-solid fa-minus"></i></button>
                                                                                <div class="column product-qty" id="quantityUpdate_{{ $loop->parent->index }}_{{ $loop->index }}">
                                                                                    @if(isset($item['addons'][$addon->id])){{ $item['addons'][$addon->id] }}@else 0 @endif
                                                                                </div>
                                                                                <input type="hidden" name="addons_qty[]" id="qtyInput_{{ $loop->parent->index }}_{{ $loop->index }}" value="@if(isset($item['addons'][$addon->id])){{ $item['addons'][$addon->id] }}@else 0 @endif">
                                                                                <button class="btn btn-plus" data-addon-index="{{ $loop->parent->index }}_{{ $loop->index }}"><i class="fa-solid fa-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                @endforeach
                                                            @endforeach
                                                        @endif

                                                        <input class="column product-qty" type="hidden" name="qty" id="qtyInput" value="{{$item['qty']}}">


                                                        <div class="together-box-inner-btn-btm">
                                                            <button type="submit" class="main-btn-six" tabindex="-1">
                                                                <span>
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M6 4H18C20.2091 4 22 5.79086 22 8V13C22 15.2091 20.2091 17 18 17H10C7.79086 17 6 15.2091 6 13V4ZM6 4C6 2.89543 5.10457 2 4 2H2"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M11 20.5C11 21.3284 10.3284 22 9.5 22C8.67157 22 8 21.3284 8 20.5C8 19.6716 8.67157 19 9.5 19C10.3284 19 11 19.6716 11 20.5Z"
                                                                            stroke-width="1.5"></path>
                                                                        <path
                                                                            d="M20 20.5C20 21.3284 19.3284 22 18.5 22C17.6716 22 17 21.3284 17 20.5C17 19.6716 17.6716 19 18.5 19C19.3284 19 20 19.6716 20 20.5Z"
                                                                            stroke-width="1.5"></path>
                                                                        <path d="M14 8L14 13" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path d="M16.5 10.5L11.5 10.5" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                                {{ __('translate.Update Cart') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            </tbody>
                        </table>


                    </div>

                     @if(Auth::user())
                        <div class="tabel-main-btn">
                            <a href="{{route('checkout')}}" class="main-btn-six">
                                {{ __('translate.Process to Checkout') }}
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 16L18 12M18 12L14 8M18 12L6 12" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    @else
                        <div class="tabel-main-btn">
                            <button type="button" class="main-btn-six" data-bs-toggle="modal"
                                data-bs-target="#exampleModal7">
                                {{ __('translate.Process to Checkout') }}
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 16L18 12M18 12L14 8M18 12L6 12" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    @endif



                </div>
                @else
                    <div class="col-lg-12 cart_empty_area">
                        <img class="sorry-img" src="{{ asset($setting->empty_wishlist) }}">
                        <h3 class="sorry-text">{{ __('translate.Sorry!! Your cart is empty') }}</h3>
                        <p class="mb-4">{{ __('translate.Whoops... We can not find any product on your cart.') }}</p>
                        <a class="main-btn-four" href="{{ route('menu') }}"><span>{{ __('translate.Go to Menu') }}</span></a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    

    <!-- Shopping Cart end  -->

    <!-- App part-start -->
     @if($setting->app_visibility == 1)
        <section class="restaurant">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="restaurant-taitel">
                            <h2>{{ $app->titel }}</h2>

                            <h4>{!! clean($app->description) !!}</h4>
                        </div>

                        <div class="restaurant-taitel-btn">
                            <a href="{{ $app->play_store }}" class="paly-bg" > <span>

                                </span> {{ __('translate.Play Store') }}</a>
                            <a href="{{ $app->i_store }}" class=" restaurant-taitel-btn-two"> <span>

                                </span> {{ __('translate.App Store') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="restaurant-img-main">
                            <div class="restaurant-img">
                                    <img src="{{asset($app->image)}}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- App part-end -->

</main>
<script>
"use strict"
    $(document).ready(function () {
        $(".btn-minus, .btn-plus").on("click", function (e) {
            e.preventDefault();
            var addonIndex = $(this).data("addon-index");
            var currentQuantity = parseInt($("#quantityUpdate_" + addonIndex).text());
            if ($(this).hasClass("btn-minus")) {
                currentQuantity = Math.max(currentQuantity - 1, 0);
            } else if ($(this).hasClass("btn-plus")) {
                currentQuantity++;
            }
            $("#quantityUpdate_" + addonIndex).text(currentQuantity);
            $("#qtyInput_" + addonIndex).val(currentQuantity);
        });
    });
</script>

@endsection
