<?php $__env->startSection('title'); ?>
    <title><?php echo e($setting->app_name); ?> - <?php echo e(__('translate.Payment')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
            <h5 class="order-details-taitel"><?php echo e(__('translate.Order Details')); ?></h5>
            <div class="order-detils-top pb-3 pt-2">
                <p><?php echo e(__('translate.Order Id')); ?>: <span>#<?php echo e($order->id); ?></span></p>
                <p><?php echo e(__('Payment')); ?>: <span><?php echo e($order->payment_status); ?></span></p>
                <p><?php echo e(__('Order Type')); ?>: <span>
                    Pickup
                </span></p>
                <p><?php echo e(__('Note')); ?>: <span><?php echo e($order->note); ?></span></p>
                
            </div>
            <div class="order-details-main">
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('translate.Name')); ?></th>
                                <th><?php echo e(__('translate.Size')); ?></th>
                                <th><?php echo e(__('translate.Qty')); ?></th>
                                <th><?php echo e(__('translate.Price')); ?></th>
                                <th><?php echo e(__('Note')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $grandTotal = 0; ?>
                            <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $product = App\Models\Product::where('id',$item->product_id)->first();
                                ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($product->name); ?>

                                        <?php $__currentLoopData = $item['addons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addonId => $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                            ?>
                                            <?php if($addonsDb->isNotEmpty()): ?>
                                                <p><?php echo e($addonsDb->first()->name); ?> x <?php echo e($quantity); ?></p>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $item['size']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($size); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php echo e($item->qty); ?>

                                    </td>
                                    <td>
                                        <?php echo e($setting->currency_icon); ?><?php echo e($item->total); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->note); ?>

                                    </td>
                                </tr>
                                <?php $grandTotal += $item->total ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-5">
                        <table class="table tabel-two table-bordered">
                            <tbody>
                                <tr>
                                    <td><?php echo e(__('translate.Sub Total')); ?></td>
                                    <td><?php echo e($setting->currency_icon); ?><?php echo e($order->total - $order->discount_amounts); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('translate.Discount')); ?></td>
                                    <td><?php echo e($setting->currency_icon); ?><?php echo e($order->discount_amount); ?></td>
                                </tr>
                                
                                
                                <tr>
                                    <td><?php echo e(__('translate.Grand Total')); ?></td>
                                   <td><?php echo e($setting->currency_icon); ?><?php echo e($order->total); ?></td>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/Pages/order_detail.blade.php ENDPATH**/ ?>