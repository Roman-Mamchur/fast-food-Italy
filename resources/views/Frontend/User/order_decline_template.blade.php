<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">

</head>

<body>
    Dear {{ $CustomerName }},

    We regret to inform you that your order #{{ $order->id }} placed on {{ $order->created_at }} has been canceled.

    If you have any questions or need further assistance, feel free to contact us

    We apologize for any inconvenience.
    Order Details 
    <div class="row justify-content-center">
        <div class="col-lg-12">
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
                                    <td style="border-bottom: 1px solid #000000;">{{ $index + 1 }}</td>
                                    <td style="border-bottom: 1px solid #000000;">{{$product->name}}
                                        @foreach ($item['addons'] as $addonId => $quantity)
                                            @php
                                                $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                            @endphp
                                            @if ($addonsDb->isNotEmpty())
                                                <p>{{ $addonsDb->first()->name }} x {{$quantity}}</p>
                                            @endif

                                        @endforeach
                                    </td>
                                    <td style="border-bottom: 1px solid #000000;">
                                        @foreach ($item['size'] as $size => $price)
                                            {{ $size }}
                                        @endforeach
                                    </td>
                                    <td style="border-bottom: 1px solid #000000;">
                                        {{$item->qty}}
                                    </td>
                                    <td style="border-bottom: 1px solid #000000;">
                                        € {{ number_format($item->total, 2)}}
                                    </td>
                                    <td style="border-bottom: 1px solid #000000;">
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
                                    <td style="border-bottom: 1px solid #000000;">{{ __('translate.Sub Total') }}</td>
                                    <td style="border-bottom: 1px solid #000000;">€ {{ number_format($order->total, 2) }}</td>
                                </tr>
                                {{-- <tr>
                                    <td>{{ __('translate.Delivery Charge') }} </td>
                                    <td>€ {{$order->delevery_charge}}</td>
                                </tr> --}}
                                {{-- <tr>
                                    <td>{{ __('translate.Vat') }}</td>
                                    <td>€ {{$order->vat_charge}}</td>
                                </tr> --}}
                                <tr>
                                    <td style="border-bottom: 1px solid #000000;">{{ __('translate.Grand Total') }}</td>
                                   <td style="border-bottom: 1px solid #000000;">€ {{ number_format($order->total, 2)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    Best regards,
    Midway Kebabish Team
</body>

</html>
