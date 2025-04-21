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
            <div class="inner-banner-head text-center">
                <h1>Thank You!</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h3 class="text-center">Your Order Has been Received </h3>
            <h5 class="order-details-taitel">{{ __('translate.Order Details') }}</h5>
            <div class="order-detils-top pb-3 pt-2">
                <p>{{ __('translate.Order Id') }}: <span>#{{$order->id}}</span></p>
                <p>{{ __('Payment') }}: <span>{{$order->payment_status}}</span></p>
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
                            @foreach ($orderItems as $index => $item)
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
                                            {!! $size !!}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$item->qty}}
                                    </td>
                                    <td>
                                        {{ $setting->currency_icon }}{{number_format($item->total, 2)}}
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
                                    <td>{{ $setting->currency_icon }}{{ $order->total - $order->discount_amounts }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('translate.Discount') }}</td>
                                    <td>{{ $setting->currency_icon }}{{ $order->discount_amount}}</td>
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
                                   <td>{{ $setting->currency_icon }}{{number_format($order->total, 2)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

</main>

@endsection
