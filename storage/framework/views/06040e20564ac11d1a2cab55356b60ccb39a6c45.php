<?php $__env->startSection('title'); ?>
    <title><?php echo e($setting->app_name); ?> - <?php echo e(__('translate.Login')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('user-layout'); ?>

    <div class="sign-up-text">
        <h2><?php echo e(__('translate.Welcome back')); ?></h2>
        <p><?php echo e(__('translate.Welcome back! Please enter your details.')); ?></p>
    </div>

    <div class="sign-up-from">
        <div class="sign-up-from-item">
            <form action="<?php echo e(route('login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="sign-up-from-inner">
                <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('translate.Email')); ?> </label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput">
                    <?php if($errors->has('email')): ?>
                        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                    <?php endif; ?>
            </div>
            <div class="sign-up-from-inner">
                <label for="passwordField1" class="form-label"><?php echo e(__('translate.Password')); ?></label>
                <div class="input-group">
                    <input type="password" class="form-control toggle-password" name="password" id="passwordField1">
                    <div class="icon" data-toggle="password" data-target="passwordField1">
                        <span class="toggle-password-icon">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
                <?php if($errors->has('password')): ?>
                    <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                <?php endif; ?>

            </div>
             <div class="sign-up-from-inner">

                    <div class="sign-up-from-df">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                <?php echo e(__('translate.Remember Me')); ?>

                            </label>
                        </div>

                        <div class="sign-up-main-btn">
                            <a href="<?php echo e(route('forgot.password.user')); ?>" class="modal-sign-up-from-btn"><?php echo e(__('translate.Forget Password?')); ?></a>
                        </div>
                    </div>
                </div>




            <div class="sign-up-btn">
                <button class="main-btn-four" type="submit"><?php echo e(__('translate.Login')); ?></button>
            </form>
                <p><?php echo e(__('translate.Do not have an account?')); ?> <a href="<?php echo e(route('register')); ?>"><?php echo e(__('translate.Sign up for free')); ?></a></p>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Auth.UserLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/Auth/login.blade.php ENDPATH**/ ?>