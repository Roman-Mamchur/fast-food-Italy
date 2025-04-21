
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
                                                <h2 class="sherah-breadcrumb__title">Delivery Order list</h2>
                                                <ul class="sherah-breadcrumb__list">
                                                    <li><a href="#">Home</a></li>
                                                    <li class="active"><a href="">Delivery Order List</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
									<div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
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
														@if($order->payment_status == 'pending')
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
											{{-- <div class="row mg-top-40">
												{{ $order->links('Admin.component.pagination') }}
											</div> --}}
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

