@extends('Frontend.Layouts.master')

@section('title')
    <title>{{ $setting->app_name }} - {{ __('translate.Checkout') }}</title>
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
                                <span>{{ __('translate.Checkout') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .typeO {
                font-size: 20px;
                font-weight: 700;
                line-height: 150%;
                letter-spacing: -0.24px;
                color: var(--heading-color);
                margin-right: 20px;
            }
        </style>

        <!-- banner  -->

        <!-- Shopping Cart  start -->
        <section class="shopping-cart-two shopping-cart-address ">
            <div class="container">
                <form action="{{ route('checkout.order') }}" id="checkoutForm" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 ">
                            <div class="delivery-time">
                                <div class="delivery-from">
                                    <div class="d-flex">
                                        <h4 class="typeO">Order Type</h4>
                                        <button class="btn btn-primary"
                                            style="background-color: var(--primary-color); color: #fff; border: none;">
                                            <span>
                                                <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                                    style="stroke: currentColor;  color: #fff;"
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

                                        </button>

                                    </div>

                                    <div class="delivery-text pb-3 mt-2">
                                        {{-- <h4>{{ __('translate.Perfect Time for Delivery') }}</h4> --}}
                                    </div>
                                    <div class="delivery-from-item pb-4 d-none">
                                        <label for="exampleFormControlInput1"
                                            class="form-label">{{ __('translate.Select Branch') }}</label>
                                        <select class="form-select" aria-label="Default select example" required
                                            name="branch">
                                            @foreach ($branchs as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="delivery-from-item col-md-6">
                                            <label for="delevery_day"
                                                class="form-label">{{ __('translate.Select Day') }}</label>
                                            <input type="date" name="delevery_day" value="" class="form-control"
                                                id="delevery_day" required
                                                min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                        </div>
                                        <div class="delivery-from-item col-md-6">
                                            <label for="delevery_time"
                                                class="form-label">{{ __('translate.Select Time Schedule') }}</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="delevery_time" id="delevery_time" required>
                                                <option value="">{{ __('translate.Select') }}</option>
                                                @php
                                                    $currentTime = \Carbon\Carbon::now('Europe/Dublin')->format(
                                                        'h:i A',
                                                    );
                                                @endphp
                                                @foreach ($slots as $slot)
                                                    @php
                                                        $slotTime = \Carbon\Carbon::createFromFormat(
                                                            'h:i A',
                                                            $slot->slot,
                                                        );
                                                    @endphp

                                                    @if ($slotTime >= \Carbon\Carbon::createFromFormat('h:i A', $currentTime))
                                                        <option value="{{ $slot->id }}" class="slot-option"
                                                            data-slot="{{ $slotTime }} -- {{ $currentTime }} ">
                                                            {{ $slot->slot }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="delivery-text pb-3 text-center mt-2">
                                <h4>{{ __('Your Information') }}</h4>
                            </div>
                            <div class="delivery-from">
                                {{-- @if (!auth()->user())
                                    <p>Have an account?</p>
                                    <a href="javascript:;" type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalLogin">
                                        {{ __('Sign up to create Account Or Log In') }}</a>
                                @else
                                    <a href="{{ route('logout') }}" type="button" class="">
                                        {{ __('Logout') }}</a>
                                    <i class="fas fa-sign-out"></i>
                                @endif --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sign-up-from-inner">
                                            <label for="name" class="form-label">{{ __('translate.Name') }}</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ auth()->user() ? auth()->user()->name : old('name') }}"
                                                id="name">
                                            @if ($errors->has('name'))
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="sign-up-from-inner">
                                            <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                            <div class="input-group">
                                                <input type="tel" class="form-control" name="phone" id="phone"
                                                    value="{{ auth()->user() ? auth()->user()->phone : old('phone') }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="sign-up-from-inner">
                                            <label for="email"
                                                class="form-label">{{ __('translate.Email') }}</label>
                                            <input type="email" class="form-control" name="email"
                                                id="email"
                                                value="{{ auth()->user() ? auth()->user()->email : old('email') }}">
                                            @if ($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                    </div> --}}

                                </div>

                            </div>
                            <div class="delivery-text pb-3 text-center mt-5">
                                <h4
                                    style="display: inline;
                    width: 100%;
                    background-color: var(--primary-color);
                    color: #fff;
                    padding: 10px;">
                                    {{ __('translate.Payment') }}</h4>
                            </div>
                            <div class="delivery-from">
                                <ul class="">
                                    @if (auth()->user())
                                        <li class="nav">
                                            <input type="radio" name="payment_method" id="payment_method"
                                                class="form-check-input" value="pay_with_cash" required checked>
                                            <label class="form-check-label" style="margin-left: 10px;"
                                                for="payment_method">
                                                <img src="{{ asset($cash_payment->cash_image) }}" width="30"
                                                    alt="img">
                                                Pay With Cash
                                            </label>
                                        </li>
                                    @endif
                                    <li class="nav mt-2 justify-content-between">
                                        <div>
                                            <input type="radio" name="payment_method" class="form-check-input"
                                                value="pay_with_cash" id="cardPayment" required
                                                @if (!auth()->user()) checked @endif>
                                            <label class="form-check-label" style="margin-left: 10px;" for="cardPayment">
                                                <img src="{{ asset($stripe->image) }}" width="30" alt="img">
                                                Pay With Card
                                            </label>
                                        </div>
                                        {{-- @php $gallery = App\Models\Gallery::get(); @endphp
                                        <div class="quick-line-btn-img">
                                            @foreach ($gallery as $gallery)
                                                @if ($gallery->id == 6 || $gallery->id == 7 || $gallery->id == 8)
                                                    <a href="#">
                                                        <img src="{{ asset($gallery['image']) }}" alt="img">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-6 pl-27px">
                            <div class="cart-summary-box">
                                <div class="cart-summary-box-text">
                                    <h3>{{ __('Your Order') }}</h3>
                                </div>

                                <div class="cart-summary-box-item-top">
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Item
                                                </th>
                                                <th>
                                                    Qty
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $item)
                                                @php
                                                    $product = App\Models\Product::where('status', 'active')
                                                        ->whereIn('id', [$item['product_id']])
                                                        ->first();
                                                    $total = 0;
                                                    $calculate = 0;
                                                    $total = $product['price'] * $item['qty'];
                                                @endphp
                                                <tr>
                                                    <td style="">{{ $product['name'] }}
                                                        @if ($item['size'])
                                                            <br>
                                                            <span>{{ __('translate.Size') }} :</span>
                                                        @endif
                                                        @foreach ($item['size'] as $size => $price)
                                                            {{ $size }}
                                                            @php $total = $total + ($price * $item['qty']) @endphp
                                                        @endforeach
                                                        @if (is_array($item['addons']))
                                                            <br <p>
                                                            @if ($item['addons'])
                                                                <span>{{ __('translate.Addon') }} :</span>
                                                            @endif
                                                            @foreach ($item['addons'] as $addonId => $quantity)
                                                                @php
                                                                    $addonsDb = App\Models\OptionalItem::whereIn('id', [
                                                                        $addonId,
                                                                    ])->get();
                                                                    $calculate += $addonsDb->first()->price * $quantity;
                                                                @endphp
                                                                @if ($addonsDb->isNotEmpty())
                                                                    {{ $addonsDb->first()->name }}</span>|
                                                                @endif
                                                            @endforeach

                                                            </p>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item['qty'] }}</td>
                                                    <td>{{ number_format($product['price'], 2) }}</td>
                                                    <td>
                                                        @if ($product)
                                                            <strong>{{ $setting->currency_icon }}{{ number_format($total = $item['total'], 2) }}</strong>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php $subtotal += $total; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <hr style="border-top: 1px dotted #000;"> --}}

                                {{-- <div class="apply-coupon">
                                <div class="apply-coupon-taitel">
                                    <h4>{{ __('translate.Apply Coupon') }}</h4>
                                </div>
                                <div class="apply-coupon-btn">
                                    <div class="apply-coupon-form">
                                        <input type="text" class="form-control" name="coupon" value="{{ old('name') }}" id="exampleFormControlInput8" placeholder="{{ __('translate.Type coupon') }}">
                                    </div>
                                    <div class="apply-coupon-btn-two">
                                        <button type="button" class="coupon-btn">{{ __('translate.Apply') }}</button>
                                    </div>
                                </div>
                            </div> --}}
                                <div class="apply-coupon">

                                    <div class="apply-coupon-box">
                                        <div class="shopping-cart-list">
                                            {{-- <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Sub Total') }}</h4>
                                            <a href="#">{{ $setting->currency_icon }}{{ $subtotal }}</a>
                                        </div> --}}
                                            <input type="hidden" name="total" value="{{ $subtotal }}">
                                            {{-- <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Discount') }}</h4>
                                            <a id="discount"
                                                href="#">-{{ $setting->currency_icon }}{{ $discount }}</a>
                                        </div> --}}
                                            <input type="hidden" id="discountValue" name="discount_amount"
                                                value="{{ $discount }}">
                                            <input type="hidden" name="delevery_charge" value="0">
                                            {{-- <input type="hidden" name="vat_charge" value="{{ $vatChrg }}"> --}}
                                            <input type="hidden" name="type" value="pickup">
                                        </div>
                                        {{-- <hr style="border-top: 1px dotted #000;"> --}}
                                        <div class="shopping-cart-list shopping-cart-list-btm ">
                                            <div class="shopping-cart-list-text">
                                                <h4>{{ __('translate.Grand Total') }}</h4>
                                                <a id="grandTotal"
                                                    href="#">{{ $setting->currency_icon }}{{ number_format($grand_total = $subtotal, 2) }}</a>
                                            </div>
                                            <input type="hidden" id="grandTotalValue" name="grand_total"
                                                value="{{ $grand_total }}">
                                        </div>
                                        <div>
                                            <div class="sign-up-from-inner">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label">{{ __('Note') }}</label>

                                                <textarea class="form-control" id="note" row="8" style="height: auto;" placeholder="Type here"
                                                    type="text" name="note"></textarea>

                                            </div>
                                        </div>

                                        <div class="shopping-cart-list-btn">
                                            <a href="{{ route('index') }}" class="main-btn-three mb-3">Add More Items</a>
                                            @if (!auth()->user())
                                                @if ($stripe->status)
                                                    <div class="shopping-payment-btn" id="stripCard"
                                                        style="display: block;">
                                                        <a href="javascript:;" class="main-btn-six pt-2"
                                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                            Place Order with Card
                                                        </a>
                                                    </div>
                                                @endif
                                            @else
                                                {{-- @if ($stripe->status) --}}
                                                <div class="shopping-payment-btn" id="stripCard" style="display: none;">
                                                    <a href="javascript:;" class="main-btn-six pt-2"
                                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                        Place Order with Card
                                                    </a>
                                                </div>
                                                {{-- @endif --}}
                                            @endif
                                            @if (Auth::user())
                                                <button type="submit" id="cashPay" class="main-btn-six hidePlace">
                                                    {{ __('Placed Order') }}
                                                    <span>
                                                        <svg width="14" height="10" viewBox="0 0 14 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        $('.coupon-btn').on('click', function() {
            const couponCode = document.querySelector('input[name="coupon"]').value;
            if (!couponCode) {
                alert("Please enter a coupon code.");
                return;
            }
            $.ajax({
                url: "{{ route('apply.coupon') }}",
                method: "POST",
                data: {
                    subtotal: {{ $subtotal }},
                    coupon: couponCode,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        // Update subtotal and grand total in the HTML
                        $('#discount').text(
                            `{{ $setting->currency_icon }}${response.discountAmount}`
                        );
                        $('#grandTotal').text(
                            `{{ $setting->currency_icon }}${response.discountAmount}`
                        );
                        $('#discountValue').val(response.discountAmount);
                        $('#grandTotalValue').val(response.discountTotal);

                        alert(response.message || "Coupon applied successfully!");
                    } else {
                        alert(response.message || "Failed to apply coupon.");
                    }
                },
                error: function(xhr) {
                    alert("An error occurred. Please try again.");
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
    @if ($stripe->status)
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{ __('translate.Payment with stripe') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @php $cards = \App\Models\Card::where('user_id', auth()->user()->id)->get(); @endphp
                        <ul class="cardList text-left">
                            @foreach ($cards as $card)
                                <li class="d-flex">
                                    <input type="radio" name="card" id="card_{{ $card->id }}"
                                        value="{{ $card->id }}" data-card-number="{{ decrypt($card->card_number) }}"
                                        data-expiry-month="{{ $card->month }}" data-expiry-year="{{ $card->year }}"
                                        data-cvc="{{ decrypt($card->cvc) }}" class="card-radio">
                                    <label class="form-check-label d-flex justify-content-between"
                                        for="card_{{ $card->id }}">
                                        {{ decrypt($card->card_number) }}</label> {{-- Display the masked card number --}}
                                </li>
                            @endforeach
                        </ul>
                        <ul class="text-left">
                            <li>
                                <a href="javascript:;" id="exampleCard">Add New Card</a>
                            </li>
                        </ul>
                        <div class="payment-popup__top payment-popup__top--digital d-none" style="display: none;">
                            <div class="payment-popup">
                                <div class="payment-popup__inner">
                                    <div class="payment-popup__header">
                                        {{-- <h4 class="payment-popup__heading">{{ __('translate.Total') }} : {{ $setting->currency_icon }}{{$order_total}}<b></b></h4> --}}
                                    </div>
                                    <!-- Sign in Form -->

                                    <form role="form" action="{{ route('pay-with-stripe') }}" method="POST"
                                        class="require-validation ecom-wc__form-main p-0" data-cc-on-file="false"
                                        data-stripe-publishable-key="{{ $stripe->stripe_key }}" id="payment-form">
                                        @csrf
                                        <input type="hidden" name="type1" value="pickup">
                                        <input type="hidden" name="delevery_time1" id="delevery_time1" value="">
                                        <input type="hidden" name="delevery_day1" id="delevery_day1" value="">
                                        <input type="hidden" name="note1" id="note1" value="">
                                        <input type="hidden" class="form-control" id="phone1" name="phone1"
                                            value="{{ auth()->user() ? auth()->user()->phone : old('phone') }}" required>
                                        <input type="hidden" class="form-control" id="email" name="email"
                                            value="{{ auth()->user() ? auth()->user()->email : old('email') }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group homec-form-input">
                                                    <input class="ecom-wc__form-input card-number" type="text"
                                                        name="card_number"
                                                        placeholder="{{ __('translate.Card Number') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group homec-form-input">
                                                    <input class="ecom-wc__form-input card-expiry-month" type="text"
                                                        name="month" placeholder="{{ __('translate.Month') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group homec-form-input">
                                                    <input class="ecom-wc__form-input card-expiry-year" type="text"
                                                        name="year" placeholder="{{ __('translate.Year') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group homec-form-input">
                                                    <input class="ecom-wc__form-input card-cvc" type="text"
                                                        name="cvc" placeholder="{{ __('translate.CVV') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 mg-top-20 pb-3">
                                                <button type="submit"
                                                    class="homec-btn homec-btn__second  homec-btn--payment"><span>{{ __('translate.Payment Now') }}</span></button>
                                            </div>
                                            <br>
                                            <div class="col-12 error alert alert-danger d-none">
                                                <div class="payment-popup__error">
                                                    {{ __('translate.Please provide your valid card information') }}</div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form style="display: none;" id="card-form" action="{{ route('card.add.detils') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" value="" name="card_id" required>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group homec-form-input">
                                            <input class="ecom-wc__form-input card-number" type="text"
                                                name="card_number" placeholder="{{ __('translate.Card Number') }}"
                                                autocomplete="off">
                                            <span class="text-danger error-card_number"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group homec-form-input">
                                            <input class="ecom-wc__form-input card-expiry-month" type="text"
                                                name="month" placeholder="{{ __('translate.Month') }}"
                                                autocomplete="off">

                                            <span class="text-danger error-month"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group homec-form-input">
                                            <input class="ecom-wc__form-input card-expiry-year" type="text"
                                                name="year" placeholder="{{ __('translate.Year') }}"
                                                autocomplete="off">
                                            <span class="text-danger error-year"></span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group homec-form-input">
                                            <input class="ecom-wc__form-input card-cvc" type="text" name="cvc"
                                                placeholder="{{ __('translate.CVV') }}">
                                            <span class="text-danger error-cvc"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 mg-top-20 pb-3">
                                        <button type="submit"
                                            class="homec-btn homec-btn__second  homec-btn--payment"><span>{{ __('Submit') }}</span></button>
                                    </div>


                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCard" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="exampleModalCardLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCardLabel">{{ __('Add Card') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
            </div>
        </div>
    @endif


    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script>
        $('#exampleCard').on('click', function() {
            $('#card-form').show();
            $('.payment-popup__top--digital').hide();
            $('#card-form')[0].reset();
            $('.card-cvc').val('');
            $('.card-expiry-year').val('');
            $('.card-expiry-month').val('');
            $('.card-number').val('');
        });
        $('#payment_method').on('click', function() {
            $('.shopping-payment-btn').hide();

            $('.hidePlace').show();
        });
        // $('#exampleModalCard').on('click', function() {
        //     $('#staticBackdrop').hide();
        // });
        $('#cardPayment').on('click', function() {
            $('.shopping-payment-btn').show();
            $('.hidePlace').hide();
            const delevery_day = $('#delevery_day').val();
            const delevery_time = $('#delevery_time').val();
            const name = $('#name').val();
            const email = $('#email').val();
            const phone = $('#phone').val();
            const note = $('#note').val();
            $('#delevery_day1').val(delevery_day);
            $('#delevery_time1').val(delevery_time);
            $('#name1').val(name);
            $('#email1').val(email);
            $('#phone1').val(phone);
            $('#note1').val(note);
            xx
        });
        const form = document.getElementById("payment-form");

        const stripCard = document.getElementById("stripCard");
        const cardNumberField = document.querySelector('.card-number');
        const expiryMonthField = document.querySelector('.card-expiry-month');
        const expiryYearField = document.querySelector('.card-expiry-year');

        // Prefill the form fields if data exists in localStorage
        if (localStorage.getItem('cardExpiryMonth')) {
            expiryMonthField.value = localStorage.getItem('cardExpiryMonth');
        }
        if (localStorage.getItem('cardExpiryYear')) {
            expiryYearField.value = localStorage.getItem('cardExpiryYear');
        }

        stripCard.disabled = form.checkValidity();
        // Listen to input events on the form
        form.addEventListener("input", () => {
            // Check if all required fields are filled and valid
            cashPay.disabled = !form.checkValidity();
            stripCard.disabled = !form.checkValidity();
        });
        "use strict"
        $(function() {


            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', (e) => {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    if (window.confirm(
                            'Do you want to save this card information for future use on this browser?')) {
                        localStorage.setItem('cardExpiryMonth', $('.card-expiry-month').val());
                        localStorage.setItem('cardExpiryYear', $('.card-expiry-year').val());
                    }
                    $form.get(0).submit();
                }
            }


            /*====================================
                Payment Button
            ======================================*/

            // Add event listener to the bank button
            // $('.payment-stripe-button').on("click", () => {
            //     $('.payment-popup__top--digital').toggleClass('active');
            // });

            // // Add event listener to the body
            // $('body').on("click", (e) => {
            //     // Check if the clicked element is not the payment button or any of its children
            //     if (!$(e.target).is('.payment-popup') && !$(e.target).is('.payment-stripe-button') && !$
            //         .contains($('.payment-stripe-button')[0], e.target)) {
            //         // If not, remove the 'active' class from the payment popup
            //         $('.payment-popup__top--digital').removeClass('active');
            //     }
            // });


            // Add event listener to the modal body
            $('.payment-popup__top--digital').on("click", (e) => {
                // Stop the event from propagating up to the body element
                e.stopPropagation();
            });

            // Add event listener to the bank button
            $('.payment-bank-button').on("click", (e) => {

            });

            // Add event listener to the body
            $('body').on("click", (e) => {
                // Check if the clicked element is not the bank button or any of its children
                if (!$(e.target).is('.payment-bank-button') && !$.contains($('.payment-bank-button')[0], e
                        .target)) {
                    // If not, remove the 'active' class from the bank popup
                    $('.payment-popup__top--bank').removeClass('active');
                }
            });


            // Add event listener to the modal body
            $('.payment-popup__top--bank').on("click", (e) => {
                // Stop the event from propagating up to the body element
                e.stopPropagation();
            });


        });
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("card-radio")) {
                if (event.target.checked) {
                    $('#card-form').hide();
                    $('.payment-popup__top--digital').removeClass('d-none');
                    $('.payment-popup__top--digital').css('display', 'block');
                    document.querySelector(".card-number").value = event.target.dataset.cardNumber;
                    alert(event.target.dataset.cardNumber);
                    document.querySelector(".card-expiry-month").value = event.target.dataset.expiryMonth;
                    document.querySelector(".card-expiry-year").value = event.target.dataset.expiryYear;
                    document.querySelector(".card-cvc").value = event.target.dataset.cvc;
                }
            }
        });
    </script>
    <script>
        $('#card-form').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            $('.text-danger').text('');
            let formData = $(this).serialize(); // Serialize form data
            let actionUrl = $(this).attr('action'); // Get form action URL

            $.ajax({
                url: actionUrl,
                type: "POST",
                data: formData,
                beforeSend: function() {
                    $('#submit-btn').prop('disabled', true).text("Submitting...");
                },
                success: function(response) {

                    $('.text-danger').text(''); // Reset form
                    $('#exampleModalCard').hide(); // Reset form
                    $('#card-form')[0].reset(); // Reset form
                    let cardList = $('.cardList');
                    cardList.empty(); // Clear the existing list

                    response.cards.forEach(card => {
                        let decryptedCardNumber = card
                        .card_number; // Adjust if needed based on decryption
                        let decryptedCVC = card.cvc;

                        let cardItem = `
                            <li class="d-flex">
                                <input type="radio" name="card" value="${card.id}"
                                    id="card_${card.id}"
                                    data-card-number="${decryptedCardNumber}"
                                    data-expiry-month="${card.month}"
                                    data-expiry-year="${card.year}"
                                    data-cvc="${decryptedCVC}"
                                    class="card-radio">
                                    <label class="form-check-label d-flex justify-content-between" for="card_${card.id}">
                                            ${decryptedCardNumber}</label>
                            </li>
                        `;

                        cardList.append(cardItem);
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('.error-' + key).text(value[
                                0]); // Display error under the corresponding input
                        });
                    } else {
                        alert("Something went wrong. Please try again.");
                    }
                }
            });
        });

        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger',
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    window.location.href = urlToRedirect;
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }
        $(document).on('click', '.edit-card-btn', function() {
            var cardId = $(this).data('id'); // Get card ID

            $.ajax({
                url: "{{ route('card.edit') }}", // Edit route
                type: "GET",
                data: {
                    id: cardId
                },
                success: function(response) {
                    if (response.success) {
                        // Fill input fields with response data
                        $('input[name="card_id"]').val(response.data.id);
                        $('input[name="card_number"]').val(response.data.card_number);
                        $('input[name="month"]').val(response.data.month);
                        $('input[name="year"]').val(response.data.year);
                        $('input[name="cvc"]').val(response.data.cvc);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection
