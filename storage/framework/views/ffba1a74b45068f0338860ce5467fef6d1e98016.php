<?php $__env->startSection('title'); ?>
    <title><?php echo e($seo_setting->seo_title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="title" content="<?php echo e($seo_setting->seo_title); ?>">
    <meta name="description" content="<?php echo e($seo_setting->seo_description); ?>">
    <meta name="keywords" content="<?php echo e($seo_setting->seo_description); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main>

    <!-- banner  -->

    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1><?php echo e(__('translate.About Us')); ?></h1>
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
                            <span><?php echo e(__('translate.About Us')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner  -->


    <!-- about part start  -->

    <section class="about-us s-padding">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-lg-6 ">
                    <div class="about-us-img">
                        <img src="<?php echo e(asset($about_us->banner_image)); ?>" class="w-100" alt="thumb">

                        <div class="about-us-img-btn-img">

                            <div class="about-us-img-btn-img-main">
                                <div class="about-us-img-btn-img-main-animetion-img">

                                </div>
                                <div class="about-us-img-btn-img-overlay">
                                    <h2><?php echo e($about_us->title); ?></h2>
                                    <span><?php echo e(__('translate.YEARS')); ?></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 about-pl-45px" data-aos="fade-left">
                    <div class="about-us-head">
                        <h2><?php echo e($about_us->main_title); ?></h2>

                        <?php echo clean($about_us->description); ?>

                    </div>

                    <div class="row about-mt-48px">
                        <div class="col-lg-6 col-md-6">
                            <div class="about-us-item">
                                <div class="icon">
                                </div>

                                <div class="text">
                                    <h3><?php echo e($about_us->customer); ?></h3>

                                    <p><?php echo e($about_us->text_1); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="about-us-item about-us-item-resmt ">
                                <div class="icon">

                                </div>

                                <div class="text">
                                    <h3><?php echo e($about_us->branch); ?></h3>

                                    <p><?php echo e($about_us->text_2); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- about part end  -->


   

     <!-- Customer part-start -->
        <section class="customer s-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="customer-head mb-48px">
                            <h2><?php echo e($section->testonimal_titel); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class=" col-xxl-4 col-xl-4 col-lg-6 col-md-6" >

                            <div class="customer-item">

                                <div class="customer-img">

                                </div>
                                <div class="customer-item-text">
                                    <p><?php echo clean($testimonial->comment); ?></p>
                                </div>
                            </div>

                            <div class="customer-inner">
                                <div class="customer-inner-img">
                                    <img src="<?php echo e(asset($testimonial->image)); ?>" alt="img">
                                </div>

                                <div class="customer-inner-text">
                                    <div class="icon">

                                    </div>

                                    <h3><?php echo e($testimonial->name); ?></h3>
                                    <h5><?php echo e($testimonial->designation); ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
    <!-- Customer part-end -->
    <!-- faq part-star -->
        
    <!-- faq part-end -->

    <!-- App part-start -->
    <?php if($setting->app_visibility == 1): ?>
        <section class="restaurant">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="restaurant-taitel">
                            <h2><?php echo e($app->titel); ?></h2>

                            <h4><?php echo clean($app->description); ?></h4>
                        </div>

                        <div class="restaurant-taitel-btn">
                            <a href="<?php echo e($app->play_store); ?>" class="paly-bg" > <span>

                                </span> <?php echo e(__('translate.Play Store')); ?></a>
                            <a href="<?php echo e($app->i_store); ?>" class=" restaurant-taitel-btn-two"> <span>

                                </span> <?php echo e(__('translate.App Store')); ?></a>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="restaurant-img-main">
                            <div class="restaurant-img">
                                    <img src="<?php echo e(asset($app->image)); ?>" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- App part-end -->
    <div class="map-section" style="padding-bottom: 0!important">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <iframe
                            src="<?php echo e($contactus->google_map); ?>"
                            width="1320" height="350"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/Pages/about.blade.php ENDPATH**/ ?>