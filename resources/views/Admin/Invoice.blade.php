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
									<div class="row mg-top-30">
                                        <div class="col-12 sherah-flex-between">
                                            <!-- Sherah Breadcrumb -->
                                            <div class="sherah-breadcrumb">
                                                <h2 class="sherah-breadcrumb__title">Invoice</h2>
                                                <ul class="sherah-breadcrumb__list">
                                                    <li><a href="#">Home</a></li>
                                                    <li class="active"><a href="">Invoice</a></li>
                                                </ul>
                                            </div>
                                            <!-- End Sherah Breadcrumb -->
                                        </div>
                                    </div>
									<div id="print-section" class="sherah-page-inner sherah-border sherah-default-bg mg-top-25">

                                       <div class="sherah-invoice-header">
                                            <a href="index.html"> <img class="sherah-logo__main" src="{{asset($setting->logo)}}" alt="#"></a>
                                            <p class="sherah-invoice-header__id sherah-color1">Order #{{$order->order_id}}</p>
                                       </div>

                                       <!-- Sherah Invoice -->
                                       <div class="sherah-invoice-form mg-btm-70">
                                            <div class="sherah-invoice-form__first">
                                                <div class="sherah-invoice-form__single">
                                                     <h4 class="sherah-invoice-form__title">Billed To: </h4>
                                                     <p class="sherah-invoice-form__text">{{$order->OrderAddress->billing_name}}</p>
                                                     <p class="sherah-invoice-form__text">{{$order->OrderAddress->billing_city,$order->OrderAddress->billing_state}}</p>
                                                     <p class="sherah-invoice-form__text">{{$order->OrderAddress->billing_country}}</p>
                                                     <p class="sherah-invoice-form__text">{{$order->OrderAddress->billing_email}}</p>
                                                </div>
                                                <div class="sherah-invoice-form__single sherah-invoice-form__single--right">
													<h4 class="sherah-invoice-form__title">Shipped To:</h4>
													<p class="sherah-invoice-form__text">{{$order->OrderAddress->shipping_name}}</p>
													<p class="sherah-invoice-form__text">{{$order->OrderAddress->shipping_city,$order->OrderAddress->shipping_state}}</p>
													<p class="sherah-invoice-form__text">{{$order->OrderAddress->shipping_country}}</p>
													<p class="sherah-invoice-form__text">{{$order->OrderAddress->shipping_email}}</p>
                                               </div>
                                            </div>
                                            <div class="sherah-invoice-form__first">
                                                <div class="sherah-invoice-form__single">
													<h4 class="sherah-invoice-form__title">Payment Method:</h4>
                                                    <p class="sherah-invoice-form__text">{{$order->payment_method}}</p>
                                                    <p class="sherah-invoice-form__text">Phone : {{$order->OrderAddress->billing_phone}}</p>
                                                </div>
                                                <div class="sherah-invoice-form__single sherah-invoice-form__single--right">
                                                    <h4 class="sherah-invoice-form__title">Order Date:</h4>
                                                    <p class="sherah-invoice-form__text">{{$order->created_at->toDateString()}}</p>
                                               </div>
                                            </div>
                                        </div>
                                        <!-- End Sherah Invoice -->

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="sherah-table-order">
                                                    <table id="sherah-table__orderv1" class="sherah-table__main sherah-table__main--orderv1">
                                                        <thead class="sherah-table__head">
                                                            <tr>
                                                                <th class="sherah-table__column-1 sherah-table__h1">No</th>
                                                                <th class="sherah-table__column-2 sherah-table__h2">Products name</th>
                                                                <th class="sherah-table__column-3 sherah-table__h3">Price</th>
                                                                <th class="sherah-table__column-4 sherah-table__h4">Quantity</th>
                                                                <th class="sherah-table__column-4 sherah-table__h4">Total Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="sherah-table__body">
                                                            @foreach($order->OrderProducts as $index => $product)
                                                            <tr>
                                                                <td class="sherah-table__column-4 sherah-table__data-1">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">{{++$index}}</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-2 sherah-table__data-2">
                                                                    <div class="sherah-table__product-name">
                                                                        <h4 class="sherah-table__product-name--title">{{$product->product_name}}</h4>
                                                                        <p class="sherah-table__product-name--text">Color : Black</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">${{$product->unit_price}}</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">{{$product->qty}}</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc"> ${{$product->unit_price * $product->qty }}</p>
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
                                            <div class="col-12 mg-top-30">
                                                <h4 class="mg-btm-10">Notes: </h4>
                                                <p>All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days</p>
                                                <p>the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.</p>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group mg-top-30 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                    <button id="print-button" type="submit" class="sherah-btn sherah-btn__secondary printBTN">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24.123" height="24.122" viewBox="0 0 24.123 24.122">
                                                        <g id="Icon" transform="translate(-24.948 -124.926)">
                                                          <path id="Path_1022" data-name="Path 1022" d="M29.142,143.747c-.357-.016-.638-.02-.918-.043a3.509,3.509,0,0,1-3.27-3.544q-.013-2.778,0-5.556a3.515,3.515,0,0,1,3.424-3.59c.232-.012.465,0,.765,0,0-.739-.015-1.425.005-2.109a6.3,6.3,0,0,1,.132-1.351,3.455,3.455,0,0,1,3.339-2.616q4.379-.02,8.758,0a3.476,3.476,0,0,1,3.469,3.24c.055.75.023,1.506.029,2.259,0,.169,0,.338,0,.541.36.02.67.028.977.055a3.5,3.5,0,0,1,3.209,3.457c.017,1.883.01,3.767,0,5.65a3.513,3.513,0,0,1-3.39,3.575c-.245.015-.492,0-.8,0,0,.361,0,.654,0,.948-.005.816.026,1.634-.028,2.447a2.041,2.041,0,0,1-2.059,1.928q-5.768.019-11.536,0a2.076,2.076,0,0,1-2.1-2.1c-.032-.878-.009-1.758-.01-2.636C29.142,144.138,29.142,143.968,29.142,143.747Zm15.764-1.48A2.192,2.192,0,0,0,47.65,139.9q0-2.566,0-5.132a3.165,3.165,0,0,0-.049-.654,2.133,2.133,0,0,0-2.328-1.69q-8.17,0-16.339,0c-.173,0-.346,0-.518.008a2.093,2.093,0,0,0-2.044,2.151q-.015,2.778,0,5.556a2.139,2.139,0,0,0,2.74,2.094v-2.244c-.17-.016-.31-.023-.448-.044a.669.669,0,0,1-.636-.692.679.679,0,0,1,.674-.7,3.479,3.479,0,0,1,.376-.009H44.944a2.941,2.941,0,0,1,.423.015.7.7,0,0,1,.032,1.38c-.152.027-.308.036-.492.056ZM43.458,140H30.564c0,2.335-.007,4.625.006,6.915a.675.675,0,0,0,.765.709q5.672.008,11.344,0c.524,0,.771-.276.775-.849.009-1.3,0-2.6,0-3.907C43.458,141.93,43.458,140.99,43.458,140Zm-12.839-9.04H43.431c0-.949.047-1.86-.012-2.763a2,2,0,0,0-1.983-1.844q-4.421-.031-8.843,0a1.953,1.953,0,0,0-1.949,1.6A28.445,28.445,0,0,0,30.619,130.963Z" fill="#fff"/>
                                                          <path id="Path_1023" data-name="Path 1023" d="M59.406,222.84c-.36,0-.721.014-1.08,0a.693.693,0,0,1-.732-.694.679.679,0,0,1,.717-.706c.735-.02,1.471-.019,2.206,0a.685.685,0,0,1,.732.692.7.7,0,0,1-.717.712c-.031,0-.063,0-.094,0H59.406Z" transform="translate(-29.571 -87.407)" fill="#fff"/>
                                                          <path id="Path_1024" data-name="Path 1024" d="M128.164,302.866c-.58,0-1.159.008-1.738,0-.525-.009-.825-.267-.833-.691-.009-.443.3-.716.852-.719q1.738-.012,3.477,0c.525,0,.825.266.833.691.009.443-.3.712-.852.72C129.323,302.873,128.743,302.866,128.164,302.866Z" transform="translate(-91.165 -159.896)" fill="#fff"/>
                                                          <path id="Path_1025" data-name="Path 1025" d="M128.164,334.867c-.579,0-1.159.008-1.738,0-.525-.009-.825-.267-.834-.691-.009-.443.3-.716.852-.72q1.738-.012,3.477,0c.525,0,.825.266.834.69.009.443-.3.712-.852.72C129.323,334.874,128.744,334.867,128.164,334.867Z" transform="translate(-91.165 -188.883)" fill="#fff"/>
                                                        </g>
                                                      </svg>
                                                      Print</button>
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

<script>
    "use strict"
    const printButton = document.getElementById('print-button');
    const printSection = document.getElementById('print-section');

    printButton.addEventListener('click', () => {
    window.print();
    });
</script>

<style>
    @media print {
  body * {
    visibility: hidden;
  }

  #print-section, #print-section * {
    visibility: visible;
  }

  #print-section {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
