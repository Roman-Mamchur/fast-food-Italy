@include('Admin.Base.Header')
<body id="sherah-dark-light">

		<div class="sherah-body-area">
			@include('Admin.Base.Sidebar')
			@include('Admin.Base.Navbar')
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
                                                                        <form class="sherah-wc__form-main p-0" action="{{route('admin.cash.credential.update')}}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            @if($cash_payment->status == 1)
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @else
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="{{asset($cash_payment->cash_image)}}" alt="">
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
                                                                        <form class="sherah-wc__form-main p-0" action="{{route('admin.paypal.credential.update')}}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            @if($paypal_payment->status == 1)
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @else
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Account Mode *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <select name="account_mode">

                                                                                                    <option {{ $paypal_payment->account_mode == 'Sandbox' ? 'selected' : '' }} value="Sandbox">Sandbox</option>
                                                                                                    <option {{ $paypal_payment->account_mode == 'Live' ? 'selected' : '' }} value="Live">Live</option>

                                                                                                </select>
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$paypal_payment->country_code}}" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$paypal_payment->currency_code}}" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$paypal_payment->currency_rate}}" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Client ID *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$paypal_payment->client_id}}" name="paypal_client_id">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">SECRET ID *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="{{$paypal_payment->secret_id}}" name="paypal_secret_key" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">SECRET ID *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="{{$paypal_payment->secret_id}}" name="paypal_secret_key" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="{{asset($paypal_payment->paypal_image)}}" alt="">
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
                                                                        <form class="sherah-wc__form-main p-0" action="{{route('admin.stripe.credential.update')}}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            @if($stripe_payment->status == 1)
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="0" >
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @else
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$stripe_payment->country_code}}" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$stripe_payment->currency_code}}" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$stripe_payment->currency_rate}}" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Stripe KEY *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$stripe_payment->stripe_key}}" name="stripe_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Stripe SECRET *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="{{$stripe_payment->stripe_secret}}" name="stripe_secret" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="{{asset($stripe_payment->image)}}" alt="">
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
                                                                        <form class="sherah-wc__form-main p-0" action="{{route('admin.razorpay.credential.update')}}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            @if($razorpay_payment->status == 1)
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @else
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$razorpay_payment->country_code}}" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$razorpay_payment->currency_code}}" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$razorpay_payment->currency_rate}}" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$razorpay_payment->name}}" name="name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Description *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$razorpay_payment->description}}" name="description">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">KEY *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$razorpay_payment->key}}" name="razorpay_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">SECRET Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="{{$razorpay_payment->secret_key}}" name="razorpay_secret" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="{{asset($razorpay_payment->image)}}" alt="">
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
                                                                        <form class="sherah-wc__form-main p-0" action="{{route('admin.flutterwave.credential.update')}}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            @if($flutterwave->status == 1)
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @else
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$flutterwave->country_code}}" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Title *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$flutterwave->title}}" name="title">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$flutterwave->currency_code}}" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$flutterwave->currency_rate}}" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Public KEY *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$flutterwave->public_key}}" name="public_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Secret Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="{{$flutterwave->secret_key}}" name="secret_key" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="{{asset($flutterwave->logo)}}" alt="">
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
                                                                        <form class="sherah-wc__form-main p-0" action="{{route('admin.paystack.credential.update')}}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            @if($PaystackAndMollie->status == 1)
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @else
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Country Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$PaystackAndMollie->paystack_country_code}}" name="country_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Name *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$PaystackAndMollie->paystack_currency_code}}" name="currency_name">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$PaystackAndMollie->paystack_currency_rate}}" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Public Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$PaystackAndMollie->paystack_public_key}}" name="paystack_public_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Secret Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="{{$PaystackAndMollie->paystack_secret_key}}" name="paystack_secret_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="{{asset($PaystackAndMollie->paystack_image)}}" alt="">
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
                                                                        <form class="sherah-wc__form-main p-0" action="{{route('admin.instamojo.credential.update')}}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            @if($InstamojoPayment->status == 1)
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @else
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Account Mode *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <select name="account_mode">

                                                                                                    <option {{ $InstamojoPayment->account_mode == 'Sandbox' ? 'selected' : '' }} value="Sandbox">Sandbox</option>
                                                                                                    <option {{ $InstamojoPayment->account_mode == 'Live' ? 'selected' : '' }} value="Live">Live</option>

                                                                                                </select>
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Currency Rate *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$InstamojoPayment->currency_rate}}" name="currency_rate">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">API Key *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value = "{{$InstamojoPayment->api_key}}" name="api_key">
                                                                                                <div class="sherah-form-icon sherah-color1"></i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Auth Token *</label>
                                                                                            <div class="sherah-input-icon">
                                                                                                <input class="sherah-wc__form-input" type="text" value="{{$InstamojoPayment->auth_token}}" name="auth_token" >
                                                                                                <div class="sherah-form-icon sherah-color1"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="{{asset($InstamojoPayment->image)}}" alt="">
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
                                                                        <form class="sherah-wc__form-main p-0" action="{{route('admin.bank.credential.update')}}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label>Status *</label>
                                                                                            @if($bankPayment->status == 1)
                                                                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input type="checkbox" name="status" checked="" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @else
                                                                                            <td class="sherah-table__column-6 sherah-table__data-6">
                                                                                                    <div class="sherah-ptabs__notify-switch sherah-ptabs__notify-switch--two">
                                                                                                        <label class="sherah__item-switch">
                                                                                                            <input  type="checkbox" name="status" value="1">
                                                                                                            <span class="sherah__item-switch--slide sherah__item-switch--round"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="sherah__item-form--group mg-top-form-20">
                                                                                            <label class="sherah-wc__form-label">Bank Information *</label>

                                                                                            <textarea required  class="sherah-wc__form-input " id="account_info" row="8" placeholder="Type bank information" type="text" name="account_info">{{ $bankPayment->account_info }}</textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label class="sherah-wc__form-label">Payment page image</label>
                                                                                            <div class="form-group__input">
                                                                                                <img id="empty-cart-preview-img" class="paypal_payment_image" src="{{asset($bankPayment->image)}}" alt="">
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



@include('Admin.Base.Footer')
