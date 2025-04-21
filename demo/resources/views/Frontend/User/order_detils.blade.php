@extends('Frontend.Layouts.master')
@section('title')
    <title>{{ __('translate.Invoice') }}</title>
@endsection

@section('content')
<main>

    <!-- banner  -->
    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1>{{ __('translate.Invoice') }}</h1>
                    </div>

                    <div class="inner-banner-item">
                        <div class="left">
                            <a href="{{route('index')}}">{{ __('translate.Dashboard') }}</a>
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
                            <span>{{ __('translate.Invoice') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner  -->

    <!-- dashboard  start -->
    <section class="dashboard">
        <div class="container">
            <div class="row">
                @include('Frontend.User.sideber')


                <div class="col-lg-9 col-md-8 ">


                    <div class="dashboard-item-taitel">
                        {{-- <h4>{{ __('translate.Dashboard') }}</h4> --}}
                        <p>{{ __('translate.Invoice') }}</p>
                    </div>


                    {{-- <div class="row ">
                        <div class="col-lg-12">
                            <div class="order-details-main">
                                <h4 class="order-details-taitel">{{ __('translate.Order Details') }}</h4>

                                <div class="order-detils-top pb-3 pt-2">
                                    <p>{{ __('translate.Order Id') }}: <span>#{{$order->id}}</span></p>
                                    @if($order->address_id)
                                    <p>{{ __('translate.Delivery Area') }}: <span>{{html_decode($order->shippingAddress->DeliveryArea->area_name)}}</span></p>
                                    <p>{{ __('translate.Address') }}: <span>{{html_decode($order->shippingAddress->address)}}</span></p>
                                    @endif
                                    <p>{{ __('translate.Payment Status') }}: <span>{{$order->payment_status}}</span></p>
                                    <p>{{ __('translate.Order Status') }}: <span>
                                        @if($order->order_status == 1)
                                        {{ __('translate.Pending') }}
                                        @endif
                                        @if($order->order_status == 2)
                                        {{ __('translate.Proccessing') }}
                                        @endif
                                        @if($order->order_status == 3)
                                        {{ __('translate.Confimred') }}
                                        @endif
                                    </span></p>
                                    <p>{{ __('translate.Type') }}: <span>{{$order->type}}</span></p>
                                </div>

                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('translate.Image') }}</th>
                                                <th>{{ __('translate.Name') }}</th>
                                                <th>{{ __('translate.Size') }}</th>
                                                <th>{{ __('translate.Addons') }}</th>
                                                <th>{{ __('translate.Qty') }}</th>
                                                <th>{{ __('translate.Price') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $grandTotal = 0; @endphp
                                            @foreach ($OrderItem as $index => $item)
                                                @php
                                                    $product = App\Models\Product::where('id',$item->product_id)->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td><img src="{{ asset($product['tumb_image']) }}" alt="{{ $item->name }}" ></td>
                                                    <td>{{$product->name}}</td>
                                                    <td>
                                                        @foreach ($item['size'] as $size => $price)
                                                            {{ $size }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($item['addons'] as $addonId => $quantity)
                                                            @php
                                                                $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                                            @endphp
                                                            @if ($addonsDb->isNotEmpty())
                                                                <p>{{ $addonsDb->first()->name }} x {{$quantity}}</p>
                                                            @endif

                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {{$item->qty}}
                                                    </td>
                                                    <td>
                                                        {{ $setting->currency_icon }}{{$item->total}}
                                                    </td>
                                                </tr>
                                                @php $grandTotal += $item->total @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row justify-content-end  ">
                                    <div class="col-lg-6">
                                        <table class="table tabel-two table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>{{ __('translate.Sub Total') }}</td>
                                                    <td>{{ $setting->currency_icon }}{{ $grandTotal }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('translate.Discount') }}</td>
                                                    <td>{{ $setting->currency_icon }}{{$order->discount_amount}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('translate.Delivery Charge') }} </td>
                                                    <td>{{ $setting->currency_icon }}{{$order->delevery_charge}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('translate.Vat') }}</td>
                                                    <td>{{ $setting->currency_icon }}{{$order->vat_charge}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('translate.Grand Total') }}</td>
                                                   <td>{{ $setting->currency_icon }}{{$order->grand_total}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <h3 class="text-center">Your Order Has been Received </h3>
                            <h5 class="order-details-taitel">{{ __('translate.Order Details') }}</h5>
                            <div class="order-detils-top pb-3 pt-2">
                                <p>{{ __('translate.Order Id') }}: <span>#{{$order->id}}</span></p>
                                <p>{{ __('Payment') }}: <span>@if($order->payment_status == 'Pending') Not Paid @else Paid @endif</span></p>
                                <p>{{ __('Order Type') }}: <span>
                                    Pickup
                                </span></p>
                                <p>{{ __('Note') }}: <span>{{$order->note}}</span></p>
                                {{-- <p>{{ __('translate.Type') }}: <span>{{$order->type}}</span></p> --}}
                            </div>
                            <div class="order-details-main">
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('translate.Name') }}</th>
                                                <th>{{ __('translate.Size') }}</th>
                                                <th>{{ __('translate.Qty') }}</th>
                                                <th>{{ __('translate.Price') }}</th>
                                                <th>{{ __('Note') }}</th>
                                            </tr>
                                        </thead>
                
                                        <tbody>
                                            @php $grandTotal = 0; @endphp
                                            @foreach ($OrderItem as $index => $item)
                                                @php
                                                    $product = App\Models\Product::where('id',$item->product_id)->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{$product->name}}
                                                        @foreach ($item['addons'] as $addonId => $quantity)
                                                            @php
                                                                $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                                            @endphp
                                                            @if ($addonsDb->isNotEmpty())
                                                                <p>{{ $addonsDb->first()->name }} x {{$quantity}}</p>
                                                            @endif
                
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($item['size'] as $size => $price)
                                                            {{ $size }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {{$item->qty}}
                                                    </td>
                                                    <td>
                                                        {{ $setting->currency_icon }}{{ number_format($item->total, 2)}}
                                                    </td>
                                                    <td>
                                                        {{$item->note}}
                                                    </td>
                                                </tr>
                                                @php $grandTotal += $item->total @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-md-5">
                                        <table class="table tabel-two table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>{{ __('translate.Sub Total') }}</td>
                                                    <td>{{ $setting->currency_icon }}{{ number_format($order->total - $order->discount_amounts, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('translate.Discount') }}</td>
                                                    <td>{{ $setting->currency_icon }}{{ number_format($order->discount_amount, 2)}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td>{{ __('translate.Delivery Charge') }} </td>
                                                    <td>{{ $setting->currency_icon }}{{$order->delevery_charge}}</td>
                                                </tr> --}}
                                                {{-- <tr>
                                                    <td>{{ __('translate.Vat') }}</td>
                                                    <td>{{ $setting->currency_icon }}{{$order->vat_charge}}</td>
                                                </tr> --}}
                                                <tr>
                                                    <td>{{ __('translate.Grand Total') }}</td>
                                                   <td>{{ $setting->currency_icon }}{{ number_format($order->total, 2)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dashboard end  -->

    <!-- Restaurant part-start -->
        @include('Frontend.User.app')
    <!-- Restaurant part-end -->



</main>

@endsection
