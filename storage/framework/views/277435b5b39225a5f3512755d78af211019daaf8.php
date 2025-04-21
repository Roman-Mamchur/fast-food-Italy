<?php $__env->startSection('title'); ?>
    <title><?php echo e($seo_setting->seo_title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="title" content="<?php echo e($seo_setting->seo_title); ?>">
    <meta name="description" content="<?php echo e($seo_setting->seo_description); ?>">
    <meta name="keywords" content="<?php echo e($seo_setting->seo_description); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .categories .categories-main-box .categories-item img {
            width: 50px;
            height: 50px;
        }

        .hide-desktop {
            display: none;
        }

        /* @media (max-width: 768px){
                    .hide-mobile{
                        display: none;
                    }
                    .hide-desktop {
                        display: block;
                    }
                } */
    </style>
    <main>
        <!-- .banner-part-start -->
        <section class="banner-two"
            style="background: url(<?php echo e(asset('frontend/assets/images/banner/Hero_Image_New.jpg')); ?>) no-repeat;     background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner-two-taitel">
                            
                            <h1 class="slider-desc-h1">Welcome To Midway Kebabish</h1>
                            <h1 class="slider-desc-2">ENJOY
                                QUALITY & TASTE <br> TOGETHER
                            </h1>
                            
                        </div>
                        <div class="banner-taiteL-btn">

                            <a href="#orderOnline" class="main-btn-four orderOnline mb-4">
                                <span>
                                    <svg width="29" height="30" viewBox="0 0 29 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22.6562 28.5938H6.34375C5.62269 28.5938 4.93117 28.3073 4.4213 27.7974C3.91144 27.2876 3.625 26.5961 3.625 25.875V4.125C3.625 3.40394 3.91144 2.71242 4.4213 2.20255C4.93117 1.69269 5.62269 1.40625 6.34375 1.40625H22.6562C23.3773 1.40625 24.0688 1.69269 24.5787 2.20255C25.0886 2.71242 25.375 3.40394 25.375 4.125V25.875C25.375 26.5961 25.0886 27.2876 24.5787 27.7974C24.0688 28.3073 23.3773 28.5938 22.6562 28.5938ZM6.34375 3.21875C6.1034 3.21875 5.87289 3.31423 5.70293 3.48418C5.53298 3.65414 5.4375 3.88465 5.4375 4.125V25.875C5.4375 26.1154 5.53298 26.3459 5.70293 26.5158C5.87289 26.6858 6.1034 26.7812 6.34375 26.7812H22.6562C22.8966 26.7812 23.1271 26.6858 23.2971 26.5158C23.467 26.3459 23.5625 26.1154 23.5625 25.875V4.125C23.5625 3.88465 23.467 3.65414 23.2971 3.48418C23.1271 3.31423 22.8966 3.21875 22.6562 3.21875H6.34375Z" />
                                        <path
                                            d="M19.4844 15.9062H9.51562C9.27527 15.9062 9.04476 15.8108 8.87481 15.6408C8.70485 15.4709 8.60938 15.2404 8.60938 15V13.1875C8.61081 11.7458 9.18415 10.3636 10.2036 9.3442C11.223 8.32478 12.6052 7.75144 14.0469 7.75H14.9531C16.3948 7.75144 17.777 8.32478 18.7964 9.3442C19.8158 10.3636 20.3892 11.7458 20.3906 13.1875V15C20.3906 15.2404 20.2951 15.4709 20.1252 15.6408C19.9552 15.8108 19.7247 15.9062 19.4844 15.9062ZM10.4219 14.0938H18.5781V13.1875C18.5781 12.2261 18.1962 11.3041 17.5164 10.6242C16.8366 9.94442 15.9145 9.5625 14.9531 9.5625H14.0469C13.0855 9.5625 12.1634 9.94442 11.4836 10.6242C10.8038 11.3041 10.4219 12.2261 10.4219 13.1875V14.0938Z" />
                                        <path
                                            d="M14.5 5.9375C14.9807 5.9375 15.4417 6.12846 15.7816 6.46837C16.1215 6.80828 16.3125 7.2693 16.3125 7.75V8.20312H12.6875V7.75C12.6875 7.2693 12.8785 6.80828 13.2184 6.46837C13.5583 6.12846 14.0193 5.9375 14.5 5.9375Z" />
                                        <path
                                            d="M20.8438 15.9062H8.15625C7.9159 15.9062 7.68539 15.8108 7.51543 15.6408C7.34548 15.4709 7.25 15.2404 7.25 15C7.25 14.7596 7.34548 14.5291 7.51543 14.3592C7.68539 14.1892 7.9159 14.0938 8.15625 14.0938H20.8438C21.0841 14.0938 21.3146 14.1892 21.4846 14.3592C21.6545 14.5291 21.75 14.7596 21.75 15C21.75 15.2404 21.6545 15.4709 21.4846 15.6408C21.3146 15.8108 21.0841 15.9062 20.8438 15.9062Z" />
                                        <path
                                            d="M19.0312 20.4375H9.96875C9.7284 20.4375 9.49789 20.342 9.32793 20.1721C9.15798 20.0021 9.0625 19.7716 9.0625 19.5312C9.0625 19.2909 9.15798 19.0604 9.32793 18.8904C9.49789 18.7205 9.7284 18.625 9.96875 18.625H19.0312C19.2716 18.625 19.5021 18.7205 19.6721 18.8904C19.842 19.0604 19.9375 19.2909 19.9375 19.5312C19.9375 19.7716 19.842 20.0021 19.6721 20.1721C19.5021 20.342 19.2716 20.4375 19.0312 20.4375Z" />
                                        <path
                                            d="M19.0312 24.0625H9.96875C9.7284 24.0625 9.49789 23.967 9.32793 23.7971C9.15798 23.6271 9.0625 23.3966 9.0625 23.1562C9.0625 22.9159 9.15798 22.6854 9.32793 22.5154C9.49789 22.3455 9.7284 22.25 9.96875 22.25H19.0312C19.2716 22.25 19.5021 22.3455 19.6721 22.5154C19.842 22.6854 19.9375 22.9159 19.9375 23.1562C19.9375 23.3966 19.842 23.6271 19.6721 23.7971C19.5021 23.967 19.2716 24.0625 19.0312 24.0625Z" />
                                    </svg>
                                </span>
                                <?php echo e(__('Order Now')); ?>

                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- .banner-part-end -->

        <!-- Traditional part-start -->
        <section class="categories row-categories-home food-details s-padding m-3" id="orderOnline">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="traditional-head">
                            <h2><?php echo e($section->traditional_food_titel); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <style>
                        #categorySelect {
                            background-color: var(--grey-scale-700);
                            color: white;
                        }

                        #categorySelect:focus {
                            border-color: transparent;
                            outline: 0;
                            box-shadow: 0 0 0 .25rem transparent;
                        }
                    </style>
                    
                </div>
                <div class="tab-pane fade show in active hide-mobile" id="grid" role="tabpanel">
                    <!-- Filter Title -->
                    <div class="row justify-content-center mt-2">
                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                            <ul class="shaf-filter course-filter customer-item-slick-row">
                                
                                <?php $__currentLoopData = $Allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Allcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="categories-item mx-1 text-center"
                                        style="border-radius: 10px;border: 1px solid var(--primary-color);">
                                        <a href="#<?php echo e($Allcategory->name); ?>" onclick="scrollToElementWithOffset('<?php echo e($Allcategory->name); ?>')" class="text-dark">
                                            <div class="categories-icon text-center">
                                                <img style="margin: auto" src="<?php echo e(asset($Allcategory->image)); ?>"
                                                    height="80" alt="<?php echo e($Allcategory->name); ?>">
                                            </div>
                                            <div class="categories-item-text line-clamp-1 text-center">
                                                <h6><?php echo e($Allcategory->name); ?></h6>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Grid Tab -->
                <div class="tab-pane fade show mt-3 in active" id="grid" role="tabpanel">
                    <!-- Filter Title -->
                    <div class="row justify-content-center">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 pt-2 pb-3">
                            
                            
                            <?php $__currentLoopData = $Allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Allcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    // Check if there are any products in this category
                                    $categoryProducts = App\Models\Product::where('category_id', $Allcategory->id)
                                        ->orderBy('position', 'asc')
                                        ->get();
                                ?>


                                <?php if($categoryProducts->count() > 0): ?>
                                    <div id="<?php echo e($Allcategory->name); ?>"></div>
                                    <div class="d-flex justify-content-center">
                                        
                                        <div class="categories-item-text line-clamp-1" style="align-self: center;">
                                            <h3><?php echo e($Allcategory->name); ?></h3>
                                        </div>
                                    </div>
                                    <div class="row mt-4 product-list" data-category-id="<?php echo e($Allcategory->id); ?>">

                                        <?php $__currentLoopData = $categoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($product2->category_id == $Allcategory->id): ?>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 shaf-item res-mb-20px product-item"
                                                    >

                                                    <div class="featured-item">
                                                        <?php if($product2->is_populer == 1): ?>
                                                            <div class="featured-item-img-populer">

                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="featured-item-img">
                                                            <img src="<?php echo e(asset($product2['tumb_image'])); ?>"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal<?php echo e($product2['id']); ?>"
                                                                class="w-100" alt="featured-thumb">
                                                            <div class="featured-item-img-overlay">
                                                                <div class="featured-item-img-over-text">
                                                                    <div class="left-text">
                                                                        <?php
                                                                                                                                             $whish = null;
                                                                        if (auth()->check()) {
                                                                            $whish = App\Models\Wishlist::where('product_id', $product2->id)
                                                                                ->where('user_id', auth()->id()) // Use auth()->id() instead of auth()->user()->id
                                                                                ->first();
                                                                        }
                                                                        ?>

                                                                        <a href="#" class="wishlist-btn"
                                                                            <?php if($whish === null): ?> style="display: block;" <?php else: ?> style="display: none;" <?php endif; ?>
                                                                            data-action="add"
                                                                            id="btn-display<?php echo e($product2->id); ?>"
                                                                            data-product-id="<?php echo e($product2->id); ?>">
                                                                            <div class="icon">
                                                                                <span>
                                                                                    <svg width="20" height="20"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M4.31804 6.31804C3.90017 6.7359 3.5687 7.23198 3.34255 7.77795C3.1164 8.32392 3 8.90909 3 9.50004C3 10.091 3.1164 10.6762 3.34255 11.2221C3.5687 11.7681 3.90017 12.2642 4.31804 12.682L12 20.364L19.682 12.682C20.526 11.8381 21.0001 10.6935 21.0001 9.50004C21.0001 8.30656 20.526 7.16196 19.682 6.31804C18.8381 5.47412 17.6935 5.00001 16.5 5.00001C15.3066 5.00001 14.162 5.47412 13.318 6.31804L12 7.63604L10.682 6.31804C10.2642 5.90017 9.7681 5.5687 9.22213 5.34255C8.67616 5.1164 8.09099 5 7.50004 5C6.90909 5 6.32392 5.1164 5.77795 5.34255C5.23198 5.5687 4.7359 5.90017 4.31804 6.31804V6.31804Z"
                                                                                            stroke="#F01543"
                                                                                            stroke-width="2"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" />
                                                                                    </svg>
                                                                                </span>
                                                                            </div>
                                                                        </a>

                                                                        <a href="#" class="wishlist-btn"
                                                                            id="btn-remove<?php echo e($product2->id); ?>"
                                                                            <?php if($whish === null): ?> style="display: none;" <?php else: ?> style="display: block;" <?php endif; ?>
                                                                            data-action="remove"
                                                                            data-product-id="<?php echo e($product2->id); ?>">
                                                                            <div class="icon">
                                                                                <span>
                                                                                    <svg width="20" height="20"
                                                                                        viewBox="0 0 20 20" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M8.361 2.72748C9.03157 1.3148 10.9691 1.3148 11.6396 2.72748L12.7986 5.16895C13.0649 5.72993 13.5796 6.11875 14.175 6.20871L16.7664 6.60021C18.2659 6.82675 18.8646 8.74259 17.7796 9.84221L15.9044 11.7426C15.4736 12.1793 15.277 12.8084 15.3787 13.425L15.8213 16.1084C16.0775 17.6611 14.51 18.8452 13.1689 18.1121L10.851 16.8451C10.3184 16.554 9.68221 16.554 9.14964 16.8451L6.8318 18.1121C5.49065 18.8452 3.92318 17.6611 4.17931 16.1084L4.62198 13.425C4.72369 12.8084 4.52709 12.1793 4.09623 11.7426L2.22105 9.84221C1.13605 8.74259 1.73477 6.82675 3.23421 6.60021L5.82564 6.20871C6.42107 6.11875 6.9358 5.72993 7.20208 5.16895L8.361 2.72748Z"
                                                                                            fill="#FFB23E"></path>
                                                                                    </svg>
                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                                                        $discount =
                                                                            $product2->price - $product2->offer_price;
                                                                        $discountPercentage =
                                                                            ($discount / $product2->price) * 100;
                                                                    ?>
                                                                    <?php if($discountPercentage != 100.0): ?>
                                                                        <div class="right-text">
                                                                            <h5><?php echo e(number_format($discountPercentage, 2)); ?>%
                                                                                <?php echo e(__('translate.Off')); ?> </h5>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="featured-item-text">
                                                            <div class="text-item">
                                                                <div class="left">
                                                                    <?php if(json_decode($product2['size'], true) === '{"":""}'): ?>
                                                                        <h3><?php echo e($setting->currency_icon); ?><?php echo e(number_format($product2->price, 2)); ?>

                                                                        </h3>
                                                                    <?php else: ?>
                                                                        <?php
                                                                            $prices = array_map(
                                                                                fn($price) => (float) $price,
                                                                                json_decode($product2->size, true),
                                                                            );
                                                                        ?>
                                                                        <h3>
                                                                            <?php if(min($prices) > 0 && max($prices) > 0): ?>
                                                                                <?php echo e($setting->currency_icon); ?><?php echo e(number_format(min($prices), 2)); ?>

                                                                                -
                                                                                <?php echo e($setting->currency_icon); ?><?php echo e(number_format(max($prices), 2)); ?>

                                                                            <?php elseif(min($prices) > 0): ?>
                                                                                <?php echo e($setting->currency_icon); ?><?php echo e(number_format(min($prices), 2)); ?>

                                                                            <?php elseif(max($prices) > 0): ?>
                                                                                <?php echo e($setting->currency_icon); ?><?php echo e(number_format(max($prices), 2)); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e($setting->currency_icon); ?><?php echo e(number_format($product2->price, 2)); ?>

                                                                            <?php endif; ?>
                                                                        </h3>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="right">
                                                                </div>
                                                            </div>

                                                            <div class="text-item-center">
                                                                <h3><a class="line-clamp-1" href="javascript:;"
                                                                        title="<?php echo e($product2->name); ?>"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal<?php echo e($product2['id']); ?>"><?php echo e($product2->name); ?></a>
                                                                </h3>
                                                            </div>

                                                            <div class="text-item-center-item-box">
                                                                <?php $__currentLoopData = json_decode($product2->specifaction, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="text-item-center-item">
                                                                        <div class="icon">
                                                                            <span>
                                                                                <svg width="18" height="18"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M8 12L10.5347 14.2812C10.9662 14.6696 11.6366 14.6101 11.993 14.1519L16 9M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                                                        stroke="#FE724C"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </span>
                                                                        </div>

                                                                        <span class="span-s"><?php echo e($name); ?></span>
                                                                    </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="featured-item-btn">
                                                                        <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal<?php echo e($product2['id']); ?>"
                                                                            class="main-btn-three">
                                                                            
                                                                            Add +
                                                                        </button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                                
                                
                                <!-- Filter Content -->

                                <!-- Filter Content -->

                                <!-- See More Button -->
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                    </div>
                    <!-- Filter Title -->


                </div>

            </div>
        </section>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const seeMoreButtons = document.querySelectorAll(".see-more-btn");

                seeMoreButtons.forEach((button) => {
                    button.addEventListener("click", (e) => {
                        const categoryId = button.getAttribute("data-category-id");
                        const productList = document.querySelector(
                            `.product-list[data-category-id="${categoryId}"]`);
                        const hiddenItems = productList.querySelectorAll(
                            '.product-item[data-visible="false"]');

                        hiddenItems.forEach((item) => {
                            item.style.display = "block";
                            item.setAttribute("data-visible", "true");
                        });

                        button.style.display =
                            "none"; // Hide the "See More" button after showing all products
                    });
                });
            });
        </script>
        <!-- Traditional part-end -->
        




        <!-- Process part-start -->

        <section class="process s-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 ">
                        <div class="process-img-box">
                            <div class="process-img">
                                <img src="<?php echo e(asset($crafting->image)); ?>" alt="thumb">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="process-head">
                            <h2><?php echo e($crafting->title); ?></h2>
                        </div>

                        <div class="process-item-box">
                            
                            <div class="process-item">
                                <div class="process-item-icon">
                                    <div class="icon">
                                        <span>
                                            <svg width="34" height="30" viewBox="0 0 34 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M3.66634 10H0.333008V25L7.51773 28.5924C9.36914 29.5181 11.4106 30 13.4806 30H26.9997C28.8406 30 30.333 28.5076 30.333 26.6667C30.333 24.8257 28.8406 23.3333 26.9997 23.3333H24.3604C22.8079 23.3333 21.2768 22.9719 19.8882 22.2776L14.9863 19.8267C15.3068 19.5315 15.5716 19.1655 15.7544 18.739C16.4436 17.1307 15.7065 15.2676 14.1034 14.5662L3.66634 10Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M20.666 0C19.5614 0 18.666 0.89543 18.666 2V13C18.666 14.1046 19.5614 15 20.666 15H31.666C32.7706 15 33.666 14.1046 33.666 13V2C33.666 0.895431 32.7706 0 31.666 0H20.666ZM27.8327 6.25C28.523 6.25 29.0827 5.69036 29.0827 5C29.0827 4.30964 28.523 3.75 27.8327 3.75H24.4993C23.809 3.75 23.2493 4.30964 23.2493 5C23.2493 5.69036 23.809 6.25 24.4993 6.25H27.8327Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </div>


                                </div>

                                <div class="text">
                                    <h3><?php echo e($crafting->step_2); ?></h3>
                                    
                                </div>

                                <div class="process-item-right-img two">

                                </div>
                            </div>
                            <div class="process-item">
                                <div class="process-item-icon">
                                    <div class="icon">
                                        <span>
                                            <svg width="24" height="34" viewBox="0 0 24 34" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M16.6667 0.332031H3.33333C1.49238 0.332031 0 1.82442 0 3.66537V30.332C0 32.173 1.49238 33.6654 3.33333 33.6654H16.6667C18.5076 33.6654 20 32.173 20 30.332V3.66536C20 1.82442 18.5076 0.332031 16.6667 0.332031Z"
                                                    fill="white" />
                                                <path
                                                    d="M10 8.66406H20C21.8409 8.66406 23.3333 10.1564 23.3333 11.9974V18.6641C23.3333 20.505 21.8409 21.9974 20 21.9974H10V8.66406Z"
                                                    fill="white" />
                                                <path
                                                    d="M11.6663 28.6667C11.6663 29.5871 10.9201 30.3333 9.99967 30.3333C9.0792 30.3333 8.33301 29.5871 8.33301 28.6667C8.33301 27.7462 9.0792 27 9.99967 27C10.9201 27 11.6663 27.7462 11.6663 28.6667Z"
                                                    fill="white" />
                                                <path opacity="0.4"
                                                    d="M9.99968 14.5L23.333 14.5L23.333 12L9.99968 12L9.99968 14.5Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </div>


                                </div>

                                <div class="text">
                                    <h3><?php echo e($crafting->step_3); ?></h3>
                                    
                                </div>

                                <div class="process-item-right-img three">

                                </div>
                            </div>
                            <div class="process-item">
                                <div class="process-item-icon">
                                    <div class="icon">
                                        <span>
                                            <svg width="34" height="31" viewBox="0 0 34 31" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M13.6663 0H6.99967C3.31778 0 0.333008 2.98477 0.333008 6.66667V20C0.333008 23.1087 2.46079 25.7204 5.33942 26.4583C5.44698 24.7144 6.89538 23.3333 8.66634 23.3333C10.5073 23.3333 11.9997 24.8257 11.9997 26.6667H20.333V6.66667C20.333 2.98477 17.3482 0 13.6663 0Z"
                                                    fill="white" />
                                                <path
                                                    d="M20.333 26.668V6.66797H25.6815C26.5284 6.66797 27.3435 6.9903 27.9613 7.56951L32.6128 11.9303C33.285 12.5604 33.6663 13.4407 33.6663 14.3621V23.3346C33.6663 25.1756 32.174 26.668 30.333 26.668H20.333Z"
                                                    fill="white" />
                                                <path
                                                    d="M12.8333 26.6667C12.8333 28.9679 10.9679 30.8333 8.66667 30.8333C6.36548 30.8333 4.5 28.9679 4.5 26.6667C4.5 26.5792 4.5027 26.4923 4.50801 26.4062C4.64247 24.2263 6.45296 22.5 8.66667 22.5C10.9679 22.5 12.8333 24.3655 12.8333 26.6667Z"
                                                    fill="white" />
                                                <path opacity="0.4"
                                                    d="M31.1587 26.6667C31.1587 28.9679 29.2932 30.8333 26.992 30.8333C24.6908 30.8333 22.8253 28.9679 22.8253 26.6667C22.8253 26.5792 22.828 26.4923 22.8333 26.4062C22.9678 24.2263 24.7783 22.5 26.992 22.5C29.2932 22.5 31.1587 24.3655 31.1587 26.6667Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.08301 8.33203C9.08301 7.64168 9.64265 7.08203 10.333 7.08203L13.6663 7.08203C14.3567 7.08203 14.9163 7.64168 14.9163 8.33203C14.9163 9.02239 14.3567 9.58203 13.6663 9.58203L10.333 9.58203C9.64265 9.58203 9.08301 9.02239 9.08301 8.33203Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.75 15C5.75 14.3096 6.30964 13.75 7 13.75L13.6667 13.75C14.357 13.75 14.9167 14.3096 14.9167 15C14.9167 15.6904 14.357 16.25 13.6667 16.25H7C6.30964 16.25 5.75 15.6904 5.75 15Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </div>


                                </div>

                                <div class="text">
                                    <h3><?php echo e($crafting->step_4); ?></h3>
                                    
                                </div>

                                <div class="process-item-right-img four">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Process part-end -->
        <section class="categories rese  s-padding" id="Reservation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 p-3"
                        style="background: url(<?php echo e(asset('/frontend/assets/images/reser-back.png')); ?>); background-repeat: no-repeat;">
                        <h5 class="text-danger mt-2">Book Pre-Orders</h5>
                        <h2 class="text-danger">Party & Ceremony Orders</h2>
                        <div class="contact-us-from mt-2">
                            <form action="<?php echo e(route('reservation')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="from">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="from-item from-item-two">
                                                <div class="from-inner">
                                                    <style>
                                                        .input-group {
                                                            display: flex;
                                                            align-items: center;
                                                        }

                                                        .input-group-text {
                                                            background-color: transparent;
                                                            border: none;
                                                            padding: 0 8px;
                                                            cursor: pointer;
                                                        }

                                                        .input-group .form-control {
                                                            flex: 1;
                                                        }
                                                    </style>
                                                    
                                                    
                                                    <!-- Replace with your icon -->
                                                    <input placeholder="<?php echo e(__('Order Date')); ?>" type="text"
                                                        class="form-control" name="date" value="<?php echo e(old('date')); ?>"
                                                        id="orderDate" onfocus="(this.type='date')"
                                                        onblur="(this.type='text')">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="from-item from-item-two ">
                                                <div class="from-inner">
                                                    
                                                    
                                                    <input type="text" class="form-control" name="time"
                                                        value="<?php echo e(old('time')); ?>" id="exampleFormControlInput4"
                                                        placeholder="<?php echo e(__('Order Time')); ?>" onfocus="(this.type='time')"
                                                        onblur="if(!this.value) this.type='text'">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="from-item from-item-two ">
                                                <div class="from-inner">
                                                    <label class="form-label"><?php echo e(__('Email')); ?>*</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="<?php echo e(old('email')); ?>"
                                                        placeholder="<?php echo e(__('Enter email')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="from-item from-item-two ">
                                                <div class="from-inner">
                                                    <label class="form-label"
                                                        id="exampleFormControlInput6"><?php echo e(__('Phone')); ?>*</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        value="<?php echo e(old('phone')); ?>" id="exampleFormControlInput6"
                                                        placeholder="<?php echo e(__('Phone Number')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="from-item from-item-two">
                                                <div class="from-inner">
                                                    <label class="form-label"><?php echo e(__('Order Details')); ?>*</label>
                                                    <textarea name="details" class="form-control" id="" cols="30" rows="5"
                                                        placeholder="<?php echo e(__('Your Order Details')); ?>"></textarea>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    

                                    <div class="from-btn mt-2     text-center">
                                        <button class="main-btn-four" type="submit"><?php echo e(__('Book Pre Order')); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <img src="<?php echo e(asset('/frontend/assets/images/reser.png')); ?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <!-- Customer part-start -->
        <section class="customer s-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="customer-head mb-48px">
                            <h2><?php echo e($section->testonimal_titel); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row customer-item-slick-testonimal">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="customer-item">
                                <div class="customer-img">

                                </div>
                                <div class="customer-item-text">
                                    <p><?php echo clean($testimonial->comment); ?></p>
                                </div>
                            </div>

                            <div class="customer-inner">
                                <div class="customer-inner-img">
                                    <img src="<?php echo e(asset($testimonial->image)); ?>" alt="img">
                                </div>

                                <div class="customer-inner-text">
                                    <div class="icon">

                                    </div>

                                    <h3><?php echo e($testimonial->name); ?></h3>
                                    <h5><?php echo e($testimonial->designation); ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
        <!-- Customer part-end -->
        <div class="map-section" style="padding-top: 20px;padding-bottom: 0!important">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <iframe src="<?php echo e($contactus->google_map); ?>" width="1320" height="350"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script></script>
    <style>
        .contact-us-from .form-label {
            opacity: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Layouts.master3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/htdocs/food/resources/views/Frontend/Pages/index2.blade.php ENDPATH**/ ?>