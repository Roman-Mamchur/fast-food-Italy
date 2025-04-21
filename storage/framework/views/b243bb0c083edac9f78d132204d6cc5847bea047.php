<?php
   $setting =  App\Models\Setting::first();
   $section =  App\Models\SectionTitel::first();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $__env->yieldContent('title'); ?>
    <?php echo $__env->yieldContent('meta'); ?>

    <!-- Fav Icon -->
	<link rel="icon" href="<?php echo e(asset($setting->favicon)); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/venobox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('cdn/toastr.min.css')); ?>"/>
    <style>
        .toggle-password-icon {
            top: -5px;
        }
    </style>
</head>

<body>

    <div class="sign-up-top">
        <div class="sign-up-main-two">
            <div class="sign-up-main-two-item">
                <div class="sign-up-img">
                    <img src="<?php echo e(asset($setting->frondend_login_page)); ?>" alt="img">
                    <div class="sign-up-main-two-item-text">
                        

                    </div>
                </div>
            </div>
        </div>

        <div class="sign-up-main">
            <div class="sign-up-logo">
                <a href="<?php echo e(route('index')); ?>">
                    <img src="<?php echo e(asset($setting->logo)); ?>" height="100" alt="logo">
                </a>
            </div>
            <?php echo $__env->yieldContent('user-layout'); ?>

        </div>
    </div>

    <script>
        "use strict"
        const togglePasswordElements = document.querySelectorAll('[data-toggle="password"]');

        togglePasswordElements.forEach(function (element) {
            const passwordInputId = element.getAttribute('data-target');
            const passwordInput = document.getElementById(passwordInputId);
            const passwordIcon = element.querySelector('.toggle-password-icon i');

            element.addEventListener('click', function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passwordIcon.classList.remove('fa-eye-slash');
                    passwordIcon.classList.add('fa-eye');
                } else {
                    passwordInput.type = 'password';
                    passwordIcon.classList.remove('fa-eye');
                    passwordIcon.classList.add('fa-eye-slash');
                }
            });
        });
    </script>

    <script src="<?php echo e(asset('cdn/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/venobox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js//jquery.shuffle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('cdn/toster.main.js')); ?>"></script>

    <style>
        .btn-success {
            color: #fff;
            margin-left: 20px;
            background-color: #198754;
            border-color: #198754;
        }
    </style>

    <?php if(Session::has('message')): ?>
            <script>
                toastr.options = {
                    "progressBar" : true,
                    "closeButton" : true,
                    }
                    var type="<?php echo e(Session::get('alert-type','info')); ?>"
                    switch(type){
                        case 'info':
                            toastr.info("<?php echo e(Session::get('message')); ?>");
                            break;
                        case 'success':
                            toastr.success("<?php echo e(Session::get('message')); ?>");
                            break;
                        case 'warning':
                            toastr.warning("<?php echo e(Session::get('message')); ?>");
                            break;
                        case 'error':
                            toastr.error("<?php echo e(Session::get('message')); ?>");
                            break;
                    }
        </script>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                toastr.error("<?php echo e($error); ?>");
            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</body>

</html>
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/Auth/UserLayout.blade.php ENDPATH**/ ?>