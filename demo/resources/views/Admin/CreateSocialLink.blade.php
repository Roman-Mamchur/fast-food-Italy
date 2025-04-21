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
												<h2 class="sherah-breadcrumb__title">Create Footer Social Link</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
													<li class="active"><a href="">Create Footer Social Link</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                    <form class="sherah-wc__form-main" action="{{route('FooterSocialLink.store')}}" method="POST" enctype= "multipart/form-data" >
                                                @csrf
                                            <div class="variant">
                                                    <div class="row">
                                                        <div class="col-12">            <!-- Product Info -->
                                                            <div class="product-form-box">
                                                            <h4 class="form-title m-0" id="Vinfo">Social Link</h4>
                                                                <div class="row">
                                                                    <div class="col-12" id="variant_name">
                                                                        <div class="form-group">
                                                                            <label class="sherah-wc__form-label">Link *</label>
                                                                            <div class="form-group__input">
                                                                                <input class="sherah-wc__form-input" name="link" type="text" placeholder="Type here">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12" id="item_name">
                                                                        <div class="form-group">
                                                                            <label class="sherah-wc__form-label">Icon *</label>
                                                                            <div class="form-group__input">
                                                                                <input class="sherah-wc__form-input" placeholder="Type here" type="text" name="icon" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12" id="CreateItemButton">
                                                                        <div class="form-group">
                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Create</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Product Info -->
                                                    </div>
                                            </div>
                                        </div>
                                    </form>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</section>

		</div>
@include('Admin.Base.Footer')
