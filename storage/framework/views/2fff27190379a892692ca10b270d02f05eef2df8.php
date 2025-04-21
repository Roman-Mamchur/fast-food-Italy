<div class="sherah-pagination">
    <ul class="sherah-pagination__list">

        <?php if($paginator->onFirstPage()): ?>
        <?php else: ?>
            <li class="sherah-pagination__button"><a href="<?php echo e($paginator->previousPageUrl()); ?>">Prev</a></li>
        <?php endif; ?>


        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_array($element)): ?>
            <?php if(count($element) < 2): ?>
            <?php else: ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key == $paginator->currentPage()): ?>
                        <li class="active"><a href="javascript::void()"><?php echo e($key); ?></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e($el); ?>"><?php echo e($key); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php else: ?>
        <li><a href="javascript::void()">...</a></li>
        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($paginator->hasMorePages()): ?>
            <li class="sherah-pagination__button"><a href="<?php echo e($paginator->nextPageUrl()); ?>">Next</a></li>
        <?php endif; ?>


    </ul>
</div>
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/component/pagination.blade.php ENDPATH**/ ?>