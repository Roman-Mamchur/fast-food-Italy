<?php $__env->startSection('title'); ?>
    <title><?php echo e($setting->app_name); ?> - <?php echo e(__('translate.Register')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('user-layout'); ?>

    <div class="sign-up-text">
        <h2><?php echo e(__('translate.Welcome back')); ?></h2>
        <p><?php echo e(__('translate.Welcome back! Please enter your details.')); ?></p>
    </div>

    <div class="sign-up-from">
        <div class="sign-up-from-item">
            <?php if(Session::has('error')): ?>
                <p class="text-danger"><?php echo e(Session::get('error')); ?></p>
            <?php endif; ?>
            <form action="<?php echo e(route('register')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="sign-up-from-inner">
                <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('translate.Name')); ?></label>
                <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" id="exampleFormControlInput1">
                    <?php if($errors->has('name')): ?>
                        <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                    <?php endif; ?>
            </div>
            <div class="sign-up-from-inner">
                <label for="exampleFormControlInput2" class="form-label"><?php echo e(__('translate.Email')); ?></label>
                <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" name="email" id="exampleFormControlInput2">
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
                <label for="passwordField2" class="form-label"><?php echo e(__('translate.Confirm Password')); ?></label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password_confirmation" id="passwordField2">
                    <div class="icon" data-toggle="password" data-target="passwordField2">
                        <span class="toggle-password-icon">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="sign-up-btn">
                <button class="main-btn-four" type="submit"><?php echo e(__('translate.Sign Up')); ?></button>
            </form>
                <p><?php echo e(__('translate.Already have an account?')); ?> <a href="<?php echo e(route('login')); ?>"><?php echo e(__('translate.Sign in here')); ?></a></p>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Auth.UserLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/Auth/register.blade.php ENDPATH**/ ?>