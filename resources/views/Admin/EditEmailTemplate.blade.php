@include('Admin.Base.Header')
<body id="sherah-dark-light">

		<div class="sherah-body-area">
			<!-- sherah Admin Menu -->
			@include('Admin.Base.Sidebar')
			<!-- End sherah Admin Menu -->

			<!-- Start Header -->
			@include('Admin.Base.Navbar')
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
												<h2 class="sherah-breadcrumb__title">Email Template</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
													<li class="active"><a href="">Email Template</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="{{route('email-config.template.update',$email_template['id'])}}" method="POST" enctype= multipart/form-data >
                                        @csrf
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <!-- Product Info -->
                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <h4 class="form-title m-0">Basic Information</h4>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Template</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" placeholder="Type here" type="text" value="{{$email_template['name']}}" name="name" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Subject</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" placeholder="Type here" type="text" value="{{$email_template['subject']}}" name="subject">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12" id="item_name">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">description *</label>
                                                                    <div class="form-group__input">
                                                                        <textarea class="sherah-wc__form-input summernote" id="description" rows="8" placeholder="Type here" type="text" name="e_description">{{$email_template->description}}</textarea>

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
@include('Admin.Base.Footer')
