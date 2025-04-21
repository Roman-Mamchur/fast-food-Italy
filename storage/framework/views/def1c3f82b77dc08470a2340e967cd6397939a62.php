<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Invoice')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main>

    <!-- banner  -->
    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1><?php echo e(__('translate.Invoice')); ?></h1>
                    </div>

                    <div class="inner-banner-item">
                        <div class="left">
                            <a href="<?php echo e(route('index')); ?>"><?php echo e(__('translate.Dashboard')); ?></a>
                        </div>
                        <div class="icon">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 7L14 12L10 17" stroke="#E5E6EB" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="left">
                            <span><?php echo e(__('translate.Invoice')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner  -->

    <!-- dashboard  start -->
    <section class="dashboard">
        <div class="container">
            <div class="row">
                <?php echo $__env->make('Frontend.User.sideber', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <div class="col-lg-9 col-md-8 ">


                    <div class="dashboard-item-taitel">
                        
                        <p><?php echo e(__('translate.Invoice')); ?></p>
                    </div>


                    
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <h3 class="text-center">Your Order Has been Received </h3>
                            <h5 class="order-details-taitel"><?php echo e(__('translate.Order Details')); ?></h5>
                            <div class="order-detils-top pb-3 pt-2">
                                <p><?php echo e(__('translate.Order Id')); ?>: <span>#<?php echo e($order->id); ?></span></p>
                                <p><?php echo e(__('Payment')); ?>: <span><?php if($order->payment_status == 'Pending'): ?> Paid with Cash <?php else: ?> Paid with Card <?php endif; ?></span></p>
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
                                            <?php $__currentLoopData = $OrderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                            <?php echo $size; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e($item->qty); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($setting->currency_icon); ?><?php echo e(number_format($item->total, 2)); ?>

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
                                                    <td><?php echo e($setting->currency_icon); ?><?php echo e(number_format($order->total - $order->discount_amounts, 2)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo e(__('translate.Discount')); ?></td>
                                                    <td><?php echo e($setting->currency_icon); ?><?php echo e(number_format($order->discount_amount, 2)); ?></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td><?php echo e(__('translate.Grand Total')); ?></td>
                                                   <td><?php echo e($setting->currency_icon); ?><?php echo e(number_format($order->total, 2)); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dashboard end  -->

    <!-- Restaurant part-start -->
        <?php echo $__env->make('Frontend.User.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Restaurant part-end -->



</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/User/order_detils.blade.php ENDPATH**/ ?>