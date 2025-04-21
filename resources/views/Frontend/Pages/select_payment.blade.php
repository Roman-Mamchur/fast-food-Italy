@extends('Frontend.Layouts.master')

@section('title')
    <title>{{$setting->app_name}} - {{ __('translate.Payment') }}</title>
@endsection

@section('content')
<style>
    .shopping-payment-btn img {
        width: 50px;
    }
</style>
<main>

    <!-- banner  -->

    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1>{{ __('translate.Payment') }}</h1>
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
                            <span>{{ __('translate.Payment') }}</span>
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
            <form action="{{route('checkout.order')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-7 ">
                        <div class="row shopping-payment-top ">
                            <div class="col-lg-6">
                                <div class="shopping-payment-btn">
                                    <form ></form>
                                    <a href="{{route('cashPay')}}">
                                        <span style="color: #000;">
                                            <img src="{{ asset($cash_payment->cash_image) }}" alt="img"> Pay With Cash
                                        </span>
                                    </a>
                                    <div class="btn-two">
                                        <span>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.9998 21.9997C17.0749 21.9997 21.9997 17.0749 21.9997 10.9998C21.9997 4.9248 17.0749 0 10.9998 0C4.9248 0 0 4.9248 0 10.9998C0 17.0749 4.9248 21.9997 10.9998 21.9997Z"
                                                    fill="#F01543" />
                                                <path
                                                    d="M10.1649 14.0454C9.87404 14.05 9.59324 13.9393 9.38386 13.7374L6.8759 11.2735C6.66731 11.0678 6.54897 10.7877 6.5469 10.4948C6.54484 10.2018 6.65923 9.92008 6.8649 9.71149C7.07057 9.5029 7.35068 9.38455 7.64361 9.38249C7.93654 9.38043 8.21829 9.49481 8.42688 9.70049L10.1649 11.4055L14.6748 7.00552C14.7781 6.90368 14.9004 6.82319 15.0348 6.76862C15.1692 6.71406 15.313 6.68651 15.4581 6.68753C15.6031 6.68855 15.7465 6.71813 15.8801 6.77458C16.0137 6.83103 16.1349 6.91324 16.2368 7.01652C16.3386 7.11981 16.4191 7.24214 16.4737 7.37653C16.5282 7.51092 16.5558 7.65475 16.5548 7.79979C16.5537 7.94483 16.5242 8.08826 16.4677 8.22187C16.4113 8.35548 16.3291 8.47666 16.2258 8.5785L10.9348 13.7814C10.7214 13.9646 10.4458 14.0591 10.1649 14.0454Z"
                                                    fill="#EDEBEA" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if($paypal_payment->status == 1)
                            <div class="col-lg-6">
                                <div class="shopping-payment-btn">
                                    <form ></form>
                                    <a href="{{route('paypal')}}">
                                        <span>
                                            <img src="{{ asset($paypal_payment->paypal_image) }}" alt="img">
                                        </span>
                                    </a>
                                    <div class="btn-two">
                                        <span>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.9998 21.9997C17.0749 21.9997 21.9997 17.0749 21.9997 10.9998C21.9997 4.9248 17.0749 0 10.9998 0C4.9248 0 0 4.9248 0 10.9998C0 17.0749 4.9248 21.9997 10.9998 21.9997Z"
                                                    fill="#F01543" />
                                                <path
                                                    d="M10.1649 14.0454C9.87404 14.05 9.59324 13.9393 9.38386 13.7374L6.8759 11.2735C6.66731 11.0678 6.54897 10.7877 6.5469 10.4948C6.54484 10.2018 6.65923 9.92008 6.8649 9.71149C7.07057 9.5029 7.35068 9.38455 7.64361 9.38249C7.93654 9.38043 8.21829 9.49481 8.42688 9.70049L10.1649 11.4055L14.6748 7.00552C14.7781 6.90368 14.9004 6.82319 15.0348 6.76862C15.1692 6.71406 15.313 6.68651 15.4581 6.68753C15.6031 6.68855 15.7465 6.71813 15.8801 6.77458C16.0137 6.83103 16.1349 6.91324 16.2368 7.01652C16.3386 7.11981 16.4191 7.24214 16.4737 7.37653C16.5282 7.51092 16.5558 7.65475 16.5548 7.79979C16.5537 7.94483 16.5242 8.08826 16.4677 8.22187C16.4113 8.35548 16.3291 8.47666 16.2258 8.5785L10.9348 13.7814C10.7214 13.9646 10.4458 14.0591 10.1649 14.0454Z"
                                                    fill="#EDEBEA" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($razorpay->status == 1)
                                <div class="col-lg-6 shopping-payment-btn-mt15px">
                                    <div class="shopping-payment-btn">
                                        <a href="javascript:;" id="razorpayBtn">
                                            <span>
                                                <img src="{{asset($razorpay->image)}}" alt="img">
                                            </span>
                                        </a>
                                        <div class="btn-two">
                                            <span>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.9998 21.9997C17.0749 21.9997 21.9997 17.0749 21.9997 10.9998C21.9997 4.9248 17.0749 0 10.9998 0C4.9248 0 0 4.9248 0 10.9998C0 17.0749 4.9248 21.9997 10.9998 21.9997Z"
                                                        fill="#F01543" />
                                                    <path
                                                        d="M10.1649 14.0454C9.87404 14.05 9.59324 13.9393 9.38386 13.7374L6.8759 11.2735C6.66731 11.0678 6.54897 10.7877 6.5469 10.4948C6.54484 10.2018 6.65923 9.92008 6.8649 9.71149C7.07057 9.5029 7.35068 9.38455 7.64361 9.38249C7.93654 9.38043 8.21829 9.49481 8.42688 9.70049L10.1649 11.4055L14.6748 7.00552C14.7781 6.90368 14.9004 6.82319 15.0348 6.76862C15.1692 6.71406 15.313 6.68651 15.4581 6.68753C15.6031 6.68855 15.7465 6.71813 15.8801 6.77458C16.0137 6.83103 16.1349 6.91324 16.2368 7.01652C16.3386 7.11981 16.4191 7.24214 16.4737 7.37653C16.5282 7.51092 16.5558 7.65475 16.5548 7.79979C16.5537 7.94483 16.5242 8.08826 16.4677 8.22187C16.4113 8.35548 16.3291 8.47666 16.2258 8.5785L10.9348 13.7814C10.7214 13.9646 10.4458 14.0591 10.1649 14.0454Z"
                                                        fill="#EDEBEA" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <form id="myForm" action="{{ route('pay-with-razorpay') }}" method="POST" class="d-none">
                                        @csrf
                                        @php


                                            $payable_amount =  $order_total * $razorpay->currency_rate;
                                            $payable_amount = round($payable_amount, 2);
                                        @endphp
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                data-key="{{ $razorpay->key }}"
                                                data-currency="{{ $razorpay->currency_code }}"
                                                data-amount= "{{ $payable_amount * 100 }}"
                                                data-buttontext="{{ __('translate.Pay') }} {{ $payable_amount }} {{ $razorpay->currency_code }}"
                                                data-name="{{ $razorpay->name }}"
                                                data-description="{{ $razorpay->description }}"
                                                data-image="{{ asset($razorpay->image) }}"
                                                data-prefill.name=""
                                                data-prefill.email=""
                                                data-theme.color="{{ $razorpay->color }}">
                                        </script>
                                    </form>
                                </div>
                            @endif


                            {{-- @if ($paystack->paystack_status == 1)
                            <div class="col-lg-6 shopping-payment-btn-mt15px">
                                <div class="shopping-payment-btn">
                                    <a onclick="payWithPaystack()" href="javascript:;">
                                        <span>
                                            <img src="{{ asset($paystack->paystack_image) }}" alt="img">
                                        </span>
                                    </a>
                                    <div class="btn-two">
                                        <span>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.9998 21.9997C17.0749 21.9997 21.9997 17.0749 21.9997 10.9998C21.9997 4.9248 17.0749 0 10.9998 0C4.9248 0 0 4.9248 0 10.9998C0 17.0749 4.9248 21.9997 10.9998 21.9997Z"
                                                    fill="#F01543" />
                                                <path
                                                    d="M10.1649 14.0454C9.87404 14.05 9.59324 13.9393 9.38386 13.7374L6.8759 11.2735C6.66731 11.0678 6.54897 10.7877 6.5469 10.4948C6.54484 10.2018 6.65923 9.92008 6.8649 9.71149C7.07057 9.5029 7.35068 9.38455 7.64361 9.38249C7.93654 9.38043 8.21829 9.49481 8.42688 9.70049L10.1649 11.4055L14.6748 7.00552C14.7781 6.90368 14.9004 6.82319 15.0348 6.76862C15.1692 6.71406 15.313 6.68651 15.4581 6.68753C15.6031 6.68855 15.7465 6.71813 15.8801 6.77458C16.0137 6.83103 16.1349 6.91324 16.2368 7.01652C16.3386 7.11981 16.4191 7.24214 16.4737 7.37653C16.5282 7.51092 16.5558 7.65475 16.5548 7.79979C16.5537 7.94483 16.5242 8.08826 16.4677 8.22187C16.4113 8.35548 16.3291 8.47666 16.2258 8.5785L10.9348 13.7814C10.7214 13.9646 10.4458 14.0591 10.1649 14.0454Z"
                                                    fill="#EDEBEA" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endif --}}

                            {{-- @if ($paystack->mollie_status == 1)
                                <div class="col-lg-6 shopping-payment-btn-mt15px">
                                    <div class="shopping-payment-btn">

                                        <a href="{{route('pay-with-mollie')}}">
                                            <span>
                                                <img src="{{ asset($paystack->mollie_image) }}" alt="img">
                                            </span>
                                        </a>
                                        <div class="btn-two">
                                            <span>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.9998 21.9997C17.0749 21.9997 21.9997 17.0749 21.9997 10.9998C21.9997 4.9248 17.0749 0 10.9998 0C4.9248 0 0 4.9248 0 10.9998C0 17.0749 4.9248 21.9997 10.9998 21.9997Z"
                                                        fill="#F01543" />
                                                    <path
                                                        d="M10.1649 14.0454C9.87404 14.05 9.59324 13.9393 9.38386 13.7374L6.8759 11.2735C6.66731 11.0678 6.54897 10.7877 6.5469 10.4948C6.54484 10.2018 6.65923 9.92008 6.8649 9.71149C7.07057 9.5029 7.35068 9.38455 7.64361 9.38249C7.93654 9.38043 8.21829 9.49481 8.42688 9.70049L10.1649 11.4055L14.6748 7.00552C14.7781 6.90368 14.9004 6.82319 15.0348 6.76862C15.1692 6.71406 15.313 6.68651 15.4581 6.68753C15.6031 6.68855 15.7465 6.71813 15.8801 6.77458C16.0137 6.83103 16.1349 6.91324 16.2368 7.01652C16.3386 7.11981 16.4191 7.24214 16.4737 7.37653C16.5282 7.51092 16.5558 7.65475 16.5548 7.79979C16.5537 7.94483 16.5242 8.08826 16.4677 8.22187C16.4113 8.35548 16.3291 8.47666 16.2258 8.5785L10.9348 13.7814C10.7214 13.9646 10.4458 14.0591 10.1649 14.0454Z"
                                                        fill="#EDEBEA" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            @endif --}}

                            {{-- @if ($instamojo->status == 1)
                                <div class="col-lg-6 shopping-payment-btn-mt15px">
                                    <div class="shopping-payment-btn">
                                        <a href="{{ route('pay-with-instamojo') }}">
                                            <span>
                                                <img src="{{asset($instamojo->image) }}" alt="img">
                                            </span>
                                        </a>
                                        <div class="btn-two">
                                            <span>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.9998 21.9997C17.0749 21.9997 21.9997 17.0749 21.9997 10.9998C21.9997 4.9248 17.0749 0 10.9998 0C4.9248 0 0 4.9248 0 10.9998C0 17.0749 4.9248 21.9997 10.9998 21.9997Z"
                                                        fill="#F01543" />
                                                    <path
                                                        d="M10.1649 14.0454C9.87404 14.05 9.59324 13.9393 9.38386 13.7374L6.8759 11.2735C6.66731 11.0678 6.54897 10.7877 6.5469 10.4948C6.54484 10.2018 6.65923 9.92008 6.8649 9.71149C7.07057 9.5029 7.35068 9.38455 7.64361 9.38249C7.93654 9.38043 8.21829 9.49481 8.42688 9.70049L10.1649 11.4055L14.6748 7.00552C14.7781 6.90368 14.9004 6.82319 15.0348 6.76862C15.1692 6.71406 15.313 6.68651 15.4581 6.68753C15.6031 6.68855 15.7465 6.71813 15.8801 6.77458C16.0137 6.83103 16.1349 6.91324 16.2368 7.01652C16.3386 7.11981 16.4191 7.24214 16.4737 7.37653C16.5282 7.51092 16.5558 7.65475 16.5548 7.79979C16.5537 7.94483 16.5242 8.08826 16.4677 8.22187C16.4113 8.35548 16.3291 8.47666 16.2258 8.5785L10.9348 13.7814C10.7214 13.9646 10.4458 14.0591 10.1649 14.0454Z"
                                                        fill="#EDEBEA" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            @endif --}}

                            @if ($stripe->status )
                                <div class="col-lg-6">
                                    <div class="shopping-payment-btn">

                                        <a href="javascript:;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <img src="{{asset($stripe->image)}}" alt="img">
                                        </a>
                                        <div class="btn-two">
                                            <span>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.9998 21.9997C17.0749 21.9997 21.9997 17.0749 21.9997 10.9998C21.9997 4.9248 17.0749 0 10.9998 0C4.9248 0 0 4.9248 0 10.9998C0 17.0749 4.9248 21.9997 10.9998 21.9997Z"
                                                        fill="#F01543" />
                                                    <path
                                                        d="M10.1649 14.0454C9.87404 14.05 9.59324 13.9393 9.38386 13.7374L6.8759 11.2735C6.66731 11.0678 6.54897 10.7877 6.5469 10.4948C6.54484 10.2018 6.65923 9.92008 6.8649 9.71149C7.07057 9.5029 7.35068 9.38455 7.64361 9.38249C7.93654 9.38043 8.21829 9.49481 8.42688 9.70049L10.1649 11.4055L14.6748 7.00552C14.7781 6.90368 14.9004 6.82319 15.0348 6.76862C15.1692 6.71406 15.313 6.68651 15.4581 6.68753C15.6031 6.68855 15.7465 6.71813 15.8801 6.77458C16.0137 6.83103 16.1349 6.91324 16.2368 7.01652C16.3386 7.11981 16.4191 7.24214 16.4737 7.37653C16.5282 7.51092 16.5558 7.65475 16.5548 7.79979C16.5537 7.94483 16.5242 8.08826 16.4677 8.22187C16.4113 8.35548 16.3291 8.47666 16.2258 8.5785L10.9348 13.7814C10.7214 13.9646 10.4458 14.0591 10.1649 14.0454Z"
                                                        fill="#EDEBEA" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            @endif

                            @if ($bankPayment->status == 1)
                                <div class="col-lg-6 shopping-payment-btn-mt15px">
                                    <div class="shopping-payment-btn">
                                    <a href="javascript:;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bankPayment">
                                            <span>
                                                <img src="{{asset($bankPayment->image) }}" alt="img">
                                            </span>
                                    </a>
                                        <div class="btn-two">
                                            <span>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.9998 21.9997C17.0749 21.9997 21.9997 17.0749 21.9997 10.9998C21.9997 4.9248 17.0749 0 10.9998 0C4.9248 0 0 4.9248 0 10.9998C0 17.0749 4.9248 21.9997 10.9998 21.9997Z"
                                                        fill="#F01543" />
                                                    <path
                                                        d="M10.1649 14.0454C9.87404 14.05 9.59324 13.9393 9.38386 13.7374L6.8759 11.2735C6.66731 11.0678 6.54897 10.7877 6.5469 10.4948C6.54484 10.2018 6.65923 9.92008 6.8649 9.71149C7.07057 9.5029 7.35068 9.38455 7.64361 9.38249C7.93654 9.38043 8.21829 9.49481 8.42688 9.70049L10.1649 11.4055L14.6748 7.00552C14.7781 6.90368 14.9004 6.82319 15.0348 6.76862C15.1692 6.71406 15.313 6.68651 15.4581 6.68753C15.6031 6.68855 15.7465 6.71813 15.8801 6.77458C16.0137 6.83103 16.1349 6.91324 16.2368 7.01652C16.3386 7.11981 16.4191 7.24214 16.4737 7.37653C16.5282 7.51092 16.5558 7.65475 16.5548 7.79979C16.5537 7.94483 16.5242 8.08826 16.4677 8.22187C16.4113 8.35548 16.3291 8.47666 16.2258 8.5785L10.9348 13.7814C10.7214 13.9646 10.4458 14.0591 10.1649 14.0454Z"
                                                        fill="#EDEBEA" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            @endif

                            @if ($flutterwave->status == 1)
                            <div class="col-lg-6 shopping-payment-btn-mt15px">
                                <div class="shopping-payment-btn">
                                    <a onclick="flutterwavePayment()" href="javascript:;">
                                        <span class="flutterwave">
                                            <img  src="{{ asset($flutterwave->logo) }}" alt="img">
                                        </span>
                                    </a>
                                    <div class="btn-two">
                                        <span>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.9998 21.9997C17.0749 21.9997 21.9997 17.0749 21.9997 10.9998C21.9997 4.9248 17.0749 0 10.9998 0C4.9248 0 0 4.9248 0 10.9998C0 17.0749 4.9248 21.9997 10.9998 21.9997Z"
                                                    fill="#F01543" />
                                                <path
                                                    d="M10.1649 14.0454C9.87404 14.05 9.59324 13.9393 9.38386 13.7374L6.8759 11.2735C6.66731 11.0678 6.54897 10.7877 6.5469 10.4948C6.54484 10.2018 6.65923 9.92008 6.8649 9.71149C7.07057 9.5029 7.35068 9.38455 7.64361 9.38249C7.93654 9.38043 8.21829 9.49481 8.42688 9.70049L10.1649 11.4055L14.6748 7.00552C14.7781 6.90368 14.9004 6.82319 15.0348 6.76862C15.1692 6.71406 15.313 6.68651 15.4581 6.68753C15.6031 6.68855 15.7465 6.71813 15.8801 6.77458C16.0137 6.83103 16.1349 6.91324 16.2368 7.01652C16.3386 7.11981 16.4191 7.24214 16.4737 7.37653C16.5282 7.51092 16.5558 7.65475 16.5548 7.79979C16.5537 7.94483 16.5242 8.08826 16.4677 8.22187C16.4113 8.35548 16.3291 8.47666 16.2258 8.5785L10.9348 13.7814C10.7214 13.9646 10.4458 14.0591 10.1649 14.0454Z"
                                                    fill="#EDEBEA" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>


                    <div class="col-lg-5">
                        <div class="cart-summary-box">
                            <div class="cart-summary-box-text">
                                <h3>{{ __('translate.Cart Summary') }}</h3>
                            </div>

                            <div class="cart-summary-box-top-btn">
                                <ul>
                                    {{-- <li @if($cart_data->type == 'delivery') class="active" @endif >
                                    <a href="{{route('checkout')}}" class="top-btn-two">
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
                                        </a>
                                    </li> --}}
                                <li @if($cart_data->type == 'pickup') class="active" @endif >
                                        <a href="{{route('checkout')}}" class="top-btn-two">
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
                                        </a>
                                    </li>
                                    {{-- <li @if($cart_data->type == 'inresturent') class="active" @endif >
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
                                    </li> --}}
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
                                                                <h6><strong>{{ $setting->currency_icon }}{{ $item['total'] }}</strong></h6>
                                                            @endif
                                                        </div>
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @php $subtotal += $total + $calculate; @endphp
                                @endforeach
                            </div>


                            <div class="apply-coupon">
                                <div class="apply-coupon-taitel">
                                    <h4>{{ __('translate.Apply Coupon') }}</h4>
                                </div>
                                <form action="{{ route('apply.coupon') }}" method="POST">
                                    @csrf
                                    <div class="apply-coupon-btn">
                                        <div class="apply-coupon-form">
                                            <input type="text" class="form-control" name="coupon" value="{{ old('name') }}" id="exampleFormControlInput8" placeholder="{{ __('translate.Type coupon') }}">
                                        </div>
                                        <div class="apply-coupon-btn-two">
                                            <button type="submit" class="coupon-btn">{{ __('translate.Apply') }}</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="apply-coupon-box">
                                    <div class="shopping-cart-list">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Sub Total') }}</h4>
                                            <a href="javascript:;">{{ $setting->currency_icon }}{{$cart_data->total }}</a>
                                        </div>
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Discount') }}</h4>
                                            <a href="javascript:;">-{{ $setting->currency_icon }}{{$cart_data->discount_amount }}</a>
                                        </div>
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Delivery Charge') }}</h4>
                                            <a href="javascript:;">+{{ $setting->currency_icon }}{{$cart_data->delevery_charge }}</a>
                                        </div>
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Vat') }}</h4>
                                            <a href="javascript:;">+{{ $setting->currency_icon }}{{$cart_data->vat_charge }}</a>
                                        </div>
                                    </div>
                                    <div class="shopping-cart-list shopping-cart-list-btm ">
                                        <div class="shopping-cart-list-text">
                                            <h4>{{ __('translate.Grand Total') }}</h4>
                                            <a href="javascript:;">{{ $setting->currency_icon }}{{$cart_data->grand_total }}</a>
                                        </div>
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

    @if ($stripe->status )
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <h4 class="payment-popup__heading">{{ __('translate.Total') }} : {{ $setting->currency_icon }}{{$order_total}}<b></b></h4>
                    </div>
                    <!-- Sign in Form -->

                        <form role="form" action="{{ route('pay-with-stripe') }}" method="POST" class="require-validation ecom-wc__form-main p-0" data-cc-on-file="false" data-stripe-publishable-key="{{ $stripe->stripe_key }}" id="payment-form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group homec-form-input">
                                        <input class="ecom-wc__form-input card-number" type="text" name="card_number" placeholder="{{ __('translate.Card Number') }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group homec-form-input">
                                        <input class="ecom-wc__form-input card-expiry-month" type="text" name="month" placeholder="{{ __('translate.Month') }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group homec-form-input">
                                        <input class="ecom-wc__form-input card-expiry-year" type="text" name="year" placeholder="{{ __('translate.Year') }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group homec-form-input">
                                        <input class="ecom-wc__form-input card-cvc" type="text" name="cvc" placeholder="{{ __('translate.CVV') }}">
                                    </div>
                                </div>
                                <div class="col-12 mg-top-20 pb-3">
                                    <button type="submit" class="homec-btn homec-btn__second  homec-btn--payment"><span>{{ __('translate.Payment Now') }}</span></button>
                                </div>
                                <br>
                                <div class="col-12 error alert alert-danger d-none">
                                    <div class="payment-popup__error">{{ __('translate.Please provide your valid card information') }}</div>
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

    <!-- Modal -->
    <div class="modal fade" id="bankPayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">{{ __('translate.Payment with bank') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="payment-popup">
            {!! nl2br($bankPayment->account_info) !!}
            <div class="payment-popup__inner">
                <div class="payment-popup__header">
                    <h4 class="payment-popup__heading">{{ __('translate.Total') }} : {{ $setting->currency_icon }}{{$order_total}}<b></b></h4>
                </div>
                <ul class="payment-popup__bank-list">

                </ul>
                <!-- Sign in Form -->
                <form class="ecom-wc__form-main p-0"  method="post" action="{{ route('bank-payment') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group homec-form-input">
                                <textarea rows="4" class="ecom-wc__form-input" type="text" name="tnx_info" placeholder="{{ __('translate.Transaction information') }}"></textarea>
                            </div>

                        </div>
                        <div class="col-12 mg-top-20">
                            <button type="submit" class=" btn--payment"><span>{{ __('translate.Submit Now') }}</span></button>
                        </div>
                    </div>
                </form>
                <!-- End Sign in Form -->
            </div>
        </div>
        <!-- End Payment Popup -->
            </div>

        </div>
        </div>
    </div>



</main>


{{-- start stripe payment --}}
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script>
        "use strict"
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', (e)=>{
                var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                    'input[type=text]', 'input[type=file]',
                                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
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
                    $form.get(0).submit();
                }
            }

            $("#razorpayBtn").on("click", function(){

                $("#myForm").submit();
            });

            $("#molliBtn").on("click", function(){

                $("#molliform").submit();
            });
            /*====================================
                Payment Button
            ======================================*/

            // Add event listener to the bank button
            $('.payment-stripe-button').on( "click", ()=>{
                $('.payment-popup__top--digital').toggleClass('active');
            });

            // Add event listener to the body
            $('body').on("click", (e)=>{
                // Check if the clicked element is not the payment button or any of its children
                if (!$(e.target).is('.payment-popup') && !$(e.target).is('.payment-stripe-button') && !$.contains($('.payment-stripe-button')[0], e.target)) {
                    // If not, remove the 'active' class from the payment popup
                    $('.payment-popup__top--digital').removeClass('active');
                }
            });


            // Add event listener to the modal body
            $('.payment-popup__top--digital').on("click", (e)=>{
                // Stop the event from propagating up to the body element
                e.stopPropagation();
            });

            // Add event listener to the bank button
            $('.payment-bank-button').on("click", (e)=>{

            });

            // Add event listener to the body
            $('body').on("click", (e)=>{
                // Check if the clicked element is not the bank button or any of its children
                if (!$(e.target).is('.payment-bank-button') && !$.contains($('.payment-bank-button')[0], e.target)) {
                    // If not, remove the 'active' class from the bank popup
                    $('.payment-popup__top--bank').removeClass('active');
                }
            });


            // Add event listener to the modal body
            $('.payment-popup__top--bank').on("click", (e)=>{
                // Stop the event from propagating up to the body element
                e.stopPropagation();
            });


        });
    </script>
    {{-- end stripe payment --}}

    {{-- start flutterwave payment --}}
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    @php
        $payable_amount = $order_total * $flutterwave->currency_rate;
        $payable_amount = round($payable_amount, 2);
        $user = Auth::user();
    @endphp

    <script>
        "use strict"
        function flutterwavePayment() {

            FlutterwaveCheckout({
                public_key: "{{ $flutterwave->public_key }}",
                tx_ref: "{{ substr(rand(0,time()),0,10) }}",
                amount: {{ $payable_amount }},
                currency: "{{ $flutterwave->currency_code }}",
                country: "{{ $flutterwave->country_code }}",
                payment_options: " ",
                customer: {
                email: "{{ $user->email }}",
                phone_number: "{{ $user->phone }}",
                name: "{{ $user->name }}",
                },
                callback: function (data) {
                    var tnx_id = data.transaction_id;
                    var _token = "{{ csrf_token() }}";
                    $.ajax({
                        type: 'post',
                        data : {tnx_id,_token},
                        url: "{{ url('pay-with-flutterwave') }}",
                        success: function (response) {
                            if(response.status == 'success'){
                                toastr.success(response.message);
                                window.location.href = response.redirect_url;
                            }else{
                                toastr.error(response.message);
                                window.location.reload();
                            }
                        },
                        error: function(err) {

                        }
                    });
                },
                customizations: {
                title: "{{ $flutterwave->title }}",
                logo: "{{ asset($flutterwave->logo) }}",
                },
            });
        }
    </script>
    {{-- end flutterwave payment --}}

    {{-- paystack start --}}

    <script src="https://js.paystack.co/v1/inline.js"></script>
    @php
        $public_key = $paystack->paystack_public_key;
        $currency = $paystack->paystack_currency_code;
        $currency = strtoupper($currency);

        $ngn_amount = $order_total * $paystack->paystack_currency_rate;
        $ngn_amount = $ngn_amount * 100;
        $ngn_amount = round($ngn_amount);
    @endphp
    <script>
        "use strict"
        function payWithPaystack(){
            var isDemo = "{{ env('APP_MODE') }}"
            if(isDemo == 'DEMO'){
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }

            var handler = PaystackPop.setup({
                key: '{{ $public_key }}',
                email: '{{ Auth::User()->email }}',
                amount: '{{ $ngn_amount }}',
                currency: "{{ $currency }}",
                callback: function(response){
                let reference = response.reference;
                let tnx_id = response.transaction;
                let _token = "{{ csrf_token() }}";
                $.ajax({
                    type: "get",
                    data: {reference, tnx_id, _token},
                    url: "{{ url('pay-with-paystack') }}",
                    success: function(response) {
                        if(response.status == 'success'){
                            toastr.success(response.message);
                            window.location.href = response.redirect_url;
                        }else{
                            toastr.error(response.message);
                            window.location.reload();
                        }
                    },
                    error: function(response){
                            toastr.error('Server Error');
                            window.location.reload();
                    }
                });
                },
                onClose: function(){
                    alert('window closed');
                }
            });
            handler.openIframe();

        }
    </script>

{{-- end paystack --}}

@endsection
