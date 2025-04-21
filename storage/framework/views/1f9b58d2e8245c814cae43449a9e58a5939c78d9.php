<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>">
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
                <a href="#"> <img class="sherah-logo__main" src="<?php echo e(asset($setting->logo)); ?>" alt="#"></a>
            </div>
            <div class="col-md-6 col-6 text-right">
               <h2>OrderId #<?php echo e($order->id); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-12 text-right print_button">
                <a href="#" class="btn btn-success" onclick="window.print(); return false;">Print Invoice</a>
            </div>
            <div class="col-md-6 col-6">
                <h6 class="mb-3">Billing Information:</h6>
                <div>
                    <strong><?php echo e(html_decode($order->userName->name)); ?></strong>
                </div>
                <div>Phone: <?php echo e(html_decode($order->userName->phone)); ?></div>
                <div>Delivery Area: <?php echo e(html_decode($order->shippingAddress->DeliveryArea->area_name)); ?></div>
                <div>Address: <?php echo e(html_decode($order->userName->address)); ?></div>
            </div>
            <?php if($order->address_id): ?>
                <div class="col-md-6 col-6 text-right">
                    <h6 class="mb-3">Shipping Information :</h6>
                    <div>
                        <strong><?php echo e(html_decode($order->shippingAddress->name)); ?></strong>
                    </div>
                    <div>Phone: <?php echo e(html_decode($order->shippingAddress->phone)); ?></div>
                    <div>Delivery Area: <?php echo e(html_decode($order->shippingAddress->DeliveryArea->area_name)); ?></div>
    
                    <div>Address: <?php echo e(html_decode($order->shippingAddress->address)); ?></div>
                </div>
            <?php endif; ?>
            <div class="col-md-6 col-6">
                <h6 class="mb-3">Payment Method:</h6>
                <div><?php echo e($order->payment_method); ?> : <b><?php echo e($order->payment_status); ?></b></div>
                <div>OrderType: <strong><?php echo e($order->type); ?></strong></div>
            </div>
            <div class="col-md-6 col-6 text-right">
                <h6 class="mb-3">Order Status:</h6>
                <div>
                    <?php if($order->order_status == 0): ?>
                    <b>Pending</b>
                    <?php endif; ?>
                    <?php if($order->order_status == 1): ?>
                    <b>Accepted</b>
                    <?php endif; ?>
                    <?php if($order->order_status == 2): ?>
                    <b>Confirmed</b>
                    <?php endif; ?>
                    <?php if($order->order_status == 3): ?>
                    <b> Deliverd</b>
                    <?php endif; ?>
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
                        <?php $grandTotal = 0; ?>
                        <?php $__currentLoopData = $OrderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $product = App\Models\Product::where('id', $item->product_id)->first(); ?>
                            <tr>
                                <td class="center"><?php echo e(++$index); ?></td>
                                <td class="left strong"><?php echo e($product->name); ?></td>
                                <td class="left">
                                    <?php if($item['size']): ?>
                                        <?php $__currentLoopData = $item['size']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($size); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </td>
    
                                <td class="right">
                                    <?php if($item['addons']): ?>
                                        <?php $__currentLoopData = $item['addons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addonId => $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                            ?>
                                            <?php if($addonsDb->isNotEmpty()): ?>
                                                <?php echo e($addonsDb->first()->name); ?> * <?php echo e($quantity); ?><br>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <td class="center"><?php echo e($setting->currency_icon); ?><?php echo e($item->total /$item->qty); ?> x <?php echo e($item->qty); ?></td>
                                <td class="right"><?php echo e($setting->currency_icon); ?><?php echo e($subtotal = $item->total); ?></td>
                            </tr>
                            <?php $grandTotal += $subtotal ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
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
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/pages/order/invoice.blade.php ENDPATH**/ ?>