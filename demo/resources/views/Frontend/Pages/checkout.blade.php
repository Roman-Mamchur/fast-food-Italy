@extends('Frontend.Layouts.master')

@section('title')
    <title>{{$setting->app_name}} - {{ __('translate.Checkout') }}</title>
@endsection

@section('content')

<main>

    <!-- banner  -->

    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1>{{ __('translate.Checkout') }}</h1>
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
                            <span>{{ __('translate.Checkout') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner  -->


    <!-- Shopping Cart  start -->

    <section class="shopping-cart-two shopping-cart-address ">
        <div class="container">
             <form action="{{route('process.order')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-7  ">
                        <div class="row mr-27px">
                            <div class="col-lg-12">
                                <div class="shopping-cart-address-btn-main">
                                    <div class="shopping-cart-address-taitel">
                                        <h4> {{ __('translate.Select Address') }}</h4>
                                    </div>

                                    <button type="button" class="add-new-btn " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <span>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.9974 6.66797V13.3346M13.3307 10.0013H6.66406M9.9974 18.3346C14.5998 18.3346 18.3307 14.6037 18.3307 10.0013C18.3307 5.39893 14.5998 1.66797 9.9974 1.66797C5.39502 1.66797 1.66406 5.39893 1.66406 10.0013C1.66406 14.6037 5.39502 18.3346 9.9974 18.3346Z"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span> {{ __('translate.Add New') }}
                                    </button>
                                </div>

                            </div>


                        </div>




                        <div class="row">
                            @foreach ($address as $index => $addres)
                            <div class="col-lg-6">

                                <div class="shopping-cart-address-one">

                                    <div class="shopping-cart-address-one-item">
                                        <div class="text">
                                            <h4>
                                                <input class="form-check-input" type="radio" value="{{$addres->id}}" id="flexCheckDefault" value="{{old('address_id')}}" name="address_id">
                                                {{ __('translate.Address') }} #{{++$index}}</h4>
                                        </div>
                                        <div class="delet-btn">
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal{{$addres->id}}">
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5 8V18C5 20.2091 6.79086 22 9 22H15C17.2091 22 19 20.2091 19 18V8M14 11V17M10 11L10 17M16 5L14.5937 2.8906C14.2228 2.3342 13.5983 2 12.9296 2H11.0704C10.4017 2 9.7772 2.3342 9.40627 2.8906L8 5M16 5H8M16 5H21M8 5H3"
                                                            stroke="#F01543" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>


                                    <address>{{ __('translate.First Name') }} & {{ __('translate.Last Name') }} :<b>{{html_decode($addres->name)}}</b>
                                        <br>{{ __('translate.Email') }} :
                                        <a href="mailto:{{html_decode($addres->email)}}"><b>{{html_decode($addres->email)}}</b></a>
                                        <br>{{ __('translate.Phone') }} :
                                        <a href="tel:{{html_decode($addres->phone)}}"><b>{{html_decode($addres->phone)}}</b>
                                        </a>

                                        <br>{{ __('translate.Delivery Area') }} :
                                        <a href="javascript:;"><b>{{html_decode($addres->DeliveryArea->area_name)}}</b></a>
                                        <br>{{ __('translate.Address') }} :
                                        <a href="javascript:;"> <b>{{html_decode($addres->address)}}</b></a>
                                    </address>

                                </div>
                            </div>
                            @endforeach
                        </div>


                        <div class="row mt-30px">
                            <div class="col-lg-12">
                                <div class="delivery-time">


                                    <div class="delivery-from">

                                        <div class="delivery-text pb-3">
                                            <h4>{{ __('translate.Perfect Time for Delivery') }}</h4>
                                        </div>
                                        <div class="delivery-from-item pb-4 d-none">
                                            <label for="exampleFormControlInput1" class="form-label">{{ __('translate.Select Branch') }}</label>
                                            <select class="form-select" aria-label="Default select example" required name="branch">
                                                @foreach ($branchs as $branch)
                                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="delivery-from-item">
                                            <label for="exampleFormControlInput1" class="form-label">{{ __('translate.Select Day') }}</label>
                                            <select class="form-select" aria-label="Default select example" required name="delevery_day">
                                                <option value="today" selected="">{{ __('translate.Today') }}</option>
                                                <option value="tomorrow">{{ __('translate.Tomorrow') }}</option>
                                            </select>
                                        </div>
                                        <div class="delivery-from-item delivery-from-item-two ">
                                            <label for="exampleFormControlInput1" class="form-label">{{ __('translate.Select Time Schedule') }}</label>
                                            <select class="form-select" aria-label="Default select example" required name="delevery_time">
                                                <option disabled>{{ __('translate.Select') }}</option>
                                                @foreach ($slots as $slot)
                                                    <option value="{{$slot->id}}">{{$slot->slot}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-27px">
                        <div class="cart-summary-box">
                            <div class="cart-summary-box-text">
                                <h3>{{ __('translate.Cart Summary') }}</h3>
                            </div>

                            <div class="cart-summary-box-top-btn">

                                <ul>
                                    <li class="active"> <a href="{{route('checkout')}}" class="top-btn-two">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14 19V7M14 19H16M14 19H9M14 7C14 4.79086 12.2091 3 10 3H6C3.79086 3 2 4.79086 2 7V15C2 16.8652 3.27667 18.4323 5.00384 18.875M14 7H17.2091C17.7172 7 18.2063 7.1934 18.577 7.54093L21.3679 10.1574C21.7712 10.5355 22 11.0636 22 11.6165V17C22 18.1046 21.1046 19 20 19M20 19C20 20.1046 19.1046 21 18 21C16.8954 21 16 20.1046 16 19M20 19C20 17.8954 19.1046 17 18 17C16.8954 17 16 17.8954 16 19M9 19C9 20.1046 8.10457 21 7 21C5.89543 21 5 20.1046 5 19C5 18.958 5.00129 18.9163 5.00384 18.875M9 19C9 17.8954 8.10457 17 7 17C5.93742 17 5.06838 17.8286 5.00384 18.875"
                                                        stroke-width="1.5" />
                                                    <path d="M10 8L8 8" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 12L6 12" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>

                                            {{ __('translate.Delivery') }}
                                        </a></li>

                                    <li> <a href="{{route('pickup')}}" class="top-btn-two">
                                            <span>
                                                <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.1176 7.85603C14.1176 9.01319 13.0232 9.95126 11.6732 9.95126C10.3231 9.95126 9.22873 9.01319 9.22873 7.85603C9.22873 6.69886 10.3231 5.76079 11.6732 5.76079C13.0232 5.76079 14.1176 6.69886 14.1176 7.85603Z"
                                                        stroke-width="1.5" />
                                                    <path
                                                        d="M19.0065 7.85603C19.0065 11.3275 14.1176 16.237 11.6732 16.237C9.22873 16.237 4.33984 11.3275 4.33984 7.85603C4.33984 4.38452 7.62309 1.57031 11.6732 1.57031C15.7233 1.57031 19.0065 4.38452 19.0065 7.85603Z"
                                                        stroke-width="1.5" />
                                                    <path
                                                        d="M15.3412 14.1406H16.7181C18.169 14.1406 19.545 14.693 20.4738 15.6484L21.7779 16.9898C23.1047 18.3544 21.9725 20.4263 19.9 20.4263H3.44912C1.37662 20.4263 0.244465 18.3544 1.57124 16.9898L2.87532 15.6484C3.80418 14.693 5.18015 14.1406 6.63107 14.1406H8.0079"
                                                        stroke-width="1.5" stroke-linejoin="round" />
                                                </svg>
                                            </span>

                                            {{ __('translate.Pickup') }}
                                        </a></li>

                                    <li>
                                        <a href="{{route('inresturent')}}" class="top-btn-two">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.81965 22H16.1804C18.4891 22 20.3607 20.214 20.3607 18.0108V13.133C20.3607 12.4248 20.6555 11.7456 21.1803 11.2448C22.3962 10.0845 22.2381 8.16205 20.8475 7.19691L14.4588 2.763C12.9929 1.74567 11.0071 1.74567 9.54124 2.763L3.15251 7.19692C1.76187 8.16205 1.60381 10.0845 2.81969 11.2448C3.34447 11.7456 3.6393 12.4248 3.6393 13.133V18.0108C3.6393 20.214 5.5109 22 7.81965 22Z"
                                                        stroke-width="1.5" stroke-linejoin="round" />
                                                    <path
                                                        d="M16.3047 15.6052C16.3047 17.8875 14.1524 21.8039 12 21.8039C9.84766 21.8039 7.69531 17.8875 7.69531 15.6052C7.69531 13.3228 9.62259 11.4727 12 11.4727C14.3774 11.4727 16.3047 13.3228 16.3047 15.6052Z"
                                                        stroke-width="1.5" />
                                                    <path
                                                        d="M13.2914 15.3469C13.2914 16.0601 12.7132 16.6383 12 16.6383C11.2868 16.6383 10.7086 16.0601 10.7086 15.3469C10.7086 14.6337 11.2868 14.0555 12 14.0555C12.7132 14.0555 13.2914 14.6337 13.2914 15.3469Z"
                                                        stroke-width="1.5" />
                                                </svg>
                                            </span>

                                            {{ __('translate.In Restaurant') }}
                                        </a>
                                    </li>
                                </ul>


                            </div>

                            <div class="cart-summary-box-item-top">
                                @php
                                    $subtotal = 0;
                                @endphp
                                @foreach ($cart as $item)
                                    @php
                                        $product = App\Models\Product::where('status', 'active')->whereIn('id', [$item['product_id']])->first();
                                        $total = 0;
                                        $calculate = 0;
                                        $total = ($product['price'] * $item['qty']);
                                    @endphp
                                    <div class="cart-summary-box-item">
                                        <a href="javascript:;">
                                            <div class="cart-summary-box-inner">
                                                <div class="cart-summary-box-img">
                                                    <img  src="{{ asset($product['tumb_image']) }}" alt="img">
                                                </div>
                                                <div class="cart-summary-box-text-two">
                                                    <h4>{{ $product['name'] }}</h4>
                                                    <h5>
                                                        @if($item['size'])
                                                            <span>{{ __('translate.Size') }} :</span>
                                                        @endif
                                                        @foreach ($item['size'] as $size => $price)
                                                            {{ $size }}
                                                        @endforeach
                                                    </h5>
                                                    @if (is_array($item['addons']))
                                                    <p>
                                                        @if($item['addons'])
                                                        <span>{{ __('translate.Addon') }}:</span>
                                                        @endif
                                                        @foreach ($item['addons'] as $addonId => $quantity)
                                                                @php
                                                                    $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                                                @endphp
                                                                @if ($addonsDb->isNotEmpty())
                                                                    {{ $addonsDb->first()->name }}</span>|
                                                                @endif

                                                        @endforeach

                                                    </p>
                                                    @endif
                                                    <h5>
                                                        <div class="tabel-text">
                                                            @if ($product)
                                                                <h6><strong>{{ $setting->currency_icon }}{{ $total = $item['total'] }}</strong></h6>
                                                            @endif
                                                        </div>
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @php $subtotal += $total @endphp
                                @endforeach
                            </div>

                            <div class="apply-coupon">


                                <div class="apply-coupon-box">
                                    <div class="shopping-cart-list">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Sub Total') }}</h4>
                                            <a href="javascript:;">{{ $setting->currency_icon }}{{$subtotal }}</a>
                                        </div>
                                        <input type="hidden" name="total" value="{{$subtotal }}">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Discount') }}</h4>
                                            <a href="javascript:;">-{{ $setting->currency_icon }}{{0}}</a>
                                        </div>
                                        <input type="hidden" name="discount_amount" value="0">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Delivery Charge') }}</h4>
                                            <a href="javascript:;">+{{ $setting->currency_icon }}{{$deleveryCharge}}</a>
                                        </div>

                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Vat') }}</h4>
                                            <a href="javascript:;">+{{ $setting->currency_icon }}{{$vatChrg =  $subtotal * ($vatCharge/100)}}</a>
                                        </div>
                                        <input type="hidden" name="delevery_charge" value="{{$deleveryCharge }}">
                                        <input type="hidden" name="vat_charge" value="{{$vatChrg}}">
                                        <input type="hidden" name="type" value="delivery">
                                    </div>
                                    <div class="shopping-cart-list shopping-cart-list-btm ">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Grand Total') }}</h4>
                                            <a href="javascript:;">{{ $setting->currency_icon }}{{number_format($grand_total = (($subtotal-($subtotal * $discount))+$deleveryCharge+$vatChrg), 2) }}</a>
                                        </div>
                                        <input type="hidden" name="grand_total" value="{{$grand_total}}">
                                    </div>

                                    <div class="shopping-cart-list-btn">
                                        <button type="submit" class="main-btn-six">
                                            {{ __('translate.Process Order') }}
                                            <span>
                                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @foreach ($address as $index => $adrs)
    <div class="modal fade" id="exampleModal{{$adrs->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal-img-text">
                        <h3>{{ __('translate.Are you sure want to delete it?') }}</h3>
                    </div>

                    <div class="modal-btn">
                        <button type="button" class="no-btn" data-bs-dismiss="modal">{{ __('translate.No') }}
                        </button>
                        <a href="{{route('remove.address',$addres->id)}}">
                            <button type="button" class="no-btn yes-btn">{{ __('translate.Yes, Delete') }} </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach

         <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-five ">
                <div class="modal-content">
                    <div class="modal-body modal-body-five ">
                        <form action="{{route('add.new.address')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="shopping-cart-new-address-top-item">
                                        <div class="shopping-cart-new-address-taitel">
                                            <h4>{{ __('translate.Add new Address') }}</h4>
                                        </div>

                                        <div class="shopping-cart-new-address-top-btn">
                                            <a href="{{route('checkout')}}">
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5 8H15C17.2091 8 19 9.79086 19 12V12C19 14.2091 17.2091 16 15 16H5M5 8L9 5M5 8L9 11"
                                                            stroke="#394150" stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>

                                                {{ __('translate.Back') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="shopping-cart-new-address-from">
                                        <div class="shopping-cart-new-address-from-item">
                                            <div class="shopping-cart-new-address-from-inner">
                                                <label class="form-label">{{ __('translate.Delivery Area') }}</label>
                                                <select class="form-select" name="area_id" id="country" aria-label="Default select example">
                                                    <option value="" aria-readonly="true">{{ __('translate.Select Delivery Area') }}</option>
                                                    @foreach ($DeleveryAreas as $area)
                                                        <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="shopping-cart-new-address-from-item">
                                            <div class="shopping-cart-new-address-from-inner">
                                                <label class="form-label">{{ __('translate.First Name') }}</label>
                                                <input type="text" class="form-control"
                                                    id="exampleFormControlInput7" name="fname" value="{{old('fname')}}" >
                                            </div>
                                            <div class="shopping-cart-new-address-from-inner">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('translate.Last Name') }}</label>
                                                <input type="text" class="form-control"
                                                    id="exampleFormControlInput8"  name="lname" value="{{old('lname')}}" >
                                            </div>
                                        </div>
                                        <div class="shopping-cart-new-address-from-item">
                                            <div class="shopping-cart-new-address-from-inner">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('translate.Phone') }}</label>
                                                <input type="text" class="form-control"
                                                    id="exampleFormControlInput9"  name="phone" value="{{old('phone')}}" >
                                            </div>
                                            <div class="shopping-cart-new-address-from-inner">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('translate.Email') }}</label>
                                                <input type="email" class="form-control"
                                                    id="exampleFormControlInput10" name="email" value="{{old('email')}}" >
                                            </div>
                                        </div>

                                        <div class="shopping-cart-new-address-from-item">
                                            <div class="shopping-cart-new-address-from-inner">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('translate.Address') }}</label>
                                                <input type="text" class="form-control"
                                                    id="exampleFormControlInput11" name="address" value="{{old('address')}}" >
                                            </div>
                                        </div>
                                        <div class="shopping-cart-new-address-from-btn">
                                            <div class="check-btn">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        id="flexCheckDefault" name="address_type" value="home">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ __('translate.Home') }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        id="flexCheckDefault1" value="office" name="address_type">
                                                    <label class="form-check-label" for="flexCheckDefault1">
                                                        {{ __('translate.Office') }}
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="check-btn-two">
                                                <button type="submit" class="main-btn-four">{{ __('translate.Save Now') }}</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
   $(document).ready(function() {
        $("#country").change(function() {
            var countryId = $(this).val();
            $("#state").empty().append("<option value=''>{{ __('translate.Select State') }}</option>");
            $("#city").empty().append("<option value=''>{{ __('translate.Select City') }}</option>");
            if (countryId) {
                $.ajax({
                    type: "GET",
                    url: '{{ url("get-states") }}' + '?country_id=' + countryId,
                    success: function(res) {
                        if (res) {
                            $("#state").empty().append("<option value=''>{{ __('translate.Select State') }}</option>");
                            $.each(res, function(key, value) {
                                $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                        } else {
                            $("#state").empty();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", status, error);
                    }
                });
            } else {
                $("#state").empty().append("<option value=''>{{ __('translate.Select State') }}</option>");
                $("#city").empty().append("<option value=''>{{ __('translate.Select City') }}</option>");
            }
        });

        $("#state").change(function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    type: "GET",
                    url: '{{ url("get-cities") }}' + '?state_id=' + stateId,
                    success: function(res) {
                        if (res) {
                            $("#city").empty().append("<option value=''>{{ __('translate.Select City') }}</option>");
                            $.each(res, function(key, value) {
                                $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                        } else {
                            $("#city").empty();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", status, error);
                    }
                });
            } else {
                $("#city").empty();
            }
        });
    });

</script>

@endsection
