
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
									<div class="row">
										<div class="col-12">
											<div class="sherah-breadcrumb mg-top-30">
												<h2 class="sherah-breadcrumb__title">Create Coupon</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
													<li class="active"><a href="{{route('coupon.create')}}">Create Coupon</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="{{route('coupon.store')}}" method="POST" enctype= multipart/form-data >
                                        @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Product Info -->
                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <h4 class="form-title m-0">Basic Information</h4>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Name *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" value="{{old('name')}}" placeholder="Type here" type="text" id="name" name="name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Code *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" value="{{old('code')}}" placeholder="Type here" type="text" name="code" id="code">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Number of times *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" value="{{old('number_of_time')}}" value="{{old('name')}}" placeholder="Type here" type="number" name="number_of_time" id="number_of_time">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Expired Date *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" value="{{old('expired_date')}}" placeholder="Type here" type="date" name="expired_date" id="expired_date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Minimum Purchase Price *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" value="{{old('min_purchase_price')}}" placeholder="Type here" type="number" name="min_purchase_price" id="min_purchase_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Offer Type *</label>
                                                                    <select class="form-group__input" aria-label="Default select example" name="offer_type">
                                                                        <option value ="%">Percentage(%)</option>
                                                                        <option value="$">Amount($)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Discount*</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" value="{{old('discount')}}" placeholder="Type here" type="number" name="discount" id="discount">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Status *</label>
                                                                    <select class="form-group__input" aria-label="Default select example" name="status">
                                                                        <option value ="active">Active</option>
                                                                        <option value="inactive">Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Product Info -->
                                                </div>
                                            </div>
                                            <div class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                <button type="submit" class="sherah-btn sherah-btn__primary">Submit</button>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End sherah Dashboard -->
		</div>
@include('Admin.Base.Footer')
