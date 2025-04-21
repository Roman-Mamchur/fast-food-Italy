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
									<div class="row mg-top-30">
                                        <div class="col-12 sherah-flex-between">
                                            <!-- Sherah Breadcrumb -->
                                            <div class="sherah-breadcrumb">
                                                <h2 class="sherah-breadcrumb__title">Sliders</h2>
                                                <ul class="sherah-breadcrumb__list">
                                                    <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                                                    <li class="active"><a href="">Sliders</a></li>
                                                </ul>
                                            </div>
                                            <!-- End Sherah Breadcrumb -->

                                        </div>
                                    </div>
									<div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                        <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                            <!-- sherah Table Head -->
                                            <thead class="sherah-table__head">
                                                <tr>
                                                    <th class="sherah-table__column-1 sherah-table__h1">Image</th>
                                                    <th class="sherah-table__column-2 sherah-table__h2">Titel</th>
                                                    <th class="sherah-table__column-6 sherah-table__h6">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="sherah-table__body">
												@foreach($sliders as $index => $slider)
                                                <tr>

                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product">
                                                            <div class="sherah-table__vendor-img">
                                                                <img src="{{asset($slider->image)}}" alt="#">
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="sherah-table__column-2 sherah-table__data-2">
														<div class="sherah-table__product-content">
															<p class="sherah-table__product-desc">{!!$slider->translate_slider?->title!!}</p>
														</div>
                                                    </td>

													<td class="sherah-table__column-8 sherah-table__data-8">
														<div class="sherah-table__status__group">
															<a href="{{route('slider.edit',$slider->id)}}" class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">
																<svg class="sherah-color3__fill" xmlns="http://www.w3.org/2000/svg" width="18.29" height="18.252" viewBox="0 0 18.29 18.252">
																	<g id="Group_132" data-name="Group 132" transform="translate(-234.958 -37.876)">
																		<path id="Path_481" data-name="Path 481" d="M242.545,95.779h-5.319a2.219,2.219,0,0,1-2.262-2.252c-.009-1.809,0-3.617,0-5.426q0-2.552,0-5.1a2.3,2.3,0,0,1,2.419-2.419q2.909,0,5.818,0c.531,0,.87.274.9.715a.741.741,0,0,1-.693.8c-.3.026-.594.014-.892.014q-2.534,0-5.069,0c-.7,0-.964.266-.964.976q0,5.122,0,10.245c0,.687.266.955.946.955q5.158,0,10.316,0c.665,0,.926-.265.926-.934q0-2.909,0-5.818a.765.765,0,0,1,.791-.853.744.744,0,0,1,.724.808c.007,1.023,0,2.047,0,3.07s.012,2.023-.006,3.034A2.235,2.235,0,0,1,248.5,95.73a1.83,1.83,0,0,1-.458.048Q245.293,95.782,242.545,95.779Z" transform="translate(0 -39.652)" fill="#09ad95"/>
																		<path id="Path_482" data-name="Path 482" d="M332.715,72.644l2.678,2.677c-.05.054-.119.133-.194.207q-2.814,2.815-5.634,5.625a1.113,1.113,0,0,1-.512.284c-.788.177-1.582.331-2.376.48-.5.093-.664-.092-.564-.589.157-.781.306-1.563.473-2.341a.911.911,0,0,1,.209-.437q2.918-2.938,5.853-5.86A.334.334,0,0,1,332.715,72.644Z" transform="translate(-84.622 -32.286)" fill="#09ad95"/>
																		<path id="Path_483" data-name="Path 483" d="M433.709,42.165l-2.716-2.715a15.815,15.815,0,0,1,1.356-1.248,1.886,1.886,0,0,1,2.579,2.662A17.589,17.589,0,0,1,433.709,42.165Z" transform="translate(-182.038)" fill="#09ad95"/>
																	</g>
																</svg>
															</a>

														</div>
                                                    </td>
                                                </tr>
												@endforeach
                                            </tbody>
                                        </table>
										<div class="row mg-top-40">
											{{ $sliders->links('Admin.component.pagination') }}
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
