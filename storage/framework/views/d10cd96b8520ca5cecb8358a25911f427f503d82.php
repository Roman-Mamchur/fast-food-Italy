<?php
    $google_analytics = App\Models\GoogleAnalytic::first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo $__env->yieldContent('title'); ?>
    <?php echo $__env->yieldContent('meta'); ?>
    <!-- Fav Icon -->
		<link rel="icon" href="<?php echo e(asset($setting->favicon)); ?>">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="<?php echo e(asset('fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/venobox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('cdn/toastr.min.css')); ?>"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="<?php echo e(asset('cdn/jquery-3.7.1.min.js')); ?>"></script>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>

     <?php if($google_analytics->status == 1): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($google_analytics->analytic_id); ?>"></script>

        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo e($google_analytics->analytic_id); ?>');
        </script>

    <?php endif; ?>
</head>

<body>
    <?php 
        $cart = session()->get('cart', []);
        if(count($cart) == 0){
         ?>
         <style>
            #hasCartM {display: none;}
            #cartBodyM {display: block;}
            </style>
         <?php
         
        } else {
            ?>
            <style>
               #hasCartM {display: block;}
               #cartBodyM {display: none;}
               </style>
            <?php
            
        }
        $totalPrice = 0;
    ?>
    <!-- header part start  -->
        <?php echo $__env->make('Frontend.Layouts.Partials.header3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- header part End  -->
    <!-- Main Content part start  -->
        <?php echo $__env->yieldContent('content'); ?>
    <!-- header part End  -->
    <!-- Main Content start  -->
        <?php echo $__env->make('Frontend.Layouts.Partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <nav class="mobile-bottom-menu-main" >
            <ul class="mobile-bottom-menu" >
                <!-- <li>
                    <a href="<?php echo e(route('index')); ?>" class="<?php echo e(Route::is('index') ? 'active' : ''); ?>" >
                        <i class="fa-solid fa-house"></i>
                    <?php echo e(__('translate.Home')); ?>

                    </a>
                </li > -->
                <li>
                    <a href="<?php echo e(route('menu')); ?>" class="<?php echo e(Route::is('menu') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-layer-group"></i>
                    <?php echo e(__('translate.Menu')); ?>

                    </a>
                </li>

                <li>
                    <a href="javascript:;" data-name="cart-dropdown" class="click <?php echo e(Route::is('checkout') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-cart-shopping" data-name="cart-dropdown"></i>
                    <div class="tag-count">
                       <span id="carCountM" style="color: #fff !important"> <?php echo e(session('cart') ? count(session('cart')) : 0); ?></span>
                    </div>
                    <?php echo e(__('translate.cart')); ?>

                </a>
                </li>

                <?php
                    if (auth()->check()) {
                        $user_id = auth()->user()->id;
                        $totalWishlistItems = App\Models\Wishlist::where('user_id', $user_id)->count();
                    } else {
                        $totalWishlistItems = 0;
                    }
                ?>

                <li>
                    <?php if(Auth::user()): ?>
                    
                    <a href="<?php echo e(route('user.wishlist')); ?>" class="<?php echo e(Route::is('user.wishlist') ? 'active' : ''); ?>">
                        <?php else: ?>
                        <a href="javascript:;"
                        data-bs-toggle="modal" data-bs-target="#exampleModalLogin" class="<?php echo e(Route::is('user.wishlist') ? 'active' : ''); ?>">
                    <?php endif; ?>
                    <i class="fa-solid fa-heart"></i>
                    <div class="tag-count w-tag-count">
                        <span> <?php echo e($totalWishlistItems); ?></span>
                    </div>
                    <?php echo e(__('translate.Wishlist')); ?>

                </a>
            </li>
            <li style="top: 14px;">
                <?php if(auth()->user()): ?>
                    <a href="<?php echo e(route('user.dashboard')); ?>" class="<?php echo e(Route::is('user.dashboard') ? 'active' : ''); ?>">
                    <i class="fa-solid fa-circle-user"></i>
                    <?php echo e(__('translate.account')); ?>

                </a>
                <?php else: ?>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModalLogin" class="<?php echo e(Route::is('user.dashboard') ? 'active' : ''); ?>"> <i class="fa-solid fa-circle-user"></i>
                <?php endif; ?>
                <?php echo e(__('Login')); ?>

                </a>
                </li>
            </ul>
        </nav>
        <style>
            
            
            @media (max-width: 676px){
                #cart-dropdown {
                position: fixed;
                left: 0;
                z-index: 9999;
                top: 30%;
                background: white;
                width: 100%;
                height: 300px;
                overflow-y: scroll;
                padding: 10px;
            }
            }
        </style>
        <div class="cart-dropdown header-dropdown" id="cart-dropdown">
            <div class="cart-dropdown-text d-flex">
                <div class="text">
                    <h3><?php echo e(__('translate.My Cart')); ?></h3>
                </div>

                <div class="cart-dropdown-btn">
                    <button type="button" class="close-btn" onclick="closeCart()" aria-label="Close">
                        <span>
                            <svg width="10" height="10" viewBox="0 0 10 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.24309 0.757865L0.757812 9.24315M9.24309 9.24309L0.757812 0.757812"
                                    stroke="#9EA3AE" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>

                    </button>
                </div>
            </div>

            <div id="cartBox">
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $product = App\Models\Product::where('status', 'active')
                            ->whereIn('id', [$item['product_id']])
                            ->first();
                        $total = 0;
                        $calculate = 0;
                    ?>

                    <div class="cart-dropdown-item-box"
                        data-product-id="<?php echo e($product['id']); ?>">
                        <div class="cart-dropdown-item">
                            <div class="cart-dropdown-item-img">
                                <img src="<?php echo e(asset($product['tumb_image'])); ?>"
                                    alt="img">
                            </div>
                            <div class="cart-dropdown-item-text">
                                <a href="javascript:;">
                                    <h3><?php echo e($product->name); ?></h3>
                                </a>
                                <div class="d-flex">
                                    <p id="price1-<?php echo e($product['id']); ?>"><?php echo e($setting->currency_icon); ?><?php echo e(number_format($item['total'], 2)); ?></p>
                                    <div class="d-flex w-75">
                                        <button type="button" class="btn btn-minus-custom"
                                            onclick="decrementQuantity1(<?php echo e($product['id']); ?>)" style="width: 40px; line-height: 10px; height: 30px;">-</button>
                                        <input type="number" style="height: 30px; text-align: center;" id="quantity1-<?php echo e($product['id']); ?>" value="<?php echo e($item['qty']); ?>"
                                            min="1" class="form-control product-qty quantity-input" readonly>
                                        <button type="button" class="btn btn-plus-custom"
                                            onclick="incrementQuantity1(<?php echo e($product['id']); ?>)" style="width: 40px; line-height: 10px; height: 30px;">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cart-dropdown-inner">
                            <div class="cart-dropdown-inner-btn">
                                <a href="javascript:;" class="remove-cart-item" onclick="removeCartItem(<?php echo e($product['id']); ?>)"
                                    data-product-id="<?php echo e($product['id']); ?>">
                                    <span>
                                        <svg width="18" height="18"
                                            viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.75 6V13.5C3.75 15.1569 5.09315 16.5 6.75 16.5H11.25C12.9069 16.5 14.25 15.1569 14.25 13.5V6M10.5 8.25V12.75M7.5 8.25L7.5 12.75M12 3.75L10.9453 2.16795C10.6671 1.75065 10.1988 1.5 9.69722 1.5H8.30278C7.80125 1.5 7.3329 1.75065 7.0547 2.16795L6 3.75M12 3.75H6M12 3.75H15.75M6 3.75H2.25"
                                                stroke="#F01543" stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>
                            </div>

                            <?php
                                $totalPrice += $item['total'];
                            ?>



                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

<?php $cart = session('cart');
$cartCount = is_array($cart) ? count($cart) : 0;
?>
            <div class="cart-dropdown-sub-total" id="hasCart"
                <?php if($cartCount == 0): ?> style="display:none;" <?php endif; ?>>
                <div class="cart-dropdown-sub-total-item d-none" style="display: none;">
                    <div class="text">
                        <h3><?php echo e(__('translate.Sub Total')); ?></h3>
                    </div>
                    <div class="text">
                        <h3><a id="updateSubTotal"
                                href="javascript:;"><?php echo e($setting->currency_icon); ?><?php echo e(number_format($totalPrice, 2)); ?></a>
                        </h3>
                    </div>
                </div>
                <div class="cart-dropdown-sub-total-btn">
                    <a href="<?php echo e(route('menu')); ?>" class="main-btn-three mb-3">Add More Items</a>
                    <?php if(Auth::user()): ?>
                                            
                        <a href="<?php echo e(route('checkout')); ?>"
                            class="main-btn-four"><?php echo e(__('Checkout')); ?></a>
                    <?php else: ?>
                        <a href="javascript:;" type="button" class="main-btn-six pt-2" onclick="closeCart()"
                            data-bs-toggle="modal" data-bs-target="#exampleModalLogin">
                            <?php echo e(__('Login/Sign Up to Checkout')); ?></a>
                    <?php endif; ?>
                </div>

            </div>
            <div class="card-body" id="cartBody"
                <?php if($cartCount != 0): ?> style="display:none;" <?php endif; ?>>
                <h5 class="card-title"><?php echo e(__('translate.Empty Cart')); ?></h5>
                <p class="card-text"><?php echo e(__('translate.Browse Product')); ?></p>
                <a href="<?php echo e(route('menu')); ?>" class="btn btn-primary"><?php echo e(__('translate.Shop Now')); ?></a>
                
            </div>



        </div>
       
<script src="<?php echo e(asset('frontend/assets/js/venobox.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/assets/js/aos.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/assets/js/slick.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/assets/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/assets/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('cdn/toster.main.js')); ?>"></script>

 <style>
     .btn-success {
         color: #fff;
         margin-left: 20px;
         background-color: #198754;
         border-color: #198754;
     }
 </style>

 <?php if(Session::has('message')): ?>
         <script>
             toastr.options = {
                 "progressBar" : true,
                 "closeButton" : true,
                 }
                 var type="<?php echo e(Session::get('alert-type','info')); ?>"
                 switch(type){
                     case 'info':
                         toastr.info("<?php echo e(Session::get('message')); ?>");
                         break;
                     case 'success':
                         toastr.success("<?php echo e(Session::get('message')); ?>");
                         break;
                     case 'warning':
                         toastr.warning("<?php echo e(Session::get('message')); ?>");
                         break;
                     case 'error':
                         toastr.error("<?php echo e(Session::get('message')); ?>");
                         break;
                 }
     </script>
 <?php endif; ?>

 <?php if($errors->any()): ?>
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <script>
             toastr.error("<?php echo e($error); ?>");
         </script>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>

</body>

</html>
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/Layouts/master3.blade.php ENDPATH**/ ?>