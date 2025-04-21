<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <style>
        @media print {
        .print_button {
            display:none!important;
            }
        }
    </style>
</head>

<body>

    <div class="" style="width: 350px">
        <div class="row">
            <div class="col-md-6 col-6">
                <a href="#"> <img class="sherah-logo__main" src="{{asset($setting->logo)}}" alt="#"></a>
            </div>
            <div class="col-md-6 col-6 text-right">
               <h2>OrderId #{{$order->id}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-12 text-right print_button">
                <a href="#" class="btn btn-success" onclick="window.print(); return false;">Print Invoice</a>
            </div>
            <div class="col-md-6 col-6">
                <h6 class="mb-3">Billing Information:</h6>
                <div>
                    <strong>{{html_decode($order->userName->name)}}</strong>
                </div>
                <div>Phone: {{html_decode($order->userName->phone)}}</div>
                <div>Delivery Area: {{html_decode($order->shippingAddress->DeliveryArea->area_name)}}</div>
                <div>Address: {{html_decode($order->userName->address)}}</div>
            </div>
            @if($order->address_id)
                <div class="col-md-6 col-6 text-right">
                    <h6 class="mb-3">Shipping Information :</h6>
                    <div>
                        <strong>{{html_decode($order->shippingAddress->name)}}</strong>
                    </div>
                    <div>Phone: {{html_decode($order->shippingAddress->phone)}}</div>
                    <div>Delivery Area: {{html_decode($order->shippingAddress->DeliveryArea->area_name)}}</div>
    
                    <div>Address: {{html_decode($order->shippingAddress->address)}}</div>
                </div>
            @endif
            <div class="col-md-6 col-6">
                <h6 class="mb-3">Payment Method:</h6>
                <div>{{$order->payment_method}} : <b>{{$order->payment_status}}</b></div>
                <div>OrderType: <strong>{{$order->type}}</strong></div>
            </div>
            <div class="col-md-6 col-6 text-right">
                <h6 class="mb-3">Order Status:</h6>
                <div>
                    @if($order->order_status == 0)
                    <b>Pending</b>
                    @endif
                    @if($order->order_status == 1)
                    <b>Accepted</b>
                    @endif
                    @if($order->order_status == 2)
                    <b>Confirmed</b>
                    @endif
                    @if($order->order_status == 3)
                    <b> Deliverd</b>
                    @endif
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th>Size</th>
                            <th class="right">Addons</th>
                            <th class="center">Price</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach ($OrderItem as $index => $item)
                            @php $product = App\Models\Product::where('id', $item->product_id)->first(); @endphp
                            <tr>
                                <td class="center">{{++$index}}</td>
                                <td class="left strong">{{$product->name}}</td>
                                <td class="left">
                                    @if($item['size'])
                                        @foreach ($item['size'] as $size => $price)
                                            {{ $size }}
                                        @endforeach
                                @endif
                                </td>
    
                                <td class="right">
                                    @if($item['addons'])
                                        @foreach ($item['addons'] as $addonId => $quantity)
                                            @php
                                                $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                            @endphp
                                            @if ($addonsDb->isNotEmpty())
                                                {{ $addonsDb->first()->name }} * {{$quantity}}<br>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td class="center">{{ $setting->currency_icon }}{{$item->total /$item->qty}} x {{$item->qty}}</td>
                                <td class="right">{{ $setting->currency_icon }}{{$subtotal = $item->total}}</td>
                            </tr>
                            @php $grandTotal += $subtotal @endphp
                        @endforeach
    
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 col-sm-5">
    
            </div>
    
            <div class="col-lg-4 col-sm-5 ml-auto">
                <table class="table table-clear">
                    <tbody>
                        <tr>
                            <td class="left">
                                <strong>Subtotal</strong>
                            </td>
                            <td class="right">$8.497,00</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Discount (20%)</strong>
                            </td>
                            <td class="right">$1,699,40</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>VAT (10%)</strong>
                            </td>
                            <td class="right">$679,76</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Total</strong>
                            </td>
                            <td class="right">
                                <strong>$7.477,36</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
    
            </div>
        </div>

    </div>
</body>

</html>
