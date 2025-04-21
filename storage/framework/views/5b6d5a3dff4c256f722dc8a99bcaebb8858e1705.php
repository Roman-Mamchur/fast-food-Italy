<?php
    $language = App\Models\Language::get();
    $contact = App\Models\ContactPage::first();
    $section = App\Models\SectionTitel::first();
    $setting = App\Models\Setting::first();
    if (auth()->check()) {
        $user_id = auth()->user()->id;
        $totalWishlistItems = App\Models\Wishlist::where('user_id', $user_id)->count();
    } else {
        $totalWishlistItems = 0;
    }
    
?>
<style>
    .header .menu-bg .nav-btn-main .nav-btn-two .love:after {
        content: "<?php echo e($totalWishlistItems); ?>";
        
    }

    #carCount {
        position: absolute;
        border-radius: 50%;
        top: 0;
        z-index: 9999;
        right: 0;
        width: 16px;
        height: 16px;
        text-align: center;
        line-height: 16px;
        background-color: var(--primary-color);
        color: #fff;
        font-size: 10px;
        font-weight: 500;
    }
</style>
<!-- header part start  -->
<header class="header  header-two  ">
    <div class="container">
        <div class="header-main">
            <div class="header-left-center">
                <a href="<?php echo e(route('menu')); ?>"><?php echo e($section->top_ber_message); ?></a>
            </div>
            <div class="header-left-center">
                
            </div>
            <div class="header-right">
                <div class="header-right-item">
                    <div class="header-right-inner">
                        <div class="icon">
                            <span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.75 14.25V13.0155C15.75 12.4022 15.3766 11.8506 14.8071 11.6228L13.2815 11.0126C12.5571 10.7229 11.7316 11.0367 11.3828 11.7345L11.25 12C11.25 12 9.375 11.625 7.875 10.125C6.375 8.625 6 6.75 6 6.75L6.26551 6.61724C6.96328 6.26836 7.27714 5.44285 6.98741 4.71852L6.37717 3.19291C6.14937 2.62343 5.59781 2.25 4.98445 2.25H3.75C2.92157 2.25 2.25 2.92157 2.25 3.75C2.25 10.3774 7.62258 15.75 14.25 15.75C15.0784 15.75 15.75 15.0784 15.75 14.25Z"
                                        stroke-width="1.5" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="text">
                            <a href="tel:<?php echo e($section->top_ber_phone); ?>"><?php echo e($section->top_ber_phone); ?></a>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

    <!-- menu part start -->
    <nav class="menu-bg ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="nav-main">
                        <div class="nav-main">
                            <div class="logo">
                                <a href="<?php echo e(route('index')); ?>"> <img height="80" src="<?php echo e(asset('frontend/assets/images/logo/logo-header.png')); ?>"
                                        alt="logo"></a>
                            </div>
                            <div class="menu">
                                <ul>
                                    <?php if($setting->theam == 0): ?>
                                        <li><a href="<?php echo e(route('index')); ?>"><?php echo e(__('translate.Home')); ?>

                                            </a>
                                            
                                        </li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e(route('index')); ?>"><?php echo e(__('translate.Home')); ?></a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo e(route('menu')); ?>"><?php echo e(__('translate.Menu')); ?>

                                        </a>
                                    </li>
                                    <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('translate.About Us')); ?></a></li>
                                    <li><a href="#Reservation"><?php echo e(__('Reservation')); ?></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="nav-btn-main">
                            <div class="nav-btn-two">
                                <a <?php if(!auth()->user()): ?> href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModalLogin" <?php else: ?> href="<?php echo e(route('user.wishlist')); ?>" <?php endif; ?>>
                                    <div class="love">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.833 7.584C21.1216 7.584 22.1663 8.62867 22.1663 9.91733M13.9997 6.65363L14.7989 5.834C17.285 3.2845 21.3157 3.2845 23.8018 5.834C26.2211 8.31503 26.2954 12.3134 23.9701 14.8872L17.2893 22.2819C15.5145 24.2463 12.4848 24.2463 10.71 22.2819L4.02926 14.8873C1.70392 12.3135 1.77826 8.31506 4.19757 5.83402C6.68365 3.28451 10.7144 3.28452 13.2005 5.83402L13.9997 6.65363Z"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                </a>


                                <div class="love cart">
                                    <span id="carCount"><?php echo e(session('cart') ? count(session('cart')) : 0); ?></span>
                                    <div class="click" data-name="cart-dropdown">

                                    </div>
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.99967 4.66536H20.9997C23.577 4.66536 25.6663 6.7547 25.6663 9.33203V15.1654C25.6663 17.7427 23.577 19.832 20.9997 19.832H11.6663C9.08901 19.832 6.99967 17.7427 6.99967 15.1654V4.66536ZM6.99967 4.66536C6.99967 3.3767 5.95501 2.33203 4.66634 2.33203H2.33301"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M12.833 23.918C12.833 24.8845 12.0495 25.668 11.083 25.668C10.1165 25.668 9.33301 24.8845 9.33301 23.918C9.33301 22.9515 10.1165 22.168 11.083 22.168C12.0495 22.168 12.833 22.9515 12.833 23.918Z"
                                                stroke-width="1.5" />
                                            <path
                                                d="M23.333 23.918C23.333 24.8845 22.5495 25.668 21.583 25.668C20.6165 25.668 19.833 24.8845 19.833 23.918C19.833 22.9515 20.6165 22.168 21.583 22.168C22.5495 22.168 23.333 22.9515 23.333 23.918Z"
                                                stroke-width="1.5" />
                                            <path d="M16.333 9.33203L16.333 15.1654" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M19.2503 12.25L13.417 12.25" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>


                                    
                                </div>





                                <!-- login korar por aita show hobe  -->
                                <?php if(Auth::user()): ?>
                                    <div class="love user" id="profileDropdown">
                                        <div class="click" data-name="profile-dropdown">

                                        </div>
                                        <span style="color: #fff;">
                                            <?php echo e(strtok(Auth::user()->name, ' ')); ?>

                                            
                                        </span>


                                        <div class="profile-dropdown header-dropdown" id="profile-dropdown">
                                            

                                            <div class="profile-dropdown-text">
                                                <h4><?php echo e(Auth::user()->name); ?></h4>
                                                <p><?php echo e(__('translate.User Id')); ?> #<?php echo e(Auth::user()->id); ?></p>
                                            </div>



                                            <div class="profile-dropdown-menu">
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo e(route('user.order')); ?>">
                                                            <span>
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <ellipse cx="12" cy="17.5"
                                                                        rx="7" ry="3.5"
                                                                        stroke-width="1.5" stroke-linejoin="round" />
                                                                    <circle cx="12" cy="7" r="4"
                                                                        stroke-width="1.5" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                            <?php echo e(__('translate.Dashboard')); ?>


                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="profile-dropdown-menu profile-dropdown-menu-two ">
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo e(route('logout')); ?>">
                                                            <span>
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M20 14L21.2929 12.7071C21.6834 12.3166 21.6834 11.6834 21.2929 11.2929L20 10"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M21 12H13M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8"
                                                                        stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </span>

                                                            <?php echo e(__('translate.Logout')); ?>

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if(!Auth::user()): ?>
                                <div class="nav-login-btn-main">
                                    <a href="javascript:;"
                                    data-bs-toggle="modal" data-bs-target="#exampleModalLogin" class="main-btn-four custom-btn"><?php echo e(__('Log In')); ?></a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- mobile navigation start -->
<header class="mobile-header">
    
    <div class="container-full" style="background: #ff9a00;">
        <div class="mobile-header__container">
            <div class="p-left d-flex" style="z-index: 1;">
                <div class="logo">
                    <a href="<?php echo e(route('index')); ?>">
                        <img src="<?php echo e(asset('frontend/assets/images/logo/logo-header.png')); ?>" width="70" alt="logo">
                    </a>
                </div>
                <div style="text-align: center; margin-left: 30px;     align-self: center;">
                    <a style="font-wight: 700;font-size: 14px; color: white;" href="tel:<?php echo e($section->top_ber_phone); ?>"><i class="fa fa-phone"></i> <?php echo e($section->top_ber_phone); ?></a>
                    <p style="font-wight: 700;font-size: 11px; color: white; margin-top: 2px;">Opening hours: 4:00PM - 11:00PM</p>
                </div>
            </div>
            <div class="p-right" style="z-index: 1;">
                <button id="nav-opn-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<!-- offcanvas -->
<aside id="offcanvas-nav">
    <nav class="m-nav">
        <button id="nav-cls-btn"><i class="fa-solid fa-xmark"></i></button>
        <div class="logo">
            <a href="<?php echo e(route('index')); ?>">
                <img src="<?php echo e(asset('frontend/assets/images/logo/logo-header.png')); ?>" height="80" alt="logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="<?php echo e(route('index')); ?>"><?php echo e(__('translate.Home')); ?></a></li>
            <li><a href="<?php echo e(route('menu')); ?>"><?php echo e(__('translate.Menu')); ?></a></li>
            <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('translate.About Us')); ?></a></li>
            <li><a href="#Reservation"><?php echo e(__('Reservation')); ?></a></li>
            
        </ul>

    </nav>
</aside>
<!-- header part end  -->
<?php /**PATH /Applications/XAMPP/htdocs/food/resources/views/Frontend/Layouts/Partials/header3.blade.php ENDPATH**/ ?>