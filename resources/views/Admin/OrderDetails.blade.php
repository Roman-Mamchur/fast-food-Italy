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
                                                <h2 class="sherah-breadcrumb__title">Order list</h2>
                                                <ul class="sherah-breadcrumb__list">
                                                    <li><a href="#">Home</a></li>
                                                    <li class="active"><a href="">Order List</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
									<div class="sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                        <div class="sherah-table__head sherah-table__main">
                                            <h4 class="sherah-order-title">Items from Order #{{$order->order_id}}</h4>
                                            <div class="sherah-order-right">
                                                <p class="sherah-order-text">{{$order->created_at}} / {{$order->product_qty}} items / Total ${{$order->total_amount}}</p>
                                                <div class="sherah-table-status">
                                                    @if($order->payment_status == 0)
                                                    <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Pending</div>
                                                    @elseif($order->payment_status == 1)
                                                    <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Success</div>
                                                    @elseif($order->payment_status == 2)
                                                    <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Cencel</div>
                                                    @endif
                                                    @if($order->order_status == 0)
                                                    <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Pending</div>
                                                    @elseif($order->order_status == 1)
                                                    <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Inprogress</div>
                                                    @elseif($order->order_status == 2)
                                                    <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Delivered</div>
                                                    @elseif($order->order_status == 3)
                                                    <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Completed</div>
                                                    @endif
                                                    <div class="sherah-table__status">
                                                        @if($order->order_status != 0 && $order->order_status !=4)
                                                        <a href="{{route('Invoice.show',$order->id)}}" class="btn btn-success btn-sm">Create Invoice</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12 mg-top-30">
                                                <div class="sherah-table-order">
                                                    <table id="sherah-table__orderv1" class="sherah-table__main sherah-table__main--orderv1">
                                                        <thead class="sherah-table__head">
                                                            <tr>
                                                                <th class="sherah-table__column-1 sherah-table__h1">Product</th>
                                                                <th class="sherah-table__column-2 sherah-table__h2">Products name</th>
                                                                <th class="sherah-table__column-3 sherah-table__h3">Price</th>
                                                                <th class="sherah-table__column-4 sherah-table__h4">Total Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="sherah-table__body">
                                                            @foreach($order->OrderProducts as $order_products)
                                                            <tr>
                                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                                    <div class="sherah-table__product--thumb">
                                                                       <img src="{{asset($order_products['product_image'])}}">
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-2 sherah-table__data-2">
                                                                    <div class="sherah-table__product-name">
                                                                        <h4 class="sherah-table__product-name--title">{{$order_products['product_name']}}</h4>
                                                                        <p class="sherah-table__product-name--text">Quantity : {{$order_products['qty']}}</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">${{$order_products['unit_price']}}</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">${{$order_products['unit_price']*$order_products['qty']}}</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="order-totals">
                                                        <ul class="order-totals__list">
                                                            <li class="order-totals__list--sub"><span>Subtotal</span> <span class="order-totals__amount">${{$order->total_amount}}</span></li>
                                                            <li><span>Shipping</span> <span class="order-totals__amount">$0</span></li>
                                                            <li><span>Vat Tax</span> <span class="order-totals__amount">$0</span></li>
                                                            <li class="order-totals__bottom"><span>Total</span> <span class="order-totals__amount">${{$order->total_amount}}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12 mg-top-30">
                                                <div class="sherah-table--v1">
                                                    <table id="sherah-table__orderv1" class="sherah-table__main sherah-table__main--orderv1 sherah-border">
                                                        <thead class="sherah-table__head">
                                                            <tr>
                                                                <th class="sherah-table__column-1 sherah-table__h1">Transactions ID</th>
                                                                <th class="sherah-table__column-2 sherah-table__h2">Date</th>
                                                                <th class="sherah-table__column-3 sherah-table__h3">Total Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="sherah-table__body">
                                                            <tr>
                                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                                    <div class="sherah-table__product-name">
                                                                        <h4 class="sherah-table__product-gateway"><span>{{$order->transection_id}}</span></h4>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-2 sherah-table__data-2">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">{{$order->created_at->toDateString()}}</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-2 sherah-table__data-2">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">{{$setting->currency_icon}} {{$order->total_amount}}</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
									</div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-contact-card sherah-default-bg sherah-border mg-top-30">
                                                <h4 class="sherah-contact-card__title">Customer Contact</h4>
                                                <div class="sherah-vcard__body">
                                                    <div class="sherah-vcard__img">
                                                        <img src="{{asset($order->user?->image)}}" alt="img">
                                                    </div>
                                                    <div class="sherah-vcard__content">
                                                        <h4 class="sherah-vcard__title">{{$order->GetUser->name}}</h4>
                                                        <ul class="sherah-vcard__contact">
                                                            @if($order->GetUser->phone)
                                                            <li><a href="tel:+91 564-258-4781">
                                                                <svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="13.983" height="13.981" viewBox="0 0 13.983 13.981">
                                                                    <path id="Path_468" data-name="Path 468" d="M243.018,85.567c0,.4,0,.8,0,1.2a1.111,1.111,0,0,1-1.184,1.18,12.682,12.682,0,0,1-11.3-6.853,12.1,12.1,0,0,1-1.5-5.83,1.144,1.144,0,0,1,1.262-1.3q1.16,0,2.32,0a1.129,1.129,0,0,1,1.227,1.2,8.25,8.25,0,0,0,.362,2.282,1.287,1.287,0,0,1-.255,1.32c-.358.423-.668.886-1.009,1.323a.281.281,0,0,0-.028.36,8.757,8.757,0,0,0,3.635,3.627.263.263,0,0,0,.337-.029c.474-.368.958-.724,1.432-1.091a1.118,1.118,0,0,1,1.052-.211,9.653,9.653,0,0,0,2.55.406,1.1,1.1,0,0,1,1.094,1.131C243.026,84.712,243.018,85.139,243.018,85.567Z" transform="translate(-229.038 -73.968)"></path>
                                                                </svg>{{$order->GetUser->phone}}</a>
                                                            </li>
                                                            @else
                                                            <li><a href="tel:+91 564-258-4781">
                                                                <svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="13.983" height="13.981" viewBox="0 0 13.983 13.981">
                                                                    <path id="Path_468" data-name="Path 468" d="M243.018,85.567c0,.4,0,.8,0,1.2a1.111,1.111,0,0,1-1.184,1.18,12.682,12.682,0,0,1-11.3-6.853,12.1,12.1,0,0,1-1.5-5.83,1.144,1.144,0,0,1,1.262-1.3q1.16,0,2.32,0a1.129,1.129,0,0,1,1.227,1.2,8.25,8.25,0,0,0,.362,2.282,1.287,1.287,0,0,1-.255,1.32c-.358.423-.668.886-1.009,1.323a.281.281,0,0,0-.028.36,8.757,8.757,0,0,0,3.635,3.627.263.263,0,0,0,.337-.029c.474-.368.958-.724,1.432-1.091a1.118,1.118,0,0,1,1.052-.211,9.653,9.653,0,0,0,2.55.406,1.1,1.1,0,0,1,1.094,1.131C243.026,84.712,243.018,85.139,243.018,85.567Z" transform="translate(-229.038 -73.968)"></path>
                                                                </svg>N/A</a>
                                                            </li>
                                                            @endif
                                                            <li>
                                                                <a href="{{$order->GetUser->email}}">
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
                                                                </svg>{{$order->GetUser->email}}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-contact-card sherah-default-bg  sherah-border mg-top-30">
                                                <h4 class="sherah-contact-card__title">Shipping Address</h4>
                                                <div class="sherah-vcard__body">
                                                    <div class="sherah-vcard__content">
                                                        <ul class="sherah-vcard__contact">
                                                            <li><a href="tel:+91 564-258-4781">
                                                                <svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="13.983" height="13.981" viewBox="0 0 13.983 13.981">
                                                                    <path id="Path_468" data-name="Path 468" d="M243.018,85.567c0,.4,0,.8,0,1.2a1.111,1.111,0,0,1-1.184,1.18,12.682,12.682,0,0,1-11.3-6.853,12.1,12.1,0,0,1-1.5-5.83,1.144,1.144,0,0,1,1.262-1.3q1.16,0,2.32,0a1.129,1.129,0,0,1,1.227,1.2,8.25,8.25,0,0,0,.362,2.282,1.287,1.287,0,0,1-.255,1.32c-.358.423-.668.886-1.009,1.323a.281.281,0,0,0-.028.36,8.757,8.757,0,0,0,3.635,3.627.263.263,0,0,0,.337-.029c.474-.368.958-.724,1.432-1.091a1.118,1.118,0,0,1,1.052-.211,9.653,9.653,0,0,0,2.55.406,1.1,1.1,0,0,1,1.094,1.131C243.026,84.712,243.018,85.139,243.018,85.567Z" transform="translate(-229.038 -73.968)"></path>
                                                                </svg>{{$order->OrderAddress?->phone}}</a>
                                                            </li>
                                                            <li>
                                                                <a href="mailto:margaretraw@gmail.com">
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
                                                                </svg>{{$order->OrderAddress?->email}}</a>
                                                            </li>
                                                            <li><a href="#">
                                                                  <svg  class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="10.757" height="14.39" viewBox="0 0 10.757 14.39">
                                                                    <path id="Path_1021" data-name="Path 1021" d="M-348.264,473.154a5.264,5.264,0,0,1,5.147,6.731,14.587,14.587,0,0,1-2.221,4.257c-.77,1.062-1.616,2.073-2.443,3.1-.334.413-.615.4-.968,0a26.151,26.151,0,0,1-4.067-5.839,7.8,7.8,0,0,1-.8-2.588,5.171,5.171,0,0,1,3.35-5.249,6.189,6.189,0,0,1,.942-.271C-348.977,473.221-348.619,473.2-348.264,473.154Zm0,7.83a2.662,2.662,0,0,0,2.714-2.618,2.678,2.678,0,0,0-2.7-2.605,2.677,2.677,0,0,0-2.713,2.625A2.662,2.662,0,0,0-348.268,480.984Z" transform="translate(353.642 -473.154)"/>
                                                                  </svg>
                                                                {{$order->OrderAddress?->address}}, {{$order->OrderAddress?->city}} </a>
                                                            </li>
                                                        </ul>
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

        <script>
            (function($) {
                "use strict";
                $(document).ready(function() {
                    $(".print_btn").on("click", function(){
                        $(".custom_click").click();
                        window.print();
                    });
                });
            })(jQuery);
        </script>
@include('Admin.Base.Footer')

