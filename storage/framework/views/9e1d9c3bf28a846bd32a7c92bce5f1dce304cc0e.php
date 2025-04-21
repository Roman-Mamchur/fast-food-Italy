<?php if($orders->count() > 0): ?>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="table">

            <td class="sherah-table__column-9 sherah-table__data-9">
                <div class="sherah-table__product-content">
                    <p class="sherah-table__product-desc">#<?php echo e($loop->iteration); ?></p>
                </div>
            </td>


            <td class="sherah-table__column-1 sherah-table__data-1">
                <div class="sherah-language-form__input">
                    <p class="crany-table__product--number"style="width: 100%;"><a style="width: 100%;" data-id="<?php echo e($order->id); ?>" href="javascript:void(0)"
                                                               class="sherah-color1 load-invoice"><?php echo e($order->id); ?></a>
                    </p>
                </div>
            </td>


            <td class="sherah-table__column-3 sherah-table__data-3">
                <p class="sherah-table__product-desc text-truncate"><?php echo e($order->created_at->format('d M, Y h:i A')); ?></p>
            </td>


            <?php
                // Fetch the time slot directly from the database using the DB facade
                $timeSlot = DB::table('time_slots')->where('id', $order->delevery_time_id)->first();
            ?>
            <td class="sherah-table__column-3 sherah-table__data-3">
                <p class="sherah-table__product-desc text-truncate"><?php echo e($timeSlot->slot ?? ''); ?></p>
            </td>
            <?php if($ordersall == 1): ?>
                <?php if($order->order_status == 4): ?>
                    <td class="sherah-table__column-4 sherah-table__data-4">
                        <div class="sherah-table__product-content">
                            <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Cancel</div>
                        </div>
                    </td>
                <?php else: ?>
                    <?php if($order->order_status == 1 || $order->order_status == 2): ?>
                        <td class="sherah-table__column-7 sherah-table__data-7">
                            <div class="sherah-table__product-content">
                                <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Accepted</div>
                            </div>
                        </td>
                    <?php elseif($order->order_status == 0): ?>
                    <td class="sherah-table__column-4 sherah-table__data-4">
                        <div class="sherah-table__product-content">
                            <div class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">Pending</div>
                        </div>
                    </td>
                    <?php else: ?>
                        <td class="sherah-table__column-4 sherah-table__data-4">
                            <div class="sherah-table__product-content">
                                <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Complete <?php echo e($order->payment_status); ?></div>
                            </div>
                        </td>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            <td class="sherah-table__column-3 sherah-table__data-3">
                <p class="sherah-table__product-desc text-truncate"><?php echo e(($order->payment_method == 'CashOnDelivery' ? 'Cash' : 'Card')); ?></p>
            </td>
            <?php if($ordersall == 1): ?>
            <td>
                <a data-row="table<?php echo e($order->id); ?>" data-id="<?php echo e($order->id); ?>"
                     href="javascript:void(0) "
                    class="btn btn-sm text-white delete-order w-100"><i class="fa fa-trash text-danger"></i></a>
            </td>
            <?php endif; ?>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <tr>

        <td colspan="6">No records found</td>
    </tr>
<?php endif; ?>
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/pages/order/_partials/new-orders.blade.php ENDPATH**/ ?>