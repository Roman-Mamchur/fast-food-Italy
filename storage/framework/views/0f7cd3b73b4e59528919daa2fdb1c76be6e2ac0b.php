<?php
  $app =  App\Models\MobileApp::first();
?>
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
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/User/app.blade.php ENDPATH**/ ?>