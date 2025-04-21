@if($orders->count() > 0)
    @foreach($orders as $order)
        <tr>
            <td class="sherah-table__column-1 sherah-table__data-1">
                <div class="sherah-language-form__input">
                    <p class="crany-table__product--number"><a data-id="{{$order->id}}" href="javascript:void(0)"
                                                               class="sherah-color1 load-invoice">SR#{{ $loop->iteration }}</a></p>
                </div>
            </td>
            <td class="sherah-table__column-9 sherah-table__data-9">
                <div class="sherah-table__product-content">
                    <p class="sherah-table__product-desc">{{$order->id}}</p>
                </div>
            </td>

            <td class="sherah-table__column-3 sherah-table__data-3">
                <p class="sherah-table__product-desc">{{$order->created_at->format('M d, Y h:i A')}}</p>
            </td>
            @if($order->order_status == 0)
                <td class="sherah-table__column-7 sherah-table__data-7">
                    <div class="sherah-table__status sherah-color2 sherah-color4__bg--opactity">New</div>
                </td>
            @endif

            @if($order->order_status == 1)
                <td class="sherah-table__column-7 sherah-table__data-7">
                    <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Pending</div>
                </td>
            @endif
            @if($order->order_status == 2)
                <td class="sherah-table__column-7 sherah-table__data-7">
                    <div class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">Confirmed</div>
                </td>
            @endif
            @if($order->order_status == 3)
                <td class="sherah-table__column-3 sherah-table__data-3">
                    <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Deliverd</div>
                </td>
            @endif
            @if($order->order_status == 4)
                <td class="sherah-table__column-3 sherah-table__data-3">
                    <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Declined</div>
                </td>
            @endif
        </tr>
    @endforeach
    @endif
