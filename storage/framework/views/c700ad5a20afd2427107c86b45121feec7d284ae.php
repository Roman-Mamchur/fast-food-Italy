
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo e(__('400')); ?></title>

    <!-- Fav Icon -->
	<link rel="icon" href="<?php echo e(asset($setting->favicon)); ?>">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="<?php echo e(asset('fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>">

</head>

<body>

    <div class="appie-error-area">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-12 error_image">
                    <div class="appie-error-content text-center">
                        <img src="<?php echo e(asset($setting->error_image)); ?>" alt="">
                        <span><?php echo e(__('translate.Sorry!')); ?></span>
                        <h3 class="title"><?php echo e(__('translate.Oops! Page Not Found.')); ?></h3>
                        <p><?php echo e(__('translate.The page you are looking for is not available. Try with another page or use the go home button below')); ?></p>
                        <a class="main-btn-four" href="<?php echo e(route('index')); ?>"><?php echo e(__('translate.Back to Home')); ?> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php /**PATH /Applications/XAMPP/htdocs/food/resources/views/errors/404.blade.php ENDPATH**/ ?>