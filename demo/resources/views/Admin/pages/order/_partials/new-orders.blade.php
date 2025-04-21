@if($orders->count() > 0)
    @foreach($orders as $order)
        <tr id="table">

            <td class="sherah-table__column-9 sherah-table__data-9">
                <div class="sherah-table__product-content">
                    <p class="sherah-table__product-desc">#{{$loop->iteration}}</p>
                </div>
            </td>


            <td class="sherah-table__column-1 sherah-table__data-1">
                <div class="sherah-language-form__input">
                    <p class="crany-table__product--number"style="width: 100%;"><a style="width: 100%;" data-id="{{$order->id}}" href="javascript:void(0)"
                                                               class="sherah-color1 load-invoice">{{ $order->id }}</a>
                    </p>
                </div>
            </td>


            <td class="sherah-table__column-3 sherah-table__data-3">
                <p class="sherah-table__product-desc text-truncate">{{$order->created_at->format('M d, Y h:i A')}}</p>
            </td>


            @php
                // Fetch the time slot directly from the database using the DB facade
                $timeSlot = DB::table('time_slots')->where('id', $order->delevery_time_id)->first();
            @endphp
            <td class="sherah-table__column-3 sherah-table__data-3">
                <p class="sherah-table__product-desc text-truncate">{{ $timeSlot->slot ?? '' }}</p>
            </td>
            @if($ordersall == 1)
                @if($order->order_status == 4)
                    <td class="sherah-table__column-4 sherah-table__data-4">
                        <div class="sherah-table__product-content">
                            <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Cancel</div>
                        </div>
                    </td>
                @else
                    @if($order->order_status == 1 || $order->order_status == 2)
                        <td class="sherah-table__column-7 sherah-table__data-7">
                            <div class="sherah-table__product-content">
                                <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Accepted</div>
                            </div>
                        </td>
                    @elseif($order->order_status == 0)
                    <td class="sherah-table__column-4 sherah-table__data-4">
                        <div class="sherah-table__product-content">
                            <div class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">Pending</div>
                        </div>
                    </td>
                    @else
                        <td class="sherah-table__column-4 sherah-table__data-4">
                            <div class="sherah-table__product-content">
                                <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Complete {{$order->payment_status}}</div>
                            </div>
                        </td>
                    @endif
                @endif
            @endif
            <td class="sherah-table__column-3 sherah-table__data-3">
                <p class="sherah-table__product-desc text-truncate">{{($order->payment_method == 'CashOnDelivery' ? 'Cash' : 'Card')}}</p>
            </td>

        </tr>
    @endforeach
@else
    <tr>

        <td colspan="6">No records found</td>
    </tr>
@endif
