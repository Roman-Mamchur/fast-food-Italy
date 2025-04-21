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
                    <div class="col-lg-7 col-md-6 ">
                        <div class="delivery-time">
                            <div class="delivery-map">
                                <iframe
                                    src="{{$contact->google_map}}"
                                    width="380" height="380"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>



                            <div class="delivery-addres">
                                <p><span>{{ __('translate.Address') }} :</span>{{$contact->address}}</p>

                                <a href="tel:{{$contact->phone}}" class="main-btn-four">
                                    <span>
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.5 19V17.3541C21.5 16.5363 21.0021 15.8008 20.2428 15.4971L18.2086 14.6835C17.2429 14.2971 16.1422 14.7156 15.677 15.646L15.5 16C15.5 16 13 15.5 11 13.5C9 11.5 8.5 9 8.5 9L8.85402 8.82299C9.78438 8.35781 10.2029 7.25714 9.81654 6.29136L9.00289 4.25722C8.69916 3.4979 7.96374 3 7.14593 3H5.5C4.39543 3 3.5 3.89543 3.5 5C3.5 13.8366 10.6634 21 19.5 21C20.6046 21 21.5 20.1046 21.5 19Z" stroke-width="1.5" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    {{ __('translate.Call Restaurant') }}
                                </a>

                            </div>
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
                                <div class="delivery-from-item delivery-from-item-two ">
                                    <label for="exampleFormControlInput1" class="form-label">{{ __('translate.Number of guest') }}</label>
                                    <select class="form-select" aria-label="Default select example" required name="number_of_gest">
                                        <option disabled>{{ __('translate.Select') }}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
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
                                    <li> <a href="{{route('checkout')}}" class="top-btn-two">
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

                                    <li class="active">
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
                                        <a href="#">
                                            <div class="cart-summary-box-inner">
                                                <div class="cart-summary-box-img">
                                                    <img src="{{ asset($product['tumb_image']) }}" alt="img">
                                                </div>
                                                <div class="cart-summary-box-text-two">
                                                    <h4>{{ $product['name'] }}</h4>
                                                    <h5>
                                                        @if($item['size'])
                                                        <span>{{ __('translate.Size') }} :</span>
                                                        @endif
                                                        @foreach ($item['size'] as $size => $price)
                                                            {{ $size }}
                                                            @php $total = $total + ($price * $item['qty']) @endphp
                                                        @endforeach
                                                    </h5>
                                                    @if (is_array($item['addons']))
                                                    <p>
                                                        @if($item['addons'])
                                                        <span>{{ __('translate.Addon') }} :</span>
                                                        @endif
                                                        @foreach ($item['addons'] as $addonId => $quantity)
                                                                @php
                                                                    $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                                                    $calculate += ($addonsDb->first()->price * $quantity);
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
                                    @php $subtotal += $total; @endphp
                                @endforeach
                            </div>

                            <div class="apply-coupon">

                                <div class="apply-coupon-box">
                                    <div class="shopping-cart-list">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Sub Total') }}</h4>
                                            <a href="#">{{ $setting->currency_icon }}{{$subtotal }}</a>
                                        </div>
                                        <input type="hidden" name="total" value="{{$subtotal }}">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Discount') }}</h4>
                                            <a href="#">-{{ $setting->currency_icon }}{{$subtotal * $discount }}</a>
                                        </div>
                                        <input type="hidden" name="discount_amount" value="{{$subtotal * $discount }}">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Delivery Charge') }}</h4>
                                            <a href="#">+{{ $setting->currency_icon }}{{$deleveryCharge}}</a>
                                        </div>

                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Vat') }}</h4>
                                            <a href="#">+{{ $setting->currency_icon }}{{$vatChrg =  $subtotal * ($vatCharge/100)}}</a>
                                        </div>
                                        <input type="hidden" name="delevery_charge" value="{{$deleveryCharge }}">
                                        <input type="hidden" name="vat_charge" value="{{$vatChrg}}">
                                        <input type="hidden" name="type" value="inresturent">
                                    </div>
                                    <div class="shopping-cart-list shopping-cart-list-btm ">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Grand Total') }}</h4>
                                            <a href="#">{{ $setting->currency_icon }}{{number_format($grand_total = (($subtotal-($subtotal * $discount))+$deleveryCharge+$vatChrg), 2) }}</a>
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

@endsection
