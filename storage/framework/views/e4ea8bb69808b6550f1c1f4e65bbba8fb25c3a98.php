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

    #print-invoice td,
    #print-invoice th {
        border: none;
        padding-top: 2px;
        padding-bottom: 2px;
    }

    /* @page { */
    /* size: A4; */
    /* Standard A4 paper size */
    /* margin: 10mm; */
    /* Reduce margins to save space */
    /* } */

    /* Centering the content on the print page */
    @media print {
        #print-invoice {
            width: 270px;
            max-width: 270px;
            margin: 0 auto;
            text-align: center;
            align-items: center;
            visibility: visible;
            overflow: hidden;
            transform: scale(1);
            /* Scale down the content */
            transform-origin: top left;
            /* Start scaling from the top-left */
        }

        #print-invoice td,
        #print-invoice th {
            border: none;
        }

        /* Prevent page breaks inside the content */
    }

    a.btn {
        font-size: 14px;
    }

    #print-invoice th,
    #print-invoice td {
        text-align: left;
        border: unset !important;

    }

    @media only screen and (min-width: 992px) and (max-width: 1530px) {
        a.btn {
            font-size: 12px;
        }
    }
</style>
<div class="card cardinvoice"  data-row="table<?php echo e($order->id); ?>" data-id="<?php echo e($order->id); ?>>

    <div class="card-body ">


        <div id="print-invoice">

            <div class="row text-center justify-content-center my-1" style="text-align: center">
                <div class="row align-items-center">
               
                    
                    <h5 class="mt-1">Midway Kebabish</h5>
                    <p style="font-size: 11px; font-weight: 600;">Barrack Street Bansha, Co. Tipperary.</p>
                    <p style="font-size: 13px; font-weight: 600;">Phone: 062 54448</p>
                    <p style="font-size: 11px;">www.midwaykebabish.ie</p>
                </div>
            </div>
            <devider
                style="border-bottom: 2px dotted #111 !important;
                margin: 5px 0px !important;
                width: 100%;
                display: block;"
                class="devider"></devider>


            <div class="row text-center justify-content-center" style="text-align: center">

                <div class="col-12 ">
                    Order ID: <b>#<?php echo e($order->id); ?></b>
                    <h6 class="">
                        <div style="font-weight: 400">
                            <strong><?php echo e($order->type == 'pickup' ? 'Collection' : 'COD'); ?> At</strong>
                        </div>
                    </h6>
                </div>

                <div class=" col-12  text-right">
                    <?php
                        // Fetch the time slot directly from the database using the DB facade
                        $timeSlot = DB::table('time_slots')->where('id', $order->delevery_time_id)->first();
                    ?>
                    <h6 style="font-weight: 400"><b><?php echo e(date('d M Y', strtotime($order->created_at))); ?>,
                            <?php echo e($timeSlot->slot ?? ''); ?></b>
                    </h6>

                </div>

                <div class="col-12  text-right">
                    <h6 style="font-weight: 400">Paid By:
                        <b><?php echo e($order->payment_method == 'CashOnDelivery' ? 'Cash' : 'Card'); ?></b>
                    </h6>

                </div>


            </div>

            <devider
                style="    border-bottom: 2px dotted #111 !important;
    margin: 5px 0px !important;
    width: 100%;
    display: block;"
                class="devider"></devider>


            <div class="table-responsive-sm">
                <table class="">
                    <thead>
                        <tr class="">
                            <th style="background-color: unset; text-align: left;   width: 200px;" colspan="4"
                                class="left text-dark">Item
                            </th>
                            <th style="background-color: unset;" colspan="2" class="right text-dark">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $grandTotal = 0;
                            $OrderItem = \App\Models\OrderItem::where('order_id', $order->id)->get();
                        ?>
                        <?php if(isset($OrderItem)): ?>
                            <?php $__currentLoopData = $OrderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $product = App\Models\Product::where('id', $item->product_id)->first(); ?>
                                <tr class="">
                                    <td colspan="4" style="  width: 200px;" class="left strong">
                                        <?php echo e($item->qty); ?>

                                        x <?php echo e($product->name ?? ''); ?> - <?php $__currentLoopData = $item['size']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $size; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->note != ''): ?>
                                            Notes:<?php echo e($item->note); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td colspan="2" class="right">
                                        <?php echo e($setting->currency_icon); ?><?php echo e($subtotal = number_format($item->total, 2)); ?>

                                    </td>
                                </tr>
                                <?php $grandTotal += $subtotal ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <devider
                style="    border-bottom: 2px dotted #111 !important;
    margin: 5px 0px !important;
    width: 100%;
    display: block;"
                class="devider"></devider>


            <div class="row">
                <div class="col-12  ml-auto">
                    <table class="" style="margin: unset">
                        <tbody>
                    

                            <tr>
                                <td style="font-size: 15px !important;  text-align: left;   width: 200px;"
                                    class="left ">
                                    Total
                                </td>
                                <td style="font-size: 15px !important;" class="right">
                                    <strong><?php echo e($setting->currency_icon); ?><?php echo e(number_format($grandTotal, 2)); ?></strong>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                <?php if(!empty($order->note)): ?>
                    <div class="col-12">
                        <h6 class="mg-btm-10">Note: <p style="font-size: 15px !important; display: inline;">
                                <?php echo e($order->note ?? ''); ?>.</p>
                        </h6>
                    </div>
                <?php endif; ?>
            </div>
            <devider
                style="border-bottom: 2px dotted #111 !important;
                    margin: 15px 0px !important;
                    width: 100%;
                    display: block;"
                class="devider"></devider>


            <div class="row text-center" style="text-align: center">

                <div class="col-12">
                    <h6 class="mg-btm-10">Contact Info </h6>
                    <h6 style="font-weight: 400" class="mg-btm-10">Name: <?php echo e($user->name ?? ''); ?></h6>
                    <h6 style="font-weight: 400" class="mg-btm-10">Phone: <?php echo e($user->phone ?? ''); ?></h6>
                    <h6 style="font-weight: 400" class="mg-btm-10">Email: <?php echo e($user->email); ?></h6>
                </div>
            </div>


        </div>

        <div class="row g-1">
            <?php if($order->order_status == 4 && $order->payment_method != 'CashOnDelivery'): ?>
                <div class="col-md-4">
                    <a style="background-color: teal;" href="<?php echo e(route('refund-amount', $order->id)); ?>"
                        data-id="<?php echo e($order->id); ?>" class="btn text-white w-100"
                        onclick="return alert('Error: The payment gateway for this order does not support automatic refunds.');">Refund</a>
                </div>
            <?php else: ?>
            <?php endif; ?>

            <?php if($order->order_status != 1): ?>
                <?php if($order->order_status == 4): ?>
                    
                    <div class="col-md-4"><a id="printInvoice" href="javascript:void(0)"
                            class="btn btn-primary w-100">Print</a>
                    </div>
                <?php else: ?>
                    <div class="col-md-4">
                        <a data-row="table<?php echo e($order->id); ?>" style="background-color: #ff3333;"
                            href="javascript:void(0)" data-id="<?php echo e($order->id); ?>"
                            class="btn text-white cancel-order w-100">Cancel</a>
                    </div>
                    <div class="col-md-6"><a data-row="table<?php echo e($order->id); ?>" style="background-color: #4caf50;"
                            data-id="<?php echo e($order->id); ?>" href="javascript:void(0) " 
                            class="btn accept-order text-white w-100">Accept and Print</a></div>

                            
                <?php endif; ?>
            <?php else: ?>
                <?php if($order->created_at->toDateString() >= \Carbon\Carbon::today()->toDateString()): ?>
                    <div class="col-md-4">
                        <a data-row="table<?php echo e($order->id); ?>" style="background-color: #ff3333;"
                            href="javascript:void(0)" data-id="<?php echo e($order->id); ?>"
                            class="btn text-white cancel-order w-100">Cancel</a>
                    </div>
                <?php endif; ?>
                
                <div class="col-md-4"><a id="printInvoice" href="javascript:void(0)"
                        class="btn btn-primary w-100">Print</a>
                </div>
            <?php endif; ?>


        </div> 

    </div>
</div>
<?php /**PATH /Applications/XAMPP/htdocs/food/resources/views/Admin/pages/order/_partials/invoice.blade.php ENDPATH**/ ?>