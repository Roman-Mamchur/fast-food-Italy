
<?php echo $__env->make('Admin.Base.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body id="sherah-dark-light">
		<div class="sherah-body-area">
			<?php echo $__env->make('Admin.Base.Sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('Admin.Base.Navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                                <h2 class="sherah-breadcrumb__title">Order Detils</h2>
                                                <ul class="sherah-breadcrumb__list">
                                                    <li><a href="#">Home</a></li>
                                                    <li class="active"><a href="">Order Detils</a></li>
                                                </ul>
                                            </div>
                                            <!-- End Sherah Breadcrumb -->
                                        </div>
                                    </div>
									<div class="sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                        <div class="sherah-table__head sherah-table__main ">
                                            <h4 class="sherah-order-title">Items from Order #<?php echo e($order->id); ?></h4>
                                            <div>Note: <strong><?php echo e($order->note); ?></strong></div>
                                            <div>OrderType: <strong><?php echo e($order->type); ?></strong></div>
                                            <div class="sherah-order-right">
                                                <p class="sherah-order-text"><?php echo e($order->created_at->format('M d, Y h:i A')); ?> / Total <?php echo e($setting->currency_icon); ?><?php echo e($order->grand_total); ?></p>
                                                <div class="sherah-table-status">
                                                    <?php if($order->payment_status == 'pending'): ?>
                                                            <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Unpaid</div>
														<?php else: ?>
                                                        <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Paid</div>
														<?php endif; ?>
                                                        <a href="<?php echo e(route('show',$order->id)); ?>" target="_blank" rel="noopener noreferrer">
                                                            <button class="btn btn-success btn-icon icon-left print_btn"><i class="fas fa-print"></i> <?php echo e(__('translate.Invoice')); ?></button>
                                                        </a>

                                                </div>
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12 mg-top-30">
                                                <div class="sherah-table-order">
                                                    <table id="sherah-table__orderv1" class="sherah-table__main sherah-table__main--orderv1">
                                                        <thead class="sherah-table__head">
                                                            <tr>
                                                                <th class="sherah-table__column-1 sherah-table__h1">Product</th>
                                                                <th class="sherah-table__column-2 sherah-table__h2">Products name</th>
                                                                <th class="sherah-table__column-3 sherah-table__h3"></th>
                                                                <th class="sherah-table__column-3 sherah-table__h3">Price</th>
                                                                <th class="sherah-table__column-3 sherah-table__h3">Note</th>
                                                                <th class="sherah-table__column-4 sherah-table__h4">Total Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="sherah-table__body">
                                                            <?php  $grandTotal = 0; ?>
                                                            <?php $__currentLoopData = $OrderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $product = App\Models\Product::where('id',$item->product_id)->first();
                                                                ?>
                                                                <tr>

                                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                                        <div class="">
                                                                            <?php if($product): ?>
                                                                            <img class="order_product" src="<?php echo e(asset($product['tumb_image'])); ?>" alt="img">
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </td>
                                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                                        <div class="sherah-table__product-name">
                                                                            <h4 class="sherah-table__product-name--title"><?php echo e($product->name); ?></h4>
                                                                            <p class="sherah-table__product-name--text">
                                                                                <?php if($item['size']): ?>
                                                                                    <span>Size :</span>
                                                                                <?php endif; ?>
                                                                                <?php $__currentLoopData = $item['size']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    (<strong><?php echo e($size); ?> </strong>)
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </p>
                                                                            <p class="sherah-table__product-name--text">
                                                                                <?php if($item['addons']): ?>
                                                                                    Addons:
                                                                                <?php endif; ?>
                                                                               <?php $__currentLoopData = $item['addons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addonId => $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                       <?php
                                                                                           $addonsDb = App\Models\OptionalItem::whereIn('id', [$addonId])->get();
                                                                                       ?>
                                                                                       <?php if($addonsDb->isNotEmpty()): ?>
                                                                                           <strong><?php echo e($addonsDb->first()->name); ?> * <?php echo e($quantity); ?></strong><br>
                                                                                       <?php endif; ?>

                                                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </p>
                                                                        </div>
                                                                    </td>
                                                                    <td></td>
                                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                                        <div class="sherah-table__product-content">
                                                                            <p class="sherah-table__product-desc"><?php echo e($setting->currency_icon); ?><?php echo e($item->total /$item->qty); ?> x <?php echo e($item->qty); ?></p>
                                                                        </div>
                                                                    </td>
                                                                    <td> <?php echo e($item->note); ?></td>

                                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                                        <div class="sherah-table__product-content">
                                                                            <p class="sherah-table__product-desc"><?php echo e($setting->currency_icon); ?><?php echo e($subtotal = $item->total); ?></p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php $grandTotal += $subtotal ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="order-totals">
                                                        <ul class="order-totals__list">
                                                            <li class="order-totals__list--sub"><span>Subtotal</span> <span class="order-totals__amount"><?php echo e($setting->currency_icon); ?><?php echo e($grandTotal); ?></span></li>
                                                            <li><span>Discount</span> <span class="order-totals__amount"><?php echo e($setting->currency_icon); ?><?php echo e($order->discount_amount); ?></span></li>
                                                            <li><span>Shipping</span> <span class="order-totals__amount"><?php echo e($setting->currency_icon); ?><?php echo e($order->delevery_charge); ?></span></li>
                                                            <li><span>Vat Tax</span> <span class="order-totals__amount"><?php echo e($setting->currency_icon); ?><?php echo e($order->vat_charge); ?></span></li>
                                                            <li class="order-totals__bottom"><span>Total</span> <span class="order-totals__amount"><?php echo e($setting->currency_icon); ?><?php echo e($order->grand_total); ?></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
									</div>
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-contact-card sherah-default-bg sherah-border mg-top-30">
                                                <h4 class="sherah-contact-card__title">User  Contact</h4>
                                                <div class="sherah-vcard__body">
                                                    <div class="sherah-vcard__img">
                                                        <?php if($order->userName->image): ?>
                                                            <img class="order_user_avatar"  src="<?php echo e(asset($order->userName->image)); ?>" alt="img">
                                                        <?php else: ?>
                                                            <img class="order_user_avatar" src="<?php echo e(asset($setting->empty_cart)); ?>" alt="img">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="sherah-vcard__content">
                                                        <h4 class="sherah-vcard__title"><?php echo e(html_decode($order->userName->name)); ?></h4>
                                                        <ul class="sherah-vcard__contact">
                                                            <li><a href="tel:<?php echo e(html_decode($order->userName->phone)); ?>">
                                                                <svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="13.983" height="13.981" viewBox="0 0 13.983 13.981">
                                                                    <path id="Path_468" data-name="Path 468" d="M243.018,85.567c0,.4,0,.8,0,1.2a1.111,1.111,0,0,1-1.184,1.18,12.682,12.682,0,0,1-11.3-6.853,12.1,12.1,0,0,1-1.5-5.83,1.144,1.144,0,0,1,1.262-1.3q1.16,0,2.32,0a1.129,1.129,0,0,1,1.227,1.2,8.25,8.25,0,0,0,.362,2.282,1.287,1.287,0,0,1-.255,1.32c-.358.423-.668.886-1.009,1.323a.281.281,0,0,0-.028.36,8.757,8.757,0,0,0,3.635,3.627.263.263,0,0,0,.337-.029c.474-.368.958-.724,1.432-1.091a1.118,1.118,0,0,1,1.052-.211,9.653,9.653,0,0,0,2.55.406,1.1,1.1,0,0,1,1.094,1.131C243.026,84.712,243.018,85.139,243.018,85.567Z" transform="translate(-229.038 -73.968)"></path>
                                                                </svg><?php echo e(html_decode($order->userName->phone)); ?></a>
                                                            </li>
                                                            <li>
                                                                <a href="mailto:<?php echo e(html_decode($order->userName->email)); ?>">
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
                                                                </svg><?php echo e(html_decode($order->userName->email)); ?></a>
                                                            </li>
                                                            
                                                          <li><a href="#">
                                                            <svg  class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="10.757" height="14.39" viewBox="0 0 10.757 14.39">
                                                              <path id="Path_1021" data-name="Path 1021" d="M-348.264,473.154a5.264,5.264,0,0,1,5.147,6.731,14.587,14.587,0,0,1-2.221,4.257c-.77,1.062-1.616,2.073-2.443,3.1-.334.413-.615.4-.968,0a26.151,26.151,0,0,1-4.067-5.839,7.8,7.8,0,0,1-.8-2.588,5.171,5.171,0,0,1,3.35-5.249,6.189,6.189,0,0,1,.942-.271C-348.977,473.221-348.619,473.2-348.264,473.154Zm0,7.83a2.662,2.662,0,0,0,2.714-2.618,2.678,2.678,0,0,0-2.7-2.605,2.677,2.677,0,0,0-2.713,2.625A2.662,2.662,0,0,0-348.268,480.984Z" transform="translate(353.642 -473.154)"/>
                                                            </svg>
                                                            <?php echo e(html_decode($order->userName->address)); ?></a>
                                                      </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if($order->type == 'delivery'): ?>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-contact-card sherah-default-bg  sherah-border mg-top-30">
                                                <h4 class="sherah-contact-card__title">Shipping Address</h4>
                                                <div class="sherah-vcard__body">
                                                    <div class="sherah-vcard__content">
                                                        <h4 class="sherah-vcard__title"><?php echo e(html_decode($order->shippingAddress->name)); ?></h4>
                                                        <ul class="sherah-vcard__contact">
                                                            <li><a href="tel:<?php echo e(html_decode($order->shippingAddress->phone)); ?>">
                                                                <svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="13.983" height="13.981" viewBox="0 0 13.983 13.981">
                                                                    <path id="Path_468" data-name="Path 468" d="M243.018,85.567c0,.4,0,.8,0,1.2a1.111,1.111,0,0,1-1.184,1.18,12.682,12.682,0,0,1-11.3-6.853,12.1,12.1,0,0,1-1.5-5.83,1.144,1.144,0,0,1,1.262-1.3q1.16,0,2.32,0a1.129,1.129,0,0,1,1.227,1.2,8.25,8.25,0,0,0,.362,2.282,1.287,1.287,0,0,1-.255,1.32c-.358.423-.668.886-1.009,1.323a.281.281,0,0,0-.028.36,8.757,8.757,0,0,0,3.635,3.627.263.263,0,0,0,.337-.029c.474-.368.958-.724,1.432-1.091a1.118,1.118,0,0,1,1.052-.211,9.653,9.653,0,0,0,2.55.406,1.1,1.1,0,0,1,1.094,1.131C243.026,84.712,243.018,85.139,243.018,85.567Z" transform="translate(-229.038 -73.968)"></path>
                                                                </svg><?php echo e(html_decode($order->shippingAddress->phone)); ?></a>
                                                            </li>
                                                            <li>
                                                                <a href="mailto:<?php echo e(html_decode($order->shippingAddress->email)); ?>">
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
                                                                </svg><?php echo e(html_decode($order->shippingAddress->email)); ?></a>
                                                            </li>
                                                            <li><a href="#">
                                                                <svg  class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="10.757" height="14.39" viewBox="0 0 10.757 14.39">
                                                                  <path id="Path_1021" data-name="Path 1021" d="M-348.264,473.154a5.264,5.264,0,0,1,5.147,6.731,14.587,14.587,0,0,1-2.221,4.257c-.77,1.062-1.616,2.073-2.443,3.1-.334.413-.615.4-.968,0a26.151,26.151,0,0,1-4.067-5.839,7.8,7.8,0,0,1-.8-2.588,5.171,5.171,0,0,1,3.35-5.249,6.189,6.189,0,0,1,.942-.271C-348.977,473.221-348.619,473.2-348.264,473.154Zm0,7.83a2.662,2.662,0,0,0,2.714-2.618,2.678,2.678,0,0,0-2.7-2.605,2.677,2.677,0,0,0-2.713,2.625A2.662,2.662,0,0,0-348.268,480.984Z" transform="translate(353.642 -473.154)"/>
                                                                </svg>
                                                                <?php echo e(html_decode($order->shippingAddress->DeliveryArea->area_name)); ?></a>
                                                          </li>
                                                            <li><a href="#">
                                                                  <svg  class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="10.757" height="14.39" viewBox="0 0 10.757 14.39">
                                                                    <path id="Path_1021" data-name="Path 1021" d="M-348.264,473.154a5.264,5.264,0,0,1,5.147,6.731,14.587,14.587,0,0,1-2.221,4.257c-.77,1.062-1.616,2.073-2.443,3.1-.334.413-.615.4-.968,0a26.151,26.151,0,0,1-4.067-5.839,7.8,7.8,0,0,1-.8-2.588,5.171,5.171,0,0,1,3.35-5.249,6.189,6.189,0,0,1,.942-.271C-348.977,473.221-348.619,473.2-348.264,473.154Zm0,7.83a2.662,2.662,0,0,0,2.714-2.618,2.678,2.678,0,0,0-2.7-2.605,2.677,2.677,0,0,0-2.713,2.625A2.662,2.662,0,0,0-348.268,480.984Z" transform="translate(353.642 -473.154)"/>
                                                                  </svg>
                                                                  <?php echo e(html_decode($order->shippingAddress->address)); ?></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-default-bg  sherah-border mg-top-30">
                                                <div class="sherah-vcard__body">
                                                    <div class="sherah-vcard__content p-3">
                                                        <h4 class="sherah-vcard__title">Order Delivery Day : <?php echo e($order->delevery_day); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class=" sherah-default-bg  sherah-border mg-top-30">
                                                <div class="sherah-vcard__body">
                                                    <div class="sherah-vcard__content p-3">
                                                        <h4 class="sherah-vcard__title">Order Delivery Time : <?php echo e($order->TimeSlt->slot); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($order->type == 'pickup'): ?>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-contact-card sherah-default-bg  sherah-border mg-top-30">
                                                <h4 class="sherah-contact-card__title">Order Pickup Info</h4>
                                                <div class="sherah-vcard__body">
                                                    <div class="sherah-vcard__content">
                                                        <h4 class="sherah-vcard__title">Order PickUp Day : <?php echo e($order->delevery_day); ?></h4>
                                                        <h4 class="sherah-vcard__title">Order PickUp Time : <?php echo e($order->TimeSlt->slot); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($order->type == 'inresturent'): ?>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-contact-card sherah-default-bg  sherah-border mg-top-30">
                                                <h4 class="sherah-contact-card__title">Booking Info</h4>
                                                <div class="sherah-vcard__body">
                                                    <div class="sherah-vcard__content">
                                                        <h4 class="sherah-vcard__title">Booking Day : <?php echo e($order->delevery_day); ?></h4>
                                                        <h4 class="sherah-vcard__title">Booking Time : <?php echo e($order->TimeSlt->slot); ?></h4>
                                                        <h4 class="sherah-vcard__title">Total Gest : <?php echo e($order->number_of_gest); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>

                                    <hr>
                                    <form action="<?php echo e(route('order.change',$order->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-12">
                                                <div class="form-group">
                                                    <label class="sherah-wc__form-label"> Payment Status</label>
                                                    <select class="form-group__input" aria-label="Default select example" name="payment_status">
                                                        <option <?php if(true): echo 'readonly'; endif; ?>>Payment Status</option>
                                                        <option <?php echo e($order->payment_status == 'pending' ? 'selected': ''); ?> value="pending">Pending</option>
                                                        <option <?php echo e($order->payment_status == 'success' ? 'selected': ''); ?> value="success">Success</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-12">
                                                <div class="form-group">
                                                    <label class="sherah-wc__form-label"> Order Status</label>
                                                    <select class="form-group__input" aria-label="Default select example" name="order_status">
                                                        <option <?php if(true): echo 'readonly'; endif; ?>>Order Status</option>
                                                        <option <?php echo e($order->order_status == '0' ? 'selected': ''); ?> value="1">Pending</option>
                                                        <option <?php echo e($order->order_status == '1' ? 'selected': ''); ?> value="1">Accepted</option>
                                                        <option <?php echo e($order->order_status == '2' ? 'selected': ''); ?> value="2">Confirmed</option>
                                                        <option <?php echo e($order->order_status == '3' ? 'selected': ''); ?> value="3">Deliverd</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-12 pt-3">
                                                    <button  type="submit" class="sherah-btn sherah-btn__primary">Update Order</button>
                                            </div>

                                        </div>
                                    </form>
                                    <hr>
								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>




					</div>
				</div>
			</section>
			<!-- End sherah Dashboard -->
		</div>

<?php echo $__env->make('Admin.Base.Footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- resources/views/Admin/pages/order/invoice.blade.php -->


<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/pages/order/order_detils.blade.php ENDPATH**/ ?>