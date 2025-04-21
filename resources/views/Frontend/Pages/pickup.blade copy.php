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
                <form action="{{ route('checkout.order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7 col-md-6 ">
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
                                            {{-- <select class="form-select" aria-label="Default select example" required
                                                name="delevery_day">
                                                <option value="today" selected="">{{ __('translate.Today') }}</option>
                                                <option value="tomorrow">{{ __('translate.Tomorrow') }}</option>
                                            </select> --}}
                                            <input type="date" name="delevery_day" value="" class="form-control"
                                                id="delevery_day">
                                        </div>
                                        <div class="delivery-from-item col-md-6">
                                            <label for="exampleFormControlInput1"
                                                class="form-label">{{ __('translate.Select Time Schedule') }}</label>
                                            <select class="form-select" aria-label="Default select example" required
                                                name="delevery_time">
                                                <option disabled>{{ __('translate.Select') }}</option>

                                                @php
                                                    // Get the current time in 'h:i A' format (e.g., "06:00 AM")
                                                    $currentTime = \Carbon\Carbon::now('Europe/Dublin')->format(
                                                        'h:i A',
                                                    );
                                                @endphp

                                                @foreach ($slots as $slot)
                                                    @php
                                                        // Compare the current time with the slot time
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
                                @if (!auth()->user())
                                    <p>Have an account?</p>
                                    <a href="javascript:;" type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalLogin">
                                        {{ __('Sign up to create Account Or Log In') }}</a>
                                @else
                                    <a href="{{ route('logout') }}" type="button" class="">
                                        {{ __('Logout') }}</a>
                                    <i class="fas fa-sign-out"></i>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sign-up-from-inner">
                                            <label for="exampleFormControlInput1"
                                                class="form-label">{{ __('translate.Name') }}</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ auth()->user() ? auth()->user()->name : old('name') }}"
                                                id="exampleFormControlInput1">
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
                                    <div class="col-md-6">
                                        <div class="sign-up-from-inner">
                                            <label for="exampleFormControlInput2"
                                                class="form-label">{{ __('translate.Email') }}</label>
                                            <input type="email" class="form-control" name="email"
                                                id="exampleFormControlInput2"
                                                value="{{ auth()->user() ? auth()->user()->email : old('email') }}">
                                            @if ($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="delivery-text pb-3 text-center mt-2">
                                <h4>{{ __('translate.Payment') }}</h4>
                            </div>
                            <div class="delivery-from">
                                <ul class="">
                                    <li class="nav">
                                        <input type="radio" name="payment_method" class="form-check-input"
                                            value="pay_with_cash" required checked>
                                        <label class="form-check-label" style="margin-left: 10px;"
                                            for="flexCheckDefault">
                                            <img src="{{ asset($cash_payment->cash_image) }}" width="30"
                                                alt="img">
                                            Pay With Cash
                                        </label>
                                    </li>
                                    <li class="nav mt-2 justify-content-between">
                                        <div>
                                            <input type="radio" name="payment_method" class="form-check-input"
                                                value="pay_with_cash" required>
                                            <label class="form-check-label" style="margin-left: 10px;"
                                                for="flexCheckDefault">
                                                <img src="{{ asset($stripe->image) }}" width="50" alt="img">
                                            </label>
                                        </div>
                                        @php $gallery = App\Models\Gallery::get(); @endphp
                                        <div class="quick-line-btn-img">
                                            @foreach ($gallery as $gallery)
                                                @if ($gallery->id == 6 || $gallery->id == 7 || $gallery->id == 8)
                                                    <a href="#">
                                                        <img src="{{ asset($gallery['image']) }}" alt="img">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-5 pl-27px">
                            <div class="cart-summary-box">
                                <div class="cart-summary-box-text">
                                    <h3>{{ __('Order Summary') }}</h3>
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
                                                    Quantity
                                                </th>
                                                <th>
                                                    Price
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
                                                    <td>
                                                        @if ($product)
                                                            <h6><strong>{{ $setting->currency_icon }}{{ $total = $item['total'] }}</strong>
                                                            </h6>
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
                                            <button type="submit" class="main-btn-six">
                                                {{ __('Placed Order') }}
                                                <span>
                                                    <svg width="14" height="10" viewBox="0 0 14 10"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <input class="ecom-wc__form-input card-number" type="hidden" name="card_number"
                        placeholder="{{ __('translate.Card Number') }}" autocomplete="off">
                    <input class="ecom-wc__form-input card-expiry-month" type="hidden" name="month"
                        placeholder="{{ __('translate.Month') }}" autocomplete="off">
                    <input class="ecom-wc__form-input card-expiry-year" type="hidden" name="year"
                        placeholder="{{ __('translate.Year') }}" autocomplete="off">
                    <input class="ecom-wc__form-input card-cvc" type="hidden" name="cvc"
                        placeholder="{{ __('translate.CVV') }}">
                    <input class="ecom-wc__form-input stripeToken" type="hidden" name="stripeToken"
                        placeholder="{{ __('translate.CVV') }}">

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
                        <div class="payment-popup__top payment-popup__top--digital">
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
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group homec-form-input">
                                                    <input class="ecom-wc__form-input card-number" type="text"
                                                        name="card_number1"
                                                        placeholder="{{ __('translate.Card Number') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group homec-form-input">
                                                    <input class="ecom-wc__form-input card-expiry-month" type="text"
                                                        name="month1" placeholder="{{ __('translate.Month') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group homec-form-input">
                                                    <input class="ecom-wc__form-input card-expiry-year" type="text"
                                                        name="year1" placeholder="{{ __('translate.Year') }}"
                                                        autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group homec-form-input">
                                                    <input class="ecom-wc__form-input card-cvc" type="text"
                                                        name="cvc1" placeholder="{{ __('translate.CVV') }}">
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
                        </div>`
                    </div>

                </div>
            </div>
        </div>
    @endif

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script>
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
                    // $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                    const cardNumber = document.querySelector('input[name="card_number1"]').value;
                    const expiryMonth = document.querySelector('input[name="month1"]').value;
                    const expiryYear = document.querySelector('input[name="year1"]').value;
                    const cvc = document.querySelector('input[name="cvc1"]').value;

                    // Set the values to the hidden fields
                    document.querySelector('input[name="card_number"]').value = cardNumber;
                    document.querySelector('input[name="month"]').value = expiryMonth;
                    document.querySelector('input[name="year"]').value = expiryYear;
                    document.querySelector('input[name="cvc"]').value = cvc;
                    document.querySelector('input[name="stripeToken"]').value = token;
                }
            }

            /*====================================
                Payment Button
            ======================================*/

            // Add event listener to the bank button
            $('.payment-stripe-button').on("click", () => {
                $('.payment-popup__top--digital').toggleClass('active');
            });

            // Add event listener to the body
            $('body').on("click", (e) => {
                // Check if the clicked element is not the payment button or any of its children
                if (!$(e.target).is('.payment-popup') && e.target) {
                    // If not, remove the 'active' class from the payment popup
                    $('.payment-popup__top--digital').removeClass('active');
                }
            });


            // Add event listener to the modal body
            $('.payment-popup__top--digital').on("click", (e) => {
                // Stop the event from propagating up to the body element
                e.stopPropagation();
            });




            // Add event listener to the modal body
            $('.payment-popup__top--bank').on("click", (e) => {
                // Stop the event from propagating up to the body element
                e.stopPropagation();
            });


        });
    </script>
@endsection
