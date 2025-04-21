<?php $__env->startSection('title'); ?>
    <title><?php echo e($setting->app_name); ?> - <?php echo e(__('translate.Privacy Policy')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main>

    <!-- banner  -->

    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1><?php echo e(__('translate.Privacy Policy')); ?></h1>
                    </div>

                    <div class="inner-banner-item">
                        <div class="left">
                            <a href="<?php echo e(route('index')); ?>"><?php echo e(__('translate.Home')); ?></a>
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
                            <span><?php echo e(__('translate.Privacy Policy')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner  -->

    <!-- Shopping Cart  start -->
    <section class="shopping-cart-two shopping-cart-address all-details-root ">
        <div class="container">
            <?php echo clean($privecy->privacy); ?>

        </div>
    </section>

</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/Pages/privacy_policy.blade.php ENDPATH**/ ?>