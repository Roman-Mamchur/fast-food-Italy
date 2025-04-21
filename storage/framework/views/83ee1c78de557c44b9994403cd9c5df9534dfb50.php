<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>">

</head>

<body>
    Dear <?php echo e($CustomerName); ?>,

    We regret to inform you that your order #<?php echo e($order->id); ?> placed on <?php echo e($order->created_at); ?> has been canceled.

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
                                    <td style="border-bottom: 1px solid #000000;"><?php echo e($index + 1); ?></td>
                                    <td style="border-bottom: 1px solid #000000;"><?php echo e($product->name); ?>

                                        <?php $__currentLoopData = $item['addons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addonId => $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                            ?>
                                            <?php if($addonsDb->isNotEmpty()): ?>
                                                <p><?php echo e($addonsDb->first()->name); ?> x <?php echo e($quantity); ?></p>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td style="border-bottom: 1px solid #000000;">
                                        <?php $__currentLoopData = $item['size']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($size); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td style="border-bottom: 1px solid #000000;">
                                        <?php echo e($item->qty); ?>

                                    </td>
                                    <td style="border-bottom: 1px solid #000000;">
                                        € <?php echo e(number_format($item->total, 2)); ?>

                                    </td>
                                    <td style="border-bottom: 1px solid #000000;">
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
                                    <td style="border-bottom: 1px solid #000000;"><?php echo e(__('translate.Sub Total')); ?></td>
                                    <td style="border-bottom: 1px solid #000000;">€ <?php echo e(number_format($order->total, 2)); ?></td>
                                </tr>
                                
                                
                                <tr>
                                    <td style="border-bottom: 1px solid #000000;"><?php echo e(__('translate.Grand Total')); ?></td>
                                   <td style="border-bottom: 1px solid #000000;">€ <?php echo e(number_format($order->total, 2)); ?></td>
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
<?php /**PATH /Applications/XAMPP/htdocs/food/resources/views/Frontend/User/order_decline_template.blade.php ENDPATH**/ ?>