<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Site Title -->
		<title><?php echo e($setting->app_name); ?>-Login</title>

		<!-- Font -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

		<!-- Fav Icon -->
		<link rel="icon" href="<?php echo e(asset($setting->favicon)); ?>">

		<!-- sherah Stylesheet -->
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/font-awesome-all.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/charts.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/datatables.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/jvector-map.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/slickslider.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/jquery-ui.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/reset.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('admin/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('cdn/toastr.min.css')); ?>"/>
	</head>
	<body id="sherah-dark-light">

			<section class="sherah-wc sherah-wc__full sherah-bg-cover">
				<div class="container-fluid p-0">
					<div class="row g-0">
						<div class="col-lg-6 col-md-6 col-12 sherah-wc-col-one">
							<div class="sherah-wc__inner" style="background-image: url(<?php echo e(asset($setting->login_page_bg)); ?>);">
								<!-- Logo -->
								<div class="sherah-wc__logo">
									<a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset($setting->stiky_logo)); ?>" alt="#"></a>
								</div>
								<!-- Middle Image -->
								<div class="sherah-wc__middle">
									<a href="<?php echo e(route('admin.login')); ?>"><img src="<?php echo e(asset($setting->login_page_image)); ?>" alt="#"></a>
								</div>
								<!-- Welcome Heading -->
							</div>
						</div>
						<?php echo $__env->yieldContent('master-layout'); ?>
					</div>
				</div>
			</section>

		</div>

		<!-- sherah Scripts -->
		<script src="<?php echo e(asset('cdn/jquery-3.7.1.min.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/jquery-migrate.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/popper.min.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/jquery-ui.min.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/bootstrap.min.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/charts.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/datatables.min.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/circle-progress.min.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/jquery-jvectormap.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/jvector-map.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/main.js')); ?>"></script>
        <script src="<?php echo e(asset('cdn/toster.main.js')); ?>"></script>

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
					toastr.error('<?php echo e($error); ?>');
				</script>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
	</body>
</html>
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/Auth/MasterLayout.blade.php ENDPATH**/ ?>