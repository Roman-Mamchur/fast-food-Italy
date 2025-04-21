@if($orders->count() > 0)
    @foreach($orders as $order)
        <tr id="table{{$order->id}}">

            <td class="sherah-table__column-9 sherah-table__data-9">
                <div class="sherah-table__product-content">
                    <p class="sherah-table__product-desc">#{{$loop->iteration}}</p>
                </div>
            </td>


            <td class="sherah-table__column-1 sherah-table__data-1">
                <div class="sherah-language-form__input">
                    <p class="crany-table__product--number"><a data-id="{{$order->id}}" href="javascript:void(0)"
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

            @if($order->payment_status == 'pending')
                <td class="sherah-table__column-4 sherah-table__data-4">
                    <div class="sherah-table__product-content">
                        <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Pending</div>
                    </div>
                </td>
            @else
                <td class="sherah-table__column-4 sherah-table__data-4">
                    <div class="sherah-table__product-content">
                        <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Success</div>
                    </div>
                </td>
            @endif
            <td class="sherah-table__column-3 sherah-table__data-3">
                <p class="sherah-table__product-desc text-truncate">{{($order->payment_method == 'CashOnDelivery' ? 'Cash' : '')}}</p>
            </td>

        </tr>
    @endforeach
@else
    <tr>

        <td colspan="6">No records found</td>
    </tr>
@endif
