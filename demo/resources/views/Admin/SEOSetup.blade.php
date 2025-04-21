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
									<!-- Sherah Breadcrumb -->
									<div class="sherah-breadcrumb mg-top-30">
										<h2 class="sherah-breadcrumb__title">SEO Setup</h2>
										<ul class="sherah-breadcrumb__list">
											<li><a href="#">Home</a></li>
											<li class="active"><a href="">SEO Setup</a></li>
										</ul>
									</div>
									<!-- End Sherah Breadcrumb -->
									<div class="sherah-personals">
										<div class="row">
											<div class="col-lg-3 col-md-2 col-12 sherah-personals__list mg-top-30">
												<div class="sherah-psidebar sherah-default-bg">
													<!-- Features Tab List -->
													<div class="list-group sherah-psidebar__list" id="list-tab" role="tablist">

                                                    @foreach($seo_setting as $index => $seo_settings)
														<a class="list-group-item {{ $index == 0  ? 'active' : '' }}" data-bs-toggle="list"  href="#id{{$seo_settings->id}}" role="tab"><span class="sherah-psidebar__title">{{$seo_settings->page_name}}</span></a>
                                                    @endforeach
													</div>
												</div>
											</div>

											<div class="col-lg-9 col-md-10 col-12  sherah-personals__content mg-top-30">
												<div class="sherah-ptabs">

													<div class="sherah-ptabs__inner">
														<div class="tab-content" id="nav-tabContent">
															<!--  Features Single Tab -->
                                                            @foreach($seo_setting as $index =>  $seo_setting)
                                                            <div class="tab-pane fade {{ $index == 0  ? 'show active' : '' }}" id="id{{$seo_setting->id}}" role="tabpanel">
																<div class="sherah-accordion accordion accordion-flush sherah__item-group sherah-default-bg sherah-border" id="sherah-accordion">
																	<div class="sherah__item-group sherah-default-bg sherah-border mg-top-30">
																		<h4 class="sherah-default-bg sherah-border__title">SEO Setup</h4>
																		<div class="sherah__item-form--group">
																			<form class="sherah-wc__form-main p-0" action="{{route('page.seo.update',$seo_setting->id)}}" method="POST" enctype="multipart/form-data">
																				@csrf
																				<div class="row">
																					<div class="col-12">
																						<div class="sherah__item-form--group mg-top-form-20">
																						<label class="sherah-wc__form-label">SEO Title *</label>
																							<div class="sherah-input-icon">
																								<textarea name="seo_title" cols="30" rows="4">{{$seo_setting->seo_title}}</textarea>

																							</div>
																						</div>
																					</div>
                                                                                    <div class="col-12">
																						<div class="sherah__item-form--group mg-top-form-20">
																						<label class="sherah-wc__form-label">SEO Description *</label>
																							<div class="sherah-input-icon">
																								<textarea name="seo_description" cols="30" rows="6">{!! $seo_setting->seo_description !!}</textarea>

																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="row mg-top-30">
																					<div class="sherah__item-form--group">
																						<button type="submit" class="sherah-btn sherah-btn__primary">Update</button>
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>

                                                            @endforeach
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
