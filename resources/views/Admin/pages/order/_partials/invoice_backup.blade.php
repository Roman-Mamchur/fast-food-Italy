<style>
    /* Regular styles for the table */
    .table-responsive-sm {
        width: 100%;
        margin-bottom: 20px;
    }

    .right {
        text-align: right;
    }

    .left {
        text-align: left;
    }

    #print-invoice td,     #print-invoice th{
        border: none;
        padding-top: 4px;
        padding-bottom: 4px;
    }
    /* Centering the content on the print page */
    @media print {
        #print-invoice{
            width: 270px;
            max-width: 270px;
            margin: 0 auto;
            text-align: center;
            align-items: center;
            visibility: visible;
        }

        #print-invoice td,     #print-invoice th{
            border: none;
            padding-top: 4px;
            padding-bottom: 4px;
        }
    }
</style>
<div id="print-invoice">

    <div class="row text-center justify-content-center my-3" style="text-align: center">
        <div class="col-md-6 col-6">
            <a href="#"> <img class="sherah-logo__main" src="{{asset($setting->logo)}}" alt="#"></a>
            <h6>{{$setting->app_name ?? ''}}</h6>
        </div>
    </div>
    <devider style="    border-bottom: 2px dotted #111 !important;
    margin: 15px 0px !important;
    width: 100%;
    display: block;" class="devider"></devider>




    <div class="row text-center justify-content-center my-2" style="text-align: center">

        <div class="col-12 py-1">
            <h6 class="">
                <div style="font-weight: 400">OrderType:
                    <strong>{{$order->type  == 'pickup' ? 'Collection' : 'COD'}}</strong>
                </div>
            </h6>
        </div>

        <div class=" col-12 py-1 text-right">
            <h6 style="font-weight: 400">Collect At:
                <b>{{date('d M Y H:i' , strtotime($order->created_at))}},</b>
            </h6>

        </div>

        <div class="col-12 py-1 text-right">
            <h6 style="font-weight: 400">Order Status:
                @if($order->order_status == 1)
                    <b>Not Paid</b>
                @endif
                @if($order->order_status == 2)
                    <b> Paid</b>
                @endif
            </h6>

        </div>

        <div class=" col-12 py-1 text-right">
            <h6 style="font-weight: 400">Order ID:
                <b>#{{$order->id}}</b>
            </h6>

        </div>

    </div>

    <devider style="    border-bottom: 2px dotted #111 !important;
    margin: 15px 0px !important;
    width: 100%;
    display: block;" class="devider"></devider>




    <div class="table-responsive-sm">
        <table class="">
            <thead>
            <tr class="py-1">
                <th>Item</th>
                <th class="right">Total</th>
            </tr>
            </thead>
            <tbody>
            @php $grandTotal = 0; $OrderItem = \App\Models\OrderItem::where('order_id',  $order->id)->get(); @endphp
            @if(isset($OrderItem))
                @foreach ($OrderItem as $index => $item)
                    @php $product = App\Models\Product::where('id', $item->product_id)->first(); @endphp
                    <tr class="py-1" style="text-align: center">
                        <td class="left strong"> {{$item->qty}} x {{$product->name ?? ''}}</td>

                        <td class="right">{{ $setting->currency_icon }}{{$subtotal = $item->total}}</td>
                    </tr>
                    @php $grandTotal += $subtotal @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <devider style="    border-bottom: 2px dotted #111 !important;
    margin: 15px 0px !important;
    width: 100%;
    display: block;" class="devider"></devider>




    <div class="row">
        <div class="col-12  ml-auto">
            <table class="" style="margin: unset">
                <tbody>
                <tr style="text-align: center">
                    @php
                        $discountAmount = ($order->discount_amount / 100) * $grandTotal;
                                   $newTotal = $grandTotal - $discountAmount;
                    @endphp
                    <td style="font-size: 15px" class="left py-1">
                        Discount ({{$order->discount_amount}}%)
                    </td>
                    <td style="font-size: 15px" class="right">{{$setting->currency_icon}} {{$discountAmount}}</td>
                </tr>

                <tr style="text-align: center">
                    <td style="font-size: 15px" class="left py-1">
                        Total
                    </td>
                    <td style="font-size: 15px" class="right">
                        <strong>{{ $setting->currency_icon }} {{$grandTotal}}</strong>
                    </td>
                </tr>

                </tbody>
            </table>

        </div>

        <div class="col-12">
            <h6 class="mg-btm-10">Note: </h6>
            <p style="font-size: 15px">All accounts are to be paid within 7 days from receipt of invoice. To
                be paid by cheque or credit card or direct payment online. If account is not paid within 7
                days
                <br> the credits details supplied as confirmation of work undertaken will be charged the
                agreed quoted fee noted above.</p>
        </div>
    </div>
    <devider style="    border-bottom: 2px dotted #111 !important;
    margin: 15px 0px !important;
    width: 100%;
    display: block;" class="devider"></devider>





    <div class="row text-center" style="text-align: center">

        <div class="col-12">
            <h6 class="mg-btm-10">Contact Info </h6>
            <h6 style="font-weight: 400" class="mg-btm-10">Phone: {{$setting->topbar_phone ?? '+353 62 54448'}}</h6>
            <h6 style="font-weight: 400" class="mg-btm-10">Email: {{$setting->topbar_email}}</h6>
        </div>
    </div>
    <devider style="    border-bottom: 2px dotted #111 !important;
    margin: 15px 0px !important;
    width: 100%;
    display: block;" class="devider"></devider>




</div>


<div class="row g-3 my-3">
    <div class="col-md-4">
        <a href="javascript:void(0)" data-id="{{$order->id}}" class="btn btn-warning cancel-order w-100">Cancel</a>
    </div>
    <div class="col-md-4"><a data-id="{{$order->id}}" href="javascript:void(0) " class="btn btn-danger delete-order w-100">Delete</a></div>
    <div class="col-md-4"><a id="printInvoice" href="javascript:void(0)" class="btn btn-primary w-100">Print</a></div>
</div>
