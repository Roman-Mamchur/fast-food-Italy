<?php $__env->startSection('title'); ?>
    <title><?php echo e($setting->app_name); ?> - <?php echo e(__('translate.Forget Password')); ?></title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('user-layout'); ?>
    <div class="sign-up-text">
        <h2><?php echo e(__('translate.Forget Your Password')); ?></h2>
        <p><?php echo e(__('translate.Enter the email address associated with your account and we will send you a link to reset your password.')); ?>

        </p>
    </div>

    <div class="sign-up-from">
        <div class="sign-up-from-item">
            <?php if(Session::has('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(Session::get('error')); ?>

                </div>
            <?php endif; ?>

            <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('forgot.password.user')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="sign-up-from-inner">
                    <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('translate.Email')); ?></label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput">
                    <?php if($errors->has('email')): ?>
                        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                    <?php endif; ?>
                </div>



                <div class="sign-up-btn">
                    <button class="main-btn-four" type="submit">
                        <?php echo e(__('translate.Send Mail')); ?>

                        <span>
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_317_13742)">
                                    <path
                                        d="M1.41972 8.63898L11.0737 8.63898L7.30373 12.379C7.09177 12.5965 6.97314 12.8882 6.97314 13.192C6.97314 13.4957 7.09177 13.7875 7.30373 14.005C7.51841 14.217 7.80799 14.3359 8.10973 14.3359C8.41146 14.3359 8.70105 14.217 8.91573 14.005L14.6477 8.305C14.8528 8.0869 14.9669 7.79885 14.9669 7.49951C14.9669 7.20018 14.8528 6.91207 14.6477 6.69397L8.91573 0.993959C8.70105 0.781929 8.41146 0.663087 8.10973 0.663087C7.80799 0.663087 7.51841 0.781928 7.30373 0.993959C7.09659 1.20969 6.97748 1.49504 6.96973 1.79401C6.97267 2.09575 7.09238 2.3846 7.30373 2.59998L11.0737 6.35498L1.41972 6.35498C1.12309 6.36377 0.84155 6.48776 0.634836 6.70068C0.428121 6.91361 0.312501 7.19872 0.312501 7.49548C0.312501 7.79225 0.428121 8.07736 0.634835 8.29028C0.84155 8.50321 1.12309 8.6272 1.41972 8.63599L1.41972 8.63898Z"
                                        fill="white" />
                                </g>
                            </svg>
                        </span>
                    </button>
            </form>

            <p><?php echo e(__('translate.Back to login page')); ?> <a
                    href="<?php echo e(route('login')); ?>"><?php echo e(__('translate.Sign in here')); ?></a></p>

        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Auth.UserLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/Auth/reset.blade.php ENDPATH**/ ?>