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
									<!-- Sherah Breadcrumb -->
									<div class="sherah-breadcrumb mg-top-30">
										<h2 class="sherah-breadcrumb__title">Payment Method</h2>
										<ul class="sherah-breadcrumb__list">
											<li><a href="#">Home</a></li>
											<li class="active"><a href="">Payment Method</a></li>
										</ul>
									</div>
									<!-- End Sherah Breadcrumb -->
									<div class="sherah-personals">
										<div class="row">
											<div class="col-lg-3 col-md-2 col-12 sherah-personals__list mg-top-30">
												<div class="sherah-psidebar sherah-default-bg">
													<!-- Features Tab List -->
													<div class="list-group sherah-psidebar__list" id="list-tab" role="tablist">

															<a class="list-group-item" data-bs-toggle="list" href="#cash01" role="tab"><span class="sherah-psidebar__icon">
															</span><span class="sherah-psidebar__title">Pay With Cash</span></a>

															<a class="list-group-item" data-bs-toggle="list" href="#paypal01" role="tab"><span class="sherah-psidebar__icon">
															</span><span class="sherah-psidebar__title">Paypal credential</span></a>

                                                            <a class="list-group-item" data-bs-toggle="list" href="#stripe02" role="tab"><span class="sherah-psidebar__icon">
															</span><span class="sherah-psidebar__title">Stripe credential</span></a>

															<a class="list-group-item" data-bs-toggle="list" href="#rozarpay03" role="tab"><span class="sherah-psidebar__icon">
															</span><span class="sherah-psidebar__title">Rozarpay Credential</span></a>


															<a class="list-group-item" data-bs-toggle="list" href="#flutterwave04" role="tab"><span class="sherah-psidebar__icon">
															</span><span class="sherah-psidebar__title">Flutterwave Credential</span></a>


                                                            <a class="list-group-item" data-bs-toggle="list" href="#instamojo06" role="tab"><span class="sherah-psidebar__icon">
															</span><span class="sherah-psidebar__title">Instamojo credential</span></a>

															<a class="list-group-item" data-bs-toggle="list" href="#paystack05" role="tab"><span class="sherah-psidebar__icon">
															</span><span class="sherah-psidebar__title">Paystack credential</span></a>

                                                            <a class="list-group-item" data-bs-toggle="list" href="#bankPayment" role="tab"><span class="sherah-psidebar__icon">
															</span><span class="sherah-psidebar__title">Bank Payment</span></a>



													</div>
												</div>
											</div>

											<div class="col-lg-9 col-md-10 col-12  sherah-personals__content mg-top-30">
												<div class="sherah-ptabs">

													<div class="sherah-ptabs__inner">
														<div class="tab-content" id="nav-tabContent">
															<!--  Features Single Tab -->


															<div class="tab-pane fade show active" id="cash01" role="tabpanel">
																<div class="sherah-accordion accordion accordion-flush sherah__item-group sherah-default-bg sherah-border" id="sherah-accordion">
																	<div class="sherah__item-group sherah-default-bg sherah-border mg-top-30">
																		<h4 class="sherah-default-bg sherah-border__title">Pay With Credential</h4>
																		<div class="sherah__item-form--group">
                                                                        <form class="sherah-wc__form-main p-0" action="<?php echo e(route('admin.cash.credential.update')); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            <?php if($cash_payment->status == 1): ?>
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php else: ?>
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="<?php echo e(asset($cash_payment->cash_image)); ?>" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">New Image</label>
                                                                                            <div class="form-group__input">
                                                                                                <input name="cash_image" type="file">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                 </div>
                                                                                <div class="row mg-top-30">
                                                                                    <div class="sherah__item-form--group">
                                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Update Now</button>
                                                                                    </div>
                                                                                </div>

                                                                            </form>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane fade show active" id="paypal01" role="tabpanel">
																<div class="sherah-accordion accordion accordion-flush sherah__item-group sherah-default-bg sherah-border" id="sherah-accordion">
																	<div class="sherah__item-group sherah-default-bg sherah-border mg-top-30">
																		<h4 class="sherah-default-bg sherah-border__title">Paypal Credential</h4>
																		<div class="sherah__item-form--group">
                                                                        <form class="sherah-wc__form-main p-0" action="<?php echo e(route('admin.paypal.credential.update')); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            <?php if($paypal_payment->status == 1): ?>
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php else: ?>
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Account Mode *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <select name="account_mode">

                                                                                                    <option <?php echo e($paypal_payment->account_mode == 'Sandbox' ? 'selected' : ''); ?> value="Sandbox">Sandbox</option>
                                                                                                    <option <?php echo e($paypal_payment->account_mode == 'Live' ? 'selected' : ''); ?> value="Live">Live</option>

                                                                                                </select>
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($paypal_payment->country_code); ?>" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($paypal_payment->currency_code); ?>" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($paypal_payment->currency_rate); ?>" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Client ID *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($paypal_payment->client_id); ?>" name="paypal_client_id">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">SECRET ID *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="<?php echo e($paypal_payment->secret_id); ?>" name="paypal_secret_key" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">SECRET ID *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="<?php echo e($paypal_payment->secret_id); ?>" name="paypal_secret_key" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="<?php echo e(asset($paypal_payment->paypal_image)); ?>" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">New Image</label>
                                                                                            <div class="form-group__input">
                                                                                                <input name="paypal_image" type="file">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                 </div>
                                                                                <div class="row mg-top-30">
                                                                                    <div class="sherah__item-form--group">
                                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Update Now</button>
                                                                                    </div>
                                                                                </div>

                                                                            </form>
																		</div>
																	</div>
																</div>
															</div>

															<div class="tab-pane fade" id="stripe02" role="tabpanel">
																<div class="sherah-accordion accordion accordion-flush sherah__item-group sherah-default-bg sherah-border" id="sherah-accordion">
																	<div class="sherah__item-group sherah-default-bg sherah-border mg-top-30">
																		<h4 class="sherah-default-bg sherah-border__title">Stripe Credential</h4>
																		<div class="sherah__item-form--group">
                                                                        <form class="sherah-wc__form-main p-0" action="<?php echo e(route('admin.stripe.credential.update')); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            <?php if($stripe_payment->status == 1): ?>
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="0" >
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php else: ?>
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($stripe_payment->country_code); ?>" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($stripe_payment->currency_code); ?>" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($stripe_payment->currency_rate); ?>" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Stripe KEY *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($stripe_payment->stripe_key); ?>" name="stripe_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Stripe SECRET *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="<?php echo e($stripe_payment->stripe_secret); ?>" name="stripe_secret" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="<?php echo e(asset($stripe_payment->image)); ?>" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">New Image</label>
                                                                                            <div class="form-group__input">
                                                                                                <input name="stripe_image" type="file">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="row mg-top-30">
                                                                                    <div class="sherah__item-form--group">
                                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Update Now</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
																		</div>
																	</div>
																</div>
															</div>

															<div class="tab-pane fade" id="rozarpay03" role="tabpanel">
																<div class="sherah-accordion accordion accordion-flush sherah__item-group sherah-default-bg sherah-border" id="sherah-accordion">
																	<div class="sherah__item-group sherah-default-bg sherah-border mg-top-30">
																		<h4 class="sherah-default-bg sherah-border__title">Razorpay Credential</h4>
																		<div class="sherah__item-form--group">
                                                                        <form class="sherah-wc__form-main p-0" action="<?php echo e(route('admin.razorpay.credential.update')); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            <?php if($razorpay_payment->status == 1): ?>
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php else: ?>
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($razorpay_payment->country_code); ?>" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($razorpay_payment->currency_code); ?>" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($razorpay_payment->currency_rate); ?>" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($razorpay_payment->name); ?>" name="name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Description *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($razorpay_payment->description); ?>" name="description">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">KEY *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($razorpay_payment->key); ?>" name="razorpay_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">SECRET Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="<?php echo e($razorpay_payment->secret_key); ?>" name="razorpay_secret" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="<?php echo e(asset($razorpay_payment->image)); ?>" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">New Image</label>
                                                                                            <div class="form-group__input">
                                                                                                <input name="razorpay_image" type="file">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="row mg-top-30">
                                                                                    <div class="sherah__item-form--group">
                                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Update Now</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
																		</div>
																	</div>
																</div>
															</div>


                                                            <div class="tab-pane fade" id="flutterwave04" role="tabpanel">
																<div class="sherah-accordion accordion accordion-flush sherah__item-group sherah-default-bg sherah-border" id="sherah-accordion">
																	<div class="sherah__item-group sherah-default-bg sherah-border mg-top-30">
																		<h4 class="sherah-default-bg sherah-border__title">Flutterwave Credential</h4>
																		<div class="sherah__item-form--group">
                                                                        <form class="sherah-wc__form-main p-0" action="<?php echo e(route('admin.flutterwave.credential.update')); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            <?php if($flutterwave->status == 1): ?>
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php else: ?>
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($flutterwave->country_code); ?>" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Title *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($flutterwave->title); ?>" name="title">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($flutterwave->currency_code); ?>" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($flutterwave->currency_rate); ?>" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Public KEY *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($flutterwave->public_key); ?>" name="public_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Secret Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="<?php echo e($flutterwave->secret_key); ?>" name="secret_key" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="<?php echo e(asset($flutterwave->logo)); ?>" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">New Image</label>
                                                                                            <div class="form-group__input">
                                                                                                <input name="flutterwave_image" type="file">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="row mg-top-30">
                                                                                    <div class="sherah__item-form--group">
                                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Update Now</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
																		</div>
																	</div>
																</div>
															</div>



                                                            <div class="tab-pane fade" id="paystack05" role="tabpanel">
																<div class="sherah-accordion accordion accordion-flush sherah__item-group sherah-default-bg sherah-border" id="sherah-accordion">
																	<div class="sherah__item-group sherah-default-bg sherah-border mg-top-30">
																		<h4 class="sherah-default-bg sherah-border__title">Paystack Credential</h4>
																		<div class="sherah__item-form--group">
                                                                        <form class="sherah-wc__form-main p-0" action="<?php echo e(route('admin.paystack.credential.update')); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            <?php if($PaystackAndMollie->status == 1): ?>
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php else: ?>
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($PaystackAndMollie->paystack_country_code); ?>" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($PaystackAndMollie->paystack_currency_code); ?>" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($PaystackAndMollie->paystack_currency_rate); ?>" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Public Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($PaystackAndMollie->paystack_public_key); ?>" name="paystack_public_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Secret Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="<?php echo e($PaystackAndMollie->paystack_secret_key); ?>" name="paystack_secret_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="<?php echo e(asset($PaystackAndMollie->paystack_image)); ?>" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">New Image</label>
                                                                                            <div class="form-group__input">
                                                                                                <input name="paystack_image" type="file">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="row mg-top-30">
                                                                                    <div class="sherah__item-form--group">
                                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Update Now</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
																		</div>
																	</div>
																</div>
															</div>


                                                            <div class="tab-pane fade" id="instamojo06" role="tabpanel">
																<div class="sherah-accordion accordion accordion-flush sherah__item-group sherah-default-bg sherah-border" id="sherah-accordion">
																	<div class="sherah__item-group sherah-default-bg sherah-border mg-top-30">
																		<h4 class="sherah-default-bg sherah-border__title">Instamojo Credential</h4>
																		<div class="sherah__item-form--group">
                                                                        <form class="sherah-wc__form-main p-0" action="<?php echo e(route('admin.instamojo.credential.update')); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            <?php if($InstamojoPayment->status == 1): ?>
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php else: ?>
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Account Mode *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <select name="account_mode">

                                                                                                    <option <?php echo e($InstamojoPayment->account_mode == 'Sandbox' ? 'selected' : ''); ?> value="Sandbox">Sandbox</option>
                                                                                                    <option <?php echo e($InstamojoPayment->account_mode == 'Live' ? 'selected' : ''); ?> value="Live">Live</option>

                                                                                                </select>
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($InstamojoPayment->currency_rate); ?>" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">API Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "<?php echo e($InstamojoPayment->api_key); ?>" name="api_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Auth Token *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="<?php echo e($InstamojoPayment->auth_token); ?>" name="auth_token" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="<?php echo e(asset($InstamojoPayment->image)); ?>" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">New Image</label>
                                                                                            <div class="form-group__input">
                                                                                                <input name="instamojo_image" type="file">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="row mg-top-30">
                                                                                    <div class="sherah__item-form--group">
                                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Update Now</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
																		</div>
																	</div>
																</div>
															</div>

                                                            <div class="tab-pane fade" id="bankPayment" role="tabpanel">
																<div class="sherah-accordion accordion accordion-flush sherah__item-group sherah-default-bg sherah-border" id="sherah-accordion">
																	<div class="sherah__item-group sherah-default-bg sherah-border mg-top-30">
																		<h4 class="sherah-default-bg sherah-border__title">Bank Payment Credential</h4>
																		<div class="sherah__item-form--group">
                                                                        <form class="sherah-wc__form-main p-0" action="<?php echo e(route('admin.bank.credential.update')); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            <?php if($bankPayment->status == 1): ?>
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php else: ?>
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Bank Information *</label>

                                                                                            <textarea required  class="sherah-wc__form-input " id="account_info" row="8" placeholder="Type bank information" type="text" name="account_info"><?php echo e($bankPayment->account_info); ?></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="<?php echo e(asset($bankPayment->image)); ?>" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">New Image</label>
                                                                                            <div class="form-group__input">
                                                                                                <input name="bank_image" type="file">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                                <div class="row mg-top-30">
                                                                                    <div class="sherah__item-form--group">
                                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Update Now</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
																		</div>
																	</div>
																</div>
															</div>

														</div>
													</div>

												</div>
											</div>
										</div>
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
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/Payment.blade.php ENDPATH**/ ?>