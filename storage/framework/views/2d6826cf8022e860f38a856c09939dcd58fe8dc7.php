<?php $__env->startSection('title'); ?>
    <title><?php echo e($setting->app_name); ?> - <?php echo e(__('translate.Checkout')); ?></title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <style>
        .typeO {
            font-size: 20px;
            font-weight: 700;
            line-height: 150%;
            letter-spacing: -0.24px;
            color: var(--heading-color);
            margin-right: 20px;
        }
    </style>
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .input-group-text {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
            height: auto;
        }

        .form-check-input {
            margin-top: 0.3rem;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        /* Adjust icon size to match the height of the input field */
        .input-group-append {
            display: flex;
            align-items: center;
        }

        .card-icon {
            height: 100%;
            max-width: 25px;
            object-fit: contain;
        }

        /* Make the icons fill the height of the input box */
        .input-group-text {
            height: 100%;
            width: 50px;
        }

        /* Style for input fields and buttons */
        .form-control {
            flex: 1;
            padding: 10px 15px;
            font-size: 14px;
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 576px) {
            .input-group-append {
                width: 100%;
            }
        }
    </style>
    <main>

        <!-- banner  -->

        <div class="inner-banner">
            <div class="container">
                <div class="row  ">
                    <div class="col-lg-12">
                        <div class="inner-banner-head">
                            <h1><?php echo e(__('translate.Checkout')); ?></h1>
                        </div>

                        <div class="inner-banner-item">
                            <div class="left">
                                <a href="<?php echo e(route('index')); ?>"><?php echo e(__('translate.Home')); ?></a>
                            </div>
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 7L14 12L10 17" stroke="#E5E6EB" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="left">
                                <span><?php echo e(__('translate.Checkout')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- banner  -->

        <!-- Shopping Cart  start -->
        <section class="shopping-cart-two shopping-cart-address ">
            <div class="container">
                <form action="<?php echo e(route('checkout.order')); ?>" id="checkoutForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 ">
                            <div class="delivery-time">
                                <div class="delivery-from">
                                    <div class="d-flex">
                                        <h4 class="typeO">Order Type</h4>
                                        <button class="btn btn-primary"
                                            style="background-color: var(--primary-color); color: #fff; border: none;">
                                            <span>
                                                <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                                    style="stroke: currentColor;  color: #fff;"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.1176 7.85603C14.1176 9.01319 13.0232 9.95126 11.6732 9.95126C10.3231 9.95126 9.22873 9.01319 9.22873 7.85603C9.22873 6.69886 10.3231 5.76079 11.6732 5.76079C13.0232 5.76079 14.1176 6.69886 14.1176 7.85603Z"
                                                        stroke-width="1.5" />
                                                    <path
                                                        d="M19.0065 7.85603C19.0065 11.3275 14.1176 16.237 11.6732 16.237C9.22873 16.237 4.33984 11.3275 4.33984 7.85603C4.33984 4.38452 7.62309 1.57031 11.6732 1.57031C15.7233 1.57031 19.0065 4.38452 19.0065 7.85603Z"
                                                        stroke-width="1.5" />
                                                    <path
                                                        d="M15.3412 14.1406H16.7181C18.169 14.1406 19.545 14.693 20.4738 15.6484L21.7779 16.9898C23.1047 18.3544 21.9725 20.4263 19.9 20.4263H3.44912C1.37662 20.4263 0.244465 18.3544 1.57124 16.9898L2.87532 15.6484C3.80418 14.693 5.18015 14.1406 6.63107 14.1406H8.0079"
                                                        stroke-width="1.5" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <?php echo e(__('translate.Pickup')); ?>


                                        </button>

                                    </div>

                                    <div class="delivery-text pb-3 mt-2">
                                        
                                    </div>
                                    <div class="delivery-from-item pb-4 d-none">
                                        <label for="exampleFormControlInput1"
                                            class="form-label"><?php echo e(__('translate.Select Branch')); ?></label>
                                        <select class="form-select" aria-label="Default select example" required
                                            name="branch">
                                            <?php $__currentLoopData = $branchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <?php
                                            $currentTime1 = \Carbon\Carbon::now('Europe/Dublin');
                                            $currentDate = $currentTime1->format('Y-m-d');
                                            $nextDate = $currentTime1->addDay()->format('Y-m-d');
                                            $minDate = $currentTime1->format('H:i') >= '23:00' ? '' : $currentDate;
                                        ?>
                                        <div class="delivery-from-item col-md-6">
                                            <label for="delevery_day" class="form-label"><?php echo e(__('translate.Select Day')); ?>

                                                <span class="text-danger">*</span></label>
                                            <input type="date" name="delevery_day" value="<?php echo e($minDate); ?>"
                                                class="form-control" id="delevery_day" required min="<?php echo e($minDate); ?>">
                                        </div>

                                        <div class="delivery-from-item col-md-6">
                                            <label for="delevery_time"
                                                class="form-label"><?php echo e(__('translate.Select Time Schedule')); ?> <span
                                                    class="text-danger">*</span></label>

                                            <?php
                                                use Carbon\Carbon;
                                                $currentDate = Carbon::now('Europe/Dublin')->format('Y-m-d');
                                                $currentTime = Carbon::now('Europe/Dublin')->format('h:i A'); // 24-hour format
                                                $isDisabled =
                                                    $currentTime >= '23:00' && request('delevery_day') == $currentDate; // Disable if it's 11:00 PM or later and date is today
                                            ?>

                                            <select class="form-select" aria-label="Default select example"
                                                name="delevery_time" id="delevery_time" required
                                                <?php echo e($isDisabled ? 'disabled' : ''); ?>>
                                                <option value=""><?php echo e(__('translate.Select')); ?></option>

                                                <?php $__currentLoopData = $slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $startTime = explode(' - ', $slot->slot)[0];
                                                        $slotTime = Carbon::createFromFormat(
                                                            'h:i A',
                                                            trim($startTime),
                                                            'Europe/Dublin',
                                                        );
                                                    ?>

                                                    <?php if($currentTime < $slotTime): ?>
                                                        <option value="<?php echo e($slot->id); ?>" class="slot-option">
                                                            <?php echo e($slot->slot); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <p class="text-danger timeErr" style="display: none;">Please Select delivery
                                                time</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="delivery-text pb-3 text-center mt-2">
                                <h4><?php echo e(__('Your Information')); ?></h4>
                            </div>
                            <div class="delivery-from">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sign-up-from-inner">
                                            <label for="name" class="form-label"><?php echo e(__('translate.Name')); ?><span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="<?php echo e(auth()->user() ? auth()->user()->name : old('name')); ?>"
                                                id="name">
                                            <?php if($errors->has('name')): ?>
                                                <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="sign-up-from-inner">
                                            <label for="phone" class="form-label"><?php echo e(__('Phone')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="tel" class="form-control" name="phone" id="phone"
                                                    value="<?php echo e(auth()->user() ? auth()->user()->phone : old('phone')); ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div style="text-align: center; margin-top: 3rem;">
                                    <a href="<?php echo e(route('index')); ?>" class="main-btn-six mb-3"
                                        style="width: auto; padding: 10px 20px;">Add More Items</a>
                                </div>

                            </div>

                        </div>


                        <div class="col-lg-6 pl-27px">
                            <div class="cart-summary-box" style="margin-top:0; padding-top:0;">
                                <div class="cart-summary-box-text">
                                    <h3><?php echo e(__('Your Order')); ?></h3>
                                </div>

                                <div class="cart-summary-box-item-top">
                                    <?php
                                        $subtotal = 0;
                                    ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Item
                                                </th>
                                                <th>
                                                    Qty
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $product = App\Models\Product::where('status', 'active')
                                                        ->whereIn('id', [$item['product_id']])
                                                        ->first();
                                                    $total = 0;
                                                    $calculate = 0;
                                                    $total = $product['price'] * $item['qty'];
                                                ?>
                                                <tr>
                                                    <td style=""><?php echo e($product['name']); ?>

                                                        <?php if($item['size']): ?>
                                                            <br>
                                                            <span><?php echo e(__('translate.Size')); ?> :</span>
                                                        <?php endif; ?>
                                                        <?php $__currentLoopData = $item['size']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($size); ?>

                                                            <?php $total = $total + ($price * $item['qty']) ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(is_array($item['addons'])): ?>
                                                            <br <p>
                                                            <?php if($item['addons']): ?>
                                                                <span><?php echo e(__('translate.Addon')); ?> :</span>
                                                            <?php endif; ?>
                                                            <?php $__currentLoopData = $item['addons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addonId => $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $addonsDb = App\Models\OptionalItem::whereIn('id', [
                                                                        $addonId,
                                                                    ])->get();
                                                                    $calculate += $addonsDb->first()->price * $quantity;
                                                                ?>
                                                                <?php if($addonsDb->isNotEmpty()): ?>
                                                                    <?php echo e($addonsDb->first()->name); ?></span>|
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($item['qty']); ?></td>
                                                    <td><?php echo e(number_format($product['price'], 2)); ?></td>
                                                    <td>
                                                        <?php if($product): ?>
                                                            <strong><?php echo e($setting->currency_icon); ?><?php echo e(number_format($total = $item['total'], 2)); ?></strong>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php $subtotal += $total; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                

                                
                                <div class="apply-coupon">

                                    <div class="apply-coupon-box">
                                        <div class="shopping-cart-list">

                                            <input type="hidden" name="total" value="<?php echo e($subtotal); ?>">
                                            <input type="hidden" id="discountValue" name="discount_amount"
                                                value="<?php echo e($discount); ?>">
                                            <input type="hidden" name="delevery_charge" value="0">
                                            <input type="hidden" name="type" value="pickup">
                                        </div>
                                        <div class="shopping-cart-list shopping-cart-list-btm ">
                                            <div class="shopping-cart-list-text">
                                                <h4><?php echo e(__('translate.Grand Total')); ?></h4>
                                                <a id="grandTotal"
                                                    href="#"><?php echo e($setting->currency_icon); ?><?php echo e(number_format($grand_total = $subtotal, 2)); ?></a>
                                            </div>
                                            <input type="hidden" id="grandTotalValue" name="grand_total"
                                                value="<?php echo e($grand_total); ?>">
                                        </div>
                                        <div>
                                            <div class="sign-up-from-inner">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label"><?php echo e(__('Note')); ?></label>

                                                <textarea class="form-control" id="note" row="8" style="height: auto;" placeholder="Type here"
                                                    type="text" name="note"></textarea>

                                            </div>
                                        </div>
                                        <div class="delivery-text pb-3 text-center mt-5">
                                            <h4
                                                style="display: inline;
                                                width: 100%;
                                                background-color: var(--primary-color);
                                                color: #fff;
                                                padding: 10px;">
                                                <?php echo e(__('translate.Payment')); ?></h4>
                                        </div>
                                        <div class="delivery-from">
                                            <ul class="">
                                                <?php if(auth()->user()): ?>
                                                    <li class="nav">
                                                        <input type="radio" name="payment_method" id="payment_method"
                                                            class="form-check-input" value="pay_with_cash" required>
                                                        <label class="form-check-label" style="margin-left: 10px;"
                                                            for="payment_method">
                                                            <img src="<?php echo e(asset($cash_payment->cash_image)); ?>"
                                                                width="30" alt="img">
                                                            Pay With Cash
                                                        </label>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="nav mt-2 justify-content-between">
                                                    <div>
                                                        <input type="radio" name="payment_method"
                                                            class="form-check-input" value="pay_with_cash"
                                                            id="cardPayment" required checked
                                                            <?php if(!auth()->user()): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label" style="margin-left: 10px;"
                                                            for="cardPayment">
                                                            <img src="<?php echo e(asset($stripe->image)); ?>" width="30"
                                                                alt="img">
                                                            Pay With Card
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="shopping-cart-list-btn">
                                            <p class="text-danger timeError" style="display: none;">Please Fill and Select
                                                required fields</p>
                                            <?php if(!auth()->user()): ?>
                                                <?php if($stripe->status): ?>
                                                    <div class="shopping-payment-btn" id="stripCard"
                                                        style="display: block;">
                                                        <button type="button" class="main-btn-six pt-2">
                                                            Place Order Now
                                                        </button>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                
                                                <div class="shopping-payment-btn" id="stripCard" style="display: block;">
                                                    <button type="button" class="main-btn-six pt-2">
                                                        Place Order Now
                                                    </button>
                                                </div>
                                                
                                            <?php endif; ?>
                                            <?php if(Auth::user()): ?>
                                                <button type="submit" style="display: none;" id="cashPay"
                                                    class="main-btn-six hidePlace">
                                                    <?php echo e(__('Placed Order')); ?>

                                                    <span>
                                                        <svg width="14" height="10" viewBox="0 0 14 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        $('#delevery_time').on('change', function() {
            if ($(this).val()) {

                $('.timeErr').hide(); // Enable button
                $('.timeError').hide(); // Enable button
                $('#stripCard button').removeAttr('disabled'); // Enable button
                var $button = $('#stripCard button');
                $button.attr({
                    'data-bs-toggle': 'modal',
                    'data-bs-target': '#staticBackdrop'
                });
            } else {
                $('#stripCard button').attr('disabled', 'disabled'); // Disable if no selection
                var $button = $('#stripCard button');
                $button.removeAttr('data-bs-toggle data-bs-target');
            }
        });
        $('#stripCard button').on('click', function() {
            // alert();
            let delivery = $('#delevery_time').val();
            if (delivery == '') {
                $('.timeError').show();
                $('.timeErr').show();
            }

        });
        $('.coupon-btn').on('click', function() {
            const couponCode = document.querySelector('input[name="coupon"]').value;
            if (!couponCode) {
                alert("Please enter a coupon code.");
                return;
            }
            $.ajax({
                url: "<?php echo e(route('apply.coupon')); ?>",
                method: "POST",
                data: {
                    subtotal: <?php echo e($subtotal); ?>,
                    coupon: couponCode,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    if (response.success) {
                        // Update subtotal and grand total in the HTML
                        $('#discount').text(
                            `<?php echo e($setting->currency_icon); ?>${response.discountAmount}`
                        );
                        $('#grandTotal').text(
                            `<?php echo e($setting->currency_icon); ?>${response.discountAmount}`
                        );
                        $('#discountValue').val(response.discountAmount);
                        $('#grandTotalValue').val(response.discountTotal);

                        alert(response.message || "Coupon applied successfully!");
                    } else {
                        alert(response.message || "Failed to apply coupon.");
                    }
                },
                error: function(xhr) {
                    alert("An error occurred. Please try again.");
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
    <?php if($stripe->status): ?>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(__('translate.Payment with stripe')); ?></h5>
                        <button type="button" class="btn btn-danger btn-close1">X</button>
                        
                    </div>
                    <div class="modal-body">
                        <?php $cards = \App\Models\Card::where('user_id', auth()->user()->id)->get(); ?>
                        <ul class="cardList text-left">
                            <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="d-flex">
                                    <input type="radio" name="card" id="card_<?php echo e($card->id); ?>"
                                        value="<?php echo e($card->id); ?>" data-card-number="<?php echo e(decrypt($card->card_number)); ?>"
                                        data-expiry-month="<?php echo e($card->month); ?>" data-expiry-year="<?php echo e($card->year); ?>"
                                        data-cvc="<?php echo e(decrypt($card->cvc)); ?>" class="card-radio">
                                    <label class="form-check-label d-flex justify-content-between"
                                        for="card_<?php echo e($card->id); ?>">
                                        <?php echo e(decrypt($card->card_number)); ?></label> 
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        
                        
                        <div class="payment-popup__top payment-popup__top--digital" >
                            <div class="payment-popup">
                                <div class="payment-popup__inner">
                                    <div class="payment-popup__header">
                                    </div>
                                    <div class="modal-body">
                                        
                                        <form role="form" action="<?php echo e(route('pay-with-stripe')); ?>" method="POST"
                                            class="require-validation ecom-wc__form-main p-0" data-cc-on-file="false"
                                            data-stripe-publishable-key="<?php echo e($stripe->stripe_key); ?>" id="payment-form">
                                            <?php echo csrf_field(); ?>
                                            
                                            <input type="hidden" name="type1" value="pickup">
                                            <input type="hidden" name="delevery_time1" id="delevery_time1" value="">
                                            <input type="" name="delevery_day1" id="delevery_day1" value="">
                                            <input type="hidden" name="note1" id="note1" value="">
                                            <input type="hidden" class="form-control" id="phone1" name="phone1"
                                                value="<?php echo e(auth()->user() ? auth()->user()->phone : old('phone')); ?>" required>
                                            <input type="hidden" class="form-control" id="email" name="email"
                                                value="<?php echo e(auth()->user() ? auth()->user()->email : old('email')); ?>">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group homec-form-input">
                                                        <input class="ecom-wc__form-input card-number" type="text"
                                                            name="card_number"
                                                            placeholder="<?php echo e(__('translate.Card Number')); ?>"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group homec-form-input">
                                                        <input class="ecom-wc__form-input card-expiry-month" type="text"
                                                            name="month" placeholder="<?php echo e(__('translate.Month')); ?>"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group homec-form-input">
                                                        <input class="ecom-wc__form-input card-expiry-year" type="text"
                                                            name="year" placeholder="<?php echo e(__('translate.Year')); ?>"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
    
                                                <div class="col-12">
                                                    <div class="form-group homec-form-input">
                                                        <input class="ecom-wc__form-input card-cvc" type="text"
                                                            name="cvc" placeholder="<?php echo e(__('translate.CVV')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 mg-top-20 pb-3">
                                                    <button type="submit"
                                                        class="homec-btn homec-btn__second  homec-btn--payment"><span><?php echo e(__('translate.Payment Now')); ?></span></button>
                                                </div>
                                                <br>
                                                <div class="col-12 error alert alert-danger d-none">
                                                    <div class="payment-popup__error">
                                                        <?php echo e(__('translate.Please provide your valid card information')); ?></div>
                                                </div>
    
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        

                        <!-- Add custom styling for better design -->


                        

                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCard" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="exampleModalCardLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCardLabel"><?php echo e(__('Add Card')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>


    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deliveryDateInput = document.getElementById("delevery_day");
            const deliveryTimeSelect = document.getElementById("delevery_time");

            function checkDisableTime() {
                let selectedDate = deliveryDateInput.value;
                let currentDate = new Date().toISOString().split('T')[0];
                let currentTime = new Date().getHours();

                if (selectedDate === currentDate && currentTime >= 23) {
                    deliveryTimeSelect.disabled = true;
                } else {
                    deliveryTimeSelect.disabled = false;
                }
            }

            deliveryDateInput.addEventListener("change", checkDisableTime);
            checkDisableTime();
        });
        $('#exampleCard').on('click', function() {
            // $('#card-form').show();
            $('.payment-popup__top--digital').show();
            // $('#card-form')[0].reset();
            $('.card-cvc').val('');
            $('.card-expiry-year').val('');
            $('.card-expiry-month').val('');
            $('.card-number').val('');
        });
        $('#payment_method').on('click', function() {
            $('.shopping-payment-btn').hide();

            $('.hidePlace').show();
        });

        $('.btn-close1').on('click', function() {
            $('#staticBackdrop').modal('hide');
        });
        $('#delevery_day').on('change', function() {
            let selectedDate = $(this).val();
            let timeDropdown = $('#delevery_time');

            if (selectedDate) {
                $.ajax({
                    url: "<?php echo e(route('get.available.slots')); ?>", // Your backend route
                    type: "GET",
                    data: {
                        delevery_day: selectedDate
                    },
                    beforeSend: function() {
                        timeDropdown.html('<option>Loading...</option>'); // Show loading state
                    },
                    success: function(response) {
                        timeDropdown.empty().append(
                            '<option value=""><?php echo e(__('translate.Select')); ?></option>');

                        if (response.length > 0) {
                            response.forEach(slot => {
                                timeDropdown.append(
                                    `<option value="${slot.id}">${slot.slot}</option>`);
                            });
                        } else {
                            timeDropdown.append(
                                '<option value=""><?php echo e(__('translate.No available slots')); ?></option>'
                                );
                        }
                    },
                    error: function() {
                        timeDropdown.html(
                            '<option value=""><?php echo e(__('translate.Error loading slots')); ?></option>');
                    }
                });
            }
        });
        $('#cardPayment').on('click', function() {
            $('.shopping-payment-btn').show();
            $('.hidePlace').hide();
            const delevery_day = $('#delevery_day').val();
            const delevery_time = $('#delevery_time').val();
            const name = $('#name').val();
            const email = $('#email').val();
            const phone = $('#phone').val();
            const note = $('#note').val();
            $('#delevery_day1').val(delevery_day);
            $('#delevery_time1').val(delevery_time);
            $('#name1').val(name);
            $('#email1').val(email);
            $('#phone1').val(phone);
            $('#note1').val(note);
        });
        const form = document.getElementById("payment-form");

        const stripCard = document.getElementById("stripCard");
        const cardNumberField = document.querySelector('.card-number');
        const expiryMonthField = document.querySelector('.card-expiry-month');
        const expiryYearField = document.querySelector('.card-expiry-year');

        // Prefill the form fields if data exists in localStorage
        if (localStorage.getItem('cardExpiryMonth')) {
            expiryMonthField.value = localStorage.getItem('cardExpiryMonth');
        }
        if (localStorage.getItem('cardExpiryYear')) {
            expiryYearField.value = localStorage.getItem('cardExpiryYear');
        }

        stripCard.disabled = form.checkValidity();
        // Listen to input events on the form
        form.addEventListener("input", () => {
            // Check if all required fields are filled and valid
            cashPay.disabled = !form.checkValidity();
            stripCard.disabled = !form.checkValidity();
        });
        "use strict"
        $(function() {


            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', (e) => {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    // $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    if (window.confirm(
                            'Do you want to save this card information for future use on this browser?')) {
                        localStorage.setItem('cardExpiryMonth', $('.card-expiry-month').val());
                        localStorage.setItem('cardExpiryYear', $('.card-expiry-year').val());
                    }
                    $form.get(0).submit();
                }
            }


            /*====================================
                Payment Button
            ======================================*/

            // Add event listener to the bank button
            // $('.payment-stripe-button').on("click", () => {
            //     $('.payment-popup__top--digital').toggleClass('active');
            // });

            // // Add event listener to the body
            // $('body').on("click", (e) => {
            //     // Check if the clicked element is not the payment button or any of its children
            //     if (!$(e.target).is('.payment-popup') && !$(e.target).is('.payment-stripe-button') && !$
            //         .contains($('.payment-stripe-button')[0], e.target)) {
            //         // If not, remove the 'active' class from the payment popup
            //         $('.payment-popup__top--digital').removeClass('active');
            //     }
            // });


            // Add event listener to the modal body
            $('.payment-popup__top--digital').on("click", (e) => {
                // Stop the event from propagating up to the body element
                e.stopPropagation();
            });

            // Add event listener to the bank button
            $('.payment-bank-button').on("click", (e) => {

            });

            // Add event listener to the body
            $('body').on("click", (e) => {
                // Check if the clicked element is not the bank button or any of its children
                if (!$(e.target).is('.payment-bank-button') && !$.contains($('.payment-bank-button')[0], e
                        .target)) {
                    // If not, remove the 'active' class from the bank popup
                    $('.payment-popup__top--bank').removeClass('active');
                }
            });


            // Add event listener to the modal body
            $('.payment-popup__top--bank').on("click", (e) => {
                // Stop the event from propagating up to the body element
                e.stopPropagation();
            });


        });
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("card-radio")) {
                if (event.target.checked) {
                    $('#card-form').hide();
                    $('.payment-popup__top--digital').removeClass('d-none');
                    $('.payment-popup__top--digital').css('display', 'block');
                    document.querySelector(".card-number").value = event.target.dataset.cardNumber;
                    // alert(event.target.dataset.cardNumber);
                    document.querySelector(".card-expiry-month").value = event.target.dataset.expiryMonth;
                    document.querySelector(".card-expiry-year").value = event.target.dataset.expiryYear;
                    document.querySelector(".card-cvc").value = event.target.dataset.cvc;
                }
            }
        });
    </script>
    <script>
        $('#card-form').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            $('.text-danger').text('');
            let formData = $(this).serialize(); // Serialize form data
            let actionUrl = $(this).attr('action'); // Get form action URL

            $.ajax({
                url: actionUrl,
                type: "POST",
                data: formData,
                beforeSend: function() {
                    $('#submit-btn').prop('disabled', true).text("Submitting...");
                },
                success: function(response) {

                    $('.text-danger').text(''); // Reset form
                    $('#exampleModalCard').hide(); // Reset form
                    $('#card-form')[0].reset(); // Reset form
                    let cardList = $('.cardList');
                    cardList.empty(); // Clear the existing list

                    response.cards.forEach(card => {
                        let decryptedCardNumber = card
                            .card_number; // Adjust if needed based on decryption
                        let decryptedCVC = card.cvc;

                        let cardItem = `
                            <li class="d-flex">
                                <input type="radio" name="card" value="${card.id}"
                                    id="card_${card.id}"
                                    data-card-number="${decryptedCardNumber}"
                                    data-expiry-month="${card.month}"
                                    data-expiry-year="${card.year}"
                                    data-cvc="${decryptedCVC}"
                                    class="card-radio">
                                    <label class="form-check-label d-flex justify-content-between" for="card_${card.id}">
                                            ${decryptedCardNumber}</label>
                            </li>
                        `;

                        cardList.append(cardItem);
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // Laravel validation error
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('.error-' + key).text(value[
                                0]); // Display error under the corresponding input
                        });
                    } else {
                        alert("Something went wrong. Please try again.");
                    }
                }
            });
        });

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
        $(document).on('click', '.edit-card-btn', function() {
            var cardId = $(this).data('id'); // Get card ID

            $.ajax({
                url: "<?php echo e(route('card.edit')); ?>", // Edit route
                type: "GET",
                data: {
                    id: cardId
                },
                success: function(response) {
                    if (response.success) {
                        // Fill input fields with response data
                        $('input[name="card_id"]').val(response.data.id);
                        $('input[name="card_number"]').val(response.data.card_number);
                        $('input[name="month"]').val(response.data.month);
                        $('input[name="year"]').val(response.data.year);
                        $('input[name="cvc"]').val(response.data.cvc);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/htdocs/food/resources/views/Frontend/Pages/pickup.blade.php ENDPATH**/ ?>