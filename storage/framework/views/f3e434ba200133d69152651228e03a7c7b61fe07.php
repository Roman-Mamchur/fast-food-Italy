<?php echo $__env->make('Admin.Base.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body id="sherah-dark-light">

		<div class="sherah-body-area">
			<?php echo $__env->make('Admin.Base.Sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('Admin.Base.Navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
												<h2 class="sherah-breadcrumb__title">Edit Time Slot</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
													<li class="active"><a>Edit Time Slot</a></li>
												</ul>
											</div>
										</div>
									</div>


                                    <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="<?php echo e(route('timeslot.update',$slot->id)); ?>" method="POST" enctype= multipart/form-data >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <!-- Product Info -->
                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <h4 class="form-title m-0">Basic Information</h4>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Slot Name *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" placeholder="Type here" value="<?php echo e($slot->slot); ?>" type="text" id="slot" name="slot">
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


<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/pages/timeslot/edit.blade.php ENDPATH**/ ?>