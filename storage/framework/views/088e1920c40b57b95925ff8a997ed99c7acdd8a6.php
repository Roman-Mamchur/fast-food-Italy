
<?php echo $__env->make('Admin.Base.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body id="sherah-dark-light">

		<div class="sherah-body-area">
			<!-- sherah Admin Menu -->
			<?php echo $__env->make('Admin.Base.Sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- End sherah Admin Menu -->

			<!-- Start Header -->
			<?php echo $__env->make('Admin.Base.Navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- End Header -->

			<!-- sherah Dashboard -->
			<section class="sherah-adashboard sherah-show">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="sherah-body">
								<!-- Dashboard Inner -->
								<div class="sherah-dsinner">
									<div class="row">
										<div class="col-12">
											<div class="sherah-breadcrumb mg-top-30">
												<h2 class="sherah-breadcrumb__title">Not Found Image</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
													<li class="active">Not Found Image</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="<?php echo e(route('admin.update-not-found-image')); ?>" method="POST" enctype= multipart/form-data >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Product Info -->
                                                    <div class="product-form-box sherah-border mg-top-30">

                                                        <div class="row">

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Empty search image</label>
                                                                    <div class="form-group__input">
                                                                        <img id="empty-cart-preview-img" class="empty_search_result"  src="<?php echo e(asset($setting->empty_result)); ?>" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">New Image</label>
                                                                    <div class="form-group__input">
                                                                        <input name="empty_result" type="file">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Empty cart/wishlist</label>
                                                                    <div class="form-group__input">
                                                                        <img id="empty-cart-preview-img" class="empty_search_result"  src="<?php echo e(asset($setting->empty_wishlist)); ?>" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">New Image</label>
                                                                    <div class="form-group__input">
                                                                        <input name="empty_wishlist" type="file">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">404 image</label>
                                                                    <div class="form-group__input">
                                                                        <img id="empty-cart-preview-img" class="empty_search_result"  src="<?php echo e(asset($setting->error_image)); ?>" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">New Image</label>
                                                                    <div class="form-group__input">
                                                                        <input name="error_image" type="file">
                                                                    </div>
                                                                </div>
                                                            </div>







                                                        </div>
                                                    </div>
                                                    <!-- End Product Info -->
                                                </div>
                                            </div>
                                            <div class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                <button type="submit" class="sherah-btn sherah-btn__primary">Update</button>
                                            </div>
                                        </form>
									</div>
								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>


					</div>
				</div>
			</section>
			<!-- End sherah Dashboard -->

		</div>
<?php echo $__env->make('Admin.Base.Footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/not_found_image.blade.php ENDPATH**/ ?>