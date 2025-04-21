
@include('Admin.Base.Header')
<body id="sherah-dark-light">
		<div class="sherah-body-area">
			@include('Admin.Base.Sidebar')
			@include('Admin.Base.Navbar')
			<!-- sherah Dashboard -->
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
                                                <h2 class="sherah-breadcrumb__title">Customer Detils</h2>
                                                <ul class="sherah-breadcrumb__list">
                                                    <li><a href="#">Home</a></li>
                                                    <li class="active"><a href="">Customer Detils</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
									<div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <div class="sherah-contact-card sherah-default-bg sherah-border mg-top-30">
                                                    <h4 class="sherah-contact-card__title">Customer Info</h4>
                                                    <div class="sherah-vcard__body">
                                                        <div class="sherah-vcard__img">
                                                            @if($user->image)
                                                                <img class="user_avatar"  src="{{asset($user->image)}}" alt="img">
                                                            @else
                                                                <img src="{{asset($setting->empty_cart)}}" alt="img">
                                                            @endif
                                                        </div>
                                                        <div class="sherah-vcard__content">
                                                            <h4 class="sherah-vcard__title">{{html_decode($user->name)}}</h4>
                                                            <ul class="sherah-vcard__contact">
                                                                <li><a href="tel:{{html_decode($user->phone)}}">
                                                                    <svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="13.983" height="13.981" viewBox="0 0 13.983 13.981">
                                                                        <path id="Path_468" data-name="Path 468" d="M243.018,85.567c0,.4,0,.8,0,1.2a1.111,1.111,0,0,1-1.184,1.18,12.682,12.682,0,0,1-11.3-6.853,12.1,12.1,0,0,1-1.5-5.83,1.144,1.144,0,0,1,1.262-1.3q1.16,0,2.32,0a1.129,1.129,0,0,1,1.227,1.2,8.25,8.25,0,0,0,.362,2.282,1.287,1.287,0,0,1-.255,1.32c-.358.423-.668.886-1.009,1.323a.281.281,0,0,0-.028.36,8.757,8.757,0,0,0,3.635,3.627.263.263,0,0,0,.337-.029c.474-.368.958-.724,1.432-1.091a1.118,1.118,0,0,1,1.052-.211,9.653,9.653,0,0,0,2.55.406,1.1,1.1,0,0,1,1.094,1.131C243.026,84.712,243.018,85.139,243.018,85.567Z" transform="translate(-229.038 -73.968)"></path>
                                                                    </svg>{{html_decode($user->phone)}}</a>
                                                                </li>
                                                                <li>
                                                                    <a href="mailto:{{html_decode($user->email)}}">
                                                                    <svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="13.98" height="14.033" viewBox="0 0 13.98 14.033">
                                                                        <g id="Group_131" data-name="Group 131" transform="translate(-219.859 -62.544)">
                                                                            <path id="Path_472" data-name="Path 472" d="M271.363,95.475h3.71c.626,0,.7.079.7.716,0,1.447,0,2.894,0,4.342a.459.459,0,0,1-.2.413c-.844.645-1.677,1.3-2.522,1.948a.71.71,0,0,1-.393.137q-1.291.018-2.583,0a.664.664,0,0,1-.371-.122q-1.289-.983-2.558-1.991a.523.523,0,0,1-.172-.359c-.012-1.493-.008-2.986-.007-4.479,0-.486.116-.6.594-.605Zm.637,5.474a3.893,3.893,0,0,0,.7.341,1.257,1.257,0,0,0,1.345-.694,2.636,2.636,0,0,0,.269-1.913,3.02,3.02,0,1,0-3.112,3.8c.349.016.57-.177.522-.467-.044-.264-.23-.339-.476-.359a2.2,2.2,0,0,1-1.7-3.381,2.155,2.155,0,0,1,2.948-.685.478.478,0,0,0-.623.271,1.437,1.437,0,0,0-1.921.8A2.33,2.33,0,0,0,269.8,99.7,1.44,1.44,0,0,0,272,100.949Z" transform="translate(-44.527 -31.12)"></path>
                                                                            <path id="Path_473" data-name="Path 473" d="M243.053,251.784H230.261c.094-.08.151-.133.213-.181q2.254-1.754,4.512-3.5a.749.749,0,0,1,.418-.145c.86-.013,1.721-.01,2.582,0a.571.571,0,0,1,.325.1q2.348,1.812,4.686,3.636a.367.367,0,0,0,.1.038Z" transform="translate(-9.83 -175.207)"></path>
                                                                            <path id="Path_474" data-name="Path 474" d="M219.859,174.433l4.671,3.633-4.671,3.633Z" transform="translate(0 -105.737)"></path>
                                                                            <path id="Path_475" data-name="Path 475" d="M389.225,178.113l4.667-3.63v7.26Z" transform="translate(-160.053 -105.784)"></path>
                                                                            <path id="Path_476" data-name="Path 476" d="M325.243,63.516h-2.686c.416-.344.766-.661,1.148-.931a.487.487,0,0,1,.446.032C324.512,62.877,324.843,63.18,325.243,63.516Z" transform="translate(-97.051 0)"></path>
                                                                            <path id="Path_477" data-name="Path 477" d="M442.145,142.025v-2.23l1.378,1.157Z" transform="translate(-210.063 -73.003)"></path>
                                                                            <path id="Path_478" data-name="Path 478" d="M228.2,139.874v2.218l-1.369-1.064Z" transform="translate(-6.59 -73.078)"></path>
                                                                            <path id="Path_479" data-name="Path 479" d="M334.105,152.656a3.655,3.655,0,0,1-.262.637.469.469,0,0,1-.756.075,1.118,1.118,0,0,1-.1-1.389.55.55,0,0,1,.984.143A4.005,4.005,0,0,1,334.105,152.656Z" transform="translate(-106.725 -84.286)"></path>
                                                                            <path id="Path_480" data-name="Path 480" d="M370.08,135.548a1.9,1.9,0,0,1,.681,2.51.7.7,0,0,1-.225.232c-.245.152-.407.061-.408-.227,0-.649.006-1.3,0-1.947C370.128,135.922,370.1,135.727,370.08,135.548Z" transform="translate(-141.961 -68.99)"></path>
                                                                        </g>
                                                                    </svg>{{html_decode($user->email)}}</a>
                                                                </li>
                                                                <li><a href="#">
                                                                    <svg  class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="10.757" height="14.39" viewBox="0 0 10.757 14.39">
                                                                      <path id="Path_1021" data-name="Path 1021" d="M-348.264,473.154a5.264,5.264,0,0,1,5.147,6.731,14.587,14.587,0,0,1-2.221,4.257c-.77,1.062-1.616,2.073-2.443,3.1-.334.413-.615.4-.968,0a26.151,26.151,0,0,1-4.067-5.839,7.8,7.8,0,0,1-.8-2.588,5.171,5.171,0,0,1,3.35-5.249,6.189,6.189,0,0,1,.942-.271C-348.977,473.221-348.619,473.2-348.264,473.154Zm0,7.83a2.662,2.662,0,0,0,2.714-2.618,2.678,2.678,0,0,0-2.7-2.605,2.677,2.677,0,0,0-2.713,2.625A2.662,2.662,0,0,0-348.268,480.984Z" transform="translate(353.642 -473.154)"/>
                                                                    </svg>
                                                                    {{html_decode($user->address)}}</a>
                                                              </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>

                                        <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                            <!-- sherah Table Head -->
                                            <thead class="sherah-table__head">
                                                <tr>
                                                    <th class="sherah-table__column-1 sherah-table__h1">Order ID</th>
                                                    <th class="sherah-table__column-9 sherah-table__h9">Type</th>
                                                    <th class="sherah-table__column-2 sherah-table__h2">Customer Name</th>
                                                    <th class="sherah-table__column-3 sherah-table__h3">Date</th>
                                                    <th class="sherah-table__column-4 sherah-table__h4">Payment Status</th>
                                                    <th class="sherah-table__column-6 sherah-table__h6">Payment Method</th>
													<th class="sherah-table__column-5 sherah-table__h5">Total</th>
                                                    <th class="sherah-table__column-7 sherah-table__h7">Order Status</th>
                                                    <th class="sherah-table__column-8 sherah-table__h8">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="sherah-table__body">
												@foreach ($order as $order)

													<tr>
														<td class="sherah-table__column-1 sherah-table__data-1">
															<div class="sherah-language-form__input">
																<p class="crany-table__product--number"><a href="{{route('order.detils',$order->id)}}" class="sherah-color1">#{{$order->id}}</a></p>
															</div>
														</td>
														<td class="sherah-table__column-9 sherah-table__data-9">
															<div class="sherah-table__product-content">
																<p class="sherah-table__product-desc">{{$order->type}}</p>
															</div>
														</td>
														<td class="sherah-table__column-2 sherah-table__data-2">
															<div class="sherah-table__product-content">
																<p class="sherah-table__product-desc">{{html_decode($order->userName->name)}}</p>
															</div>
														</td>
														<td class="sherah-table__column-3 sherah-table__data-3">
															<p class="sherah-table__product-desc">{{$order->created_at->format('M d, Y h:i A')}}</p>
														</td>
														@if($order->payment_status == 'Pending')
															<td class="sherah-table__column-4 sherah-table__data-4">
																<div class="sherah-table__product-content">
																	<div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Pending</div>
																</div>
															</td>
														@else
															<td class="sherah-table__column-4 sherah-table__data-4">
																<div class="sherah-table__product-content">
																	<div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Success</div>
																</div>
															</td>
														@endif

														<td class="sherah-table__column-6 sherah-table__data-6">
															<div class="sherah-table__product-content">
																<p class="sherah-table__product-desc">{{$order->payment_method}}</p>
															</div>
														</td>
														<td class="sherah-table__column-5 sherah-table__data-5">
															<div class="sherah-table__product-content">
																<p class="sherah-table__product-desc">{{ $setting->currency_icon }}{{$order->grand_total}}</p>
															</div>
														</td>
														@if($order->order_status == 1)
															<td class="sherah-table__column-7 sherah-table__data-7">
																<div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Pending</div>
															</td>
														@endif
														@if($order->order_status == 2)
															<td class="sherah-table__column-7 sherah-table__data-7">
																<div class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">Confirmed</div>
															</td>
														@endif
														@if($order->order_status == 3)
															<td class="sherah-table__column-3 sherah-table__data-3">
																<div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Deliverd</div>
															</td>
														@endif

														<td class="sherah-table__column-8 sherah-table__data-8">
															<div class="sherah-table__status__group">
																<a href="{{route('order.detils',$order->id)}}" class="sherah-table__action sherah-color2 sherah-color3__bg--opactity bg-view">
																	<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
																		xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" clip-rule="evenodd"
																			d="M17.6084 11.7904C18.5748 10.7737 18.5748 9.22894 17.6084 8.21222C15.9786 6.49741 13.1794 4.16797 9.99984 4.16797C6.82024 4.16797 4.02108 6.49741 2.39126 8.21222C1.42492 9.22894 1.42492 10.7737 2.39126 11.7904C4.02108 13.5052 6.82024 15.8346 9.99984 15.8346C13.1794 15.8346 15.9786 13.5052 17.6084 11.7904ZM9.99984 12.5013C11.3805 12.5013 12.4998 11.382 12.4998 10.0013C12.4998 8.62059 11.3805 7.5013 9.99984 7.5013C8.61913 7.5013 7.49984 8.62059 7.49984 10.0013C7.49984 11.382 8.61913 12.5013 9.99984 12.5013Z"
																			fill="white" />
																	</svg>
																</a>
																<a href="{{route('order.delete',$order->id)}}" onclick="confirmation(event)"  class="sherah-table__action sherah-color2 sherah-color2__bg--offset blog_comment_delete">
																	<svg class="sherah-color2__fill"  xmlns="http://www.w3.org/2000/svg" width="16.247" height="18.252" viewBox="0 0 16.247 18.252">
																		<g id="Icon" transform="translate(-160.007 -18.718)">
																			<path id="Path_484" data-name="Path 484" d="M185.344,88.136c0,1.393,0,2.786,0,4.179-.006,1.909-1.523,3.244-3.694,3.248q-3.623.007-7.246,0c-2.15,0-3.682-1.338-3.687-3.216q-.01-4.349,0-8.7a.828.828,0,0,1,.822-.926.871.871,0,0,1,1,.737c.016.162.006.326.006.489q0,4.161,0,8.321c0,1.061.711,1.689,1.912,1.69q3.58,0,7.161,0c1.2,0,1.906-.631,1.906-1.695q0-4.311,0-8.622a.841.841,0,0,1,.708-.907.871.871,0,0,1,1.113.844C185.349,85.1,185.343,86.618,185.344,88.136Z" transform="translate(-9.898 -58.597)" />
																			<path id="Path_485" data-name="Path 485" d="M164.512,21.131c0-.517,0-.98,0-1.443.006-.675.327-.966,1.08-.967q2.537,0,5.074,0c.755,0,1.074.291,1.082.966.005.439.005.878.009,1.317a.615.615,0,0,0,.047.126h.428c1,0,2,0,3,0,.621,0,1.013.313,1.019.788s-.4.812-1.04.813q-7.083,0-14.165,0c-.635,0-1.046-.327-1.041-.811s.4-.786,1.018-.789C162.165,21.127,163.3,21.131,164.512,21.131Zm1.839-.021H169.9v-.764h-3.551Z" transform="translate(0 0)" />
																			<path id="Path_486" data-name="Path 486" d="M225.582,107.622c0,.9,0,1.806,0,2.709a.806.806,0,0,1-.787.908.818.818,0,0,1-.814-.924q0-2.69,0-5.38a.82.82,0,0,1,.81-.927.805.805,0,0,1,.79.9C225.585,105.816,225.582,106.719,225.582,107.622Z" transform="translate(-58.483 -78.508)" />
																			<path id="Path_487" data-name="Path 487" d="M266.724,107.63c0-.9,0-1.806,0-2.709a.806.806,0,0,1,.782-.912.818.818,0,0,1,.818.919q0,2.69,0,5.38a.822.822,0,0,1-.806.931c-.488,0-.792-.356-.794-.938C266.721,109.411,266.724,108.521,266.724,107.63Z" transform="translate(-97.561 -78.509)" />
																		</g>
																	</svg>
																</a>
															</div>
														</td>
													</tr>
                                               	@endforeach
                                            </tbody>
											<div class="row mg-top-40">

											</div>
                                        </table>
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
<script>
    "use strict"
	function confirmation(ev) {
	  ev.preventDefault();
	  var urlToRedirect = ev.currentTarget.getAttribute('href');
	  const swalWithBootstrapButtons = Swal.mixin({
		  customClass: {
			  confirmButton: 'btn btn-success',
			  cancelButton: 'btn btn-danger',
		  },
		  buttonsStyling: false
		  })
		  swalWithBootstrapButtons.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonText: 'Yes, delete it!',
		  cancelButtonText: 'No, cancel!',
		  reverseButtons: true
		  }).then((result) => {
		  if (result.isConfirmed) {
			  swalWithBootstrapButtons.fire(
			  'Deleted!',
			  'Your file has been deleted.',
			  'success'
			  )
			  window.location.href = urlToRedirect;
		  } else if (
			  /* Read more about handling dismissals below */
			  result.dismiss === Swal.DismissReason.cancel
		  ) {
			  swalWithBootstrapButtons.fire(
			  'Cancelled',
			  'Your imaginary file is safe :)',
			  'error'
			  )
		  }
		  })
  }
</script>

