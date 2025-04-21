<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Wishlist')); ?></title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<main>
    <!-- banner  -->
    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1><?php echo e(__('translate.Wishlist')); ?></h1>
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
                            <span><?php echo e(__('translate.Wishlist')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner  -->



    <!-- dashboard  start -->
    <section class="dashboard popular">
        <div class="container">
            <div class="row">
                <?php echo $__env->make('Frontend.User.sideber', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <div class="col-lg-9  col-md-8">
                    <div class="dashboard-item-taitel">
                        <h4><?php echo e(__('translate.Dashboard')); ?></h4>
                        <p><?php echo e(__('translate.Wishlist')); ?></p>
                    </div>
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-6 col-md-12  popular-item-mt-30px" >
                                <div class="popular-item-box row-card">
                                    <div class="popular-item-box-img">
                                        <img src="<?php echo e(asset($wishlist->Product['tumb_image'])); ?>" alt="thumb">
                                        <div class="popular-item-box-img-overlay">
                                            <a
                                                href="<?php echo e(route('wishlist.removeR', $wishlist->Product['id'])); ?>">
                                            <div class="icon">
                                                <span>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.361 2.72748C9.03157 1.3148 10.9691 1.3148 11.6396 2.72748L12.7986 5.16895C13.0649 5.72993 13.5796 6.11875 14.175 6.20871L16.7664 6.60021C18.2659 6.82675 18.8646 8.74259 17.7796 9.84221L15.9044 11.7426C15.4736 12.1793 15.277 12.8084 15.3787 13.425L15.8213 16.1084C16.0775 17.6611 14.51 18.8452 13.1689 18.1121L10.851 16.8451C10.3184 16.554 9.68221 16.554 9.14964 16.8451L6.8318 18.1121C5.49065 18.8452 3.92318 17.6611 4.17931 16.1084L4.62198 13.425C4.72369 12.8084 4.52709 12.1793 4.09623 11.7426L2.22105 9.84221C1.13605 8.74259 1.73477 6.82675 3.23421 6.60021L5.82564 6.20871C6.42107 6.11875 6.9358 5.72993 7.20208 5.16895L8.361 2.72748Z"
                                                            fill="#FFB23E"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="popular-inner-box">
                                        <a href="javscript:;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal<?php echo e($wishlist->Product['id']); ?>">
                                            <div class="popular-item-box-text">
                                                <h3 class="line-clamp-1"><?php echo e($wishlist->Product->name); ?></h3>
                                            </div>
                                        </a>
                                        <?php $__currentLoopData = json_decode($wishlist->Product->specifaction, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="popular-inner-item">
                                                <div class="icon">
                                                    <span><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_304_21999)">
                                                            <path
                                                                d="M6.66699 10.0013L8.77923 11.9023C9.13881 12.2259 9.69748 12.1764 9.99449 11.7945L13.3337 7.5013M10.0003 18.3346C14.6027 18.3346 18.3337 14.6037 18.3337 10.0013C18.3337 5.39893 14.6027 1.66797 10.0003 1.66797C5.39795 1.66797 1.66699 5.39893 1.66699 10.0013C1.66699 14.6037 5.39795 18.3346 10.0003 18.3346Z"
                                                                stroke="#FE724C" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg></span>
                                                </div>

                                                <div class="text">
                                                    <h5><?php echo e($name); ?></h5>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        <div class="popular-inner-item-btm">
                                            <div class="text">
                                                <h3><?php echo e($setting->currency_icon); ?><?php echo e(number_format($wishlist->Product->price, 2)); ?></h3>
                                            </div>

                                            <div class="popular-inner-item-btn">

                                                <a type="button" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal<?php echo e($wishlist->Product['id']); ?>" class="main-btn-five">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 4H18C20.2091 4 22 5.79086 22 8V13C22 15.2091 20.2091 17 18 17H10C7.79086 17 6 15.2091 6 13V4ZM6 4C6 2.89543 5.10457 2 4 2H2"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M11 20.5C11 21.3284 10.3284 22 9.5 22C8.67157 22 8 21.3284 8 20.5C8 19.6716 8.67157 19 9.5 19C10.3284 19 11 19.6716 11 20.5Z"
                                                                stroke-width="1.5"></path>
                                                            <path
                                                                d="M20 20.5C20 21.3284 19.3284 22 18.5 22C17.6716 22 17 21.3284 17 20.5C17 19.6716 17.6716 19 18.5 19C19.3284 19 20 19.6716 20 20.5Z"
                                                                stroke-width="1.5"></path>
                                                            <path d="M14 8L14 13" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path d="M16.5 10.5L11.5 10.5" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <?php echo e(__('translate.add')); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-12 blog-mt-25px text-center cart_empty_area" >
                                <img class="sorry-img" src="<?php echo e(asset($setting->empty_wishlist)); ?>">
                                <h3 class="sorry-text"><?php echo e(__('translate.Sorry!! Wishlist not found.')); ?></h3>
                                <p class="mb-4"><?php echo e(__('translate.Whoops... You do not have any favourtie item.')); ?></p>
                                <a class="main-btn-four" href="<?php echo e(route('menu')); ?>"><span><?php echo e(__('translate.Go to Menu')); ?></span></a>
                            </div>
                        <?php endif; ?>

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

<?php echo $__env->make('Frontend.Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/User/wishlist.blade.php ENDPATH**/ ?>