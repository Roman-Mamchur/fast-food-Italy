<?php $__env->startSection('title'); ?>
    <title><?php echo e($seo_setting->seo_title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="title" content="<?php echo e($seo_setting->seo_title); ?>">
    <meta name="description" content="<?php echo e($seo_setting->seo_description); ?>">
    <meta name="keywords" content="<?php echo e($seo_setting->seo_description); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <main>
        <!-- banner  -->
       
        
































        <div class="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-banner-head">
                            <h1><?php echo e(__('translate.Our Menu')); ?></h1>
                        </div>
                        <!-- This section will be shown only on large screens and above -->
                        <div class="inner-banner-item d-none d-lg-flex">
                            <div class="left">
                                <a href="<?php echo e(route('index')); ?>"><?php echo e(__('translate.Home')); ?></a>
                            </div>
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 7L14 12L10 17" stroke="#E5E6EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="left">
                                <span><?php echo e(__('translate.Our Menu')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Dropdown Section Below Breadcrumbs -->
                <div class="row d-none mobile-show">
                    <div class="col-md-9">
                        <div class="food-details-btn-box">
                            <div class="food-details-btn-box-item">
                                <form method="GET" class="food-details-btn-box-item">
                                    <select class="form-select" name="category" aria-label="Select Category">
                                        <option><?php echo e(__('translate.Select Category')); ?></option>
                                        <?php $__currentLoopData = $Allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option 
                                                value="<?php echo e($category->slug); ?>"
                                                <?php echo e(request()->get('category') == $category->slug || 'chips' == $category->slug ? 'selected' : ''); ?>>
                                                <?php echo e($category->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Dropdown Section -->
            </div>
        </div>
        
        
        
        <!-- Custom CSS to make it look attractive and user-friendly -->
        <style>
            .inner-banner {
                background-color: #f8f9fa;
                padding: 10rem 0 3rem 0;
                border-bottom: 1px solid #e2e2e2;
            }
        
            .inner-banner-head h1 {
                font-size: 2.5rem;
                color: #333;
                font-weight: bold;
            }
        
            .inner-banner-item {
                display: flex;
                align-items: center;
                margin-top: 10px;
            }
        
            .inner-banner-item .left {
                font-size: 1rem;
                color: #007bff;
                text-decoration: none;
                margin-right: 10px;
            }
        
            .inner-banner-item .icon {
                margin-right: 10px;
            }
        
            .food-details-btn-box {
                margin-top: 30px;
                text-align: center;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        
            .food-details-btn-box select {
                width: 100%;
                max-width: 400px;
                padding: 12px;
                font-size: 1rem;
                border: 1px solid #ddd;
                border-radius: 5px;
                background-color: #f7f7f7;
                cursor: pointer;
                transition: all 0.3s ease;
            }
        
            .food-details-btn-box select:hover {
                border-color: #007bff;
                background-color: #e9f7fe;
            }
        
            .food-details-btn-box select:focus {
                border-color: #0056b3;
                outline: none;
                background-color: #e9f7fe;
            }
        
            /* Mobile-Friendly Styling */
            @media (max-width: 768px) {
                .inner-banner-head h1 {
                    font-size: 2rem;
                }
        
                .food-details-btn-box {
                    padding: 15px;
                }
        
                .food-details-btn-box select {
                    max-width: 100%;
                }
            }
        </style>
        

        <!-- banner  -->

        <!-- Food Details part start  -->
        <style>
            @media(max-width: 768px) {
                .mobile-show {
                    display: block !important;
                }

                .mobile-hide {
                    display: none !important;
                }
            }

            .active-box {
                background: var(--primary-color);
                color: #fff;
            }
        </style>

        <section class="food-details   ">
            <div class="container">













                














                <div class="row">
                    <div class="col-md-3 col-sm-12 mobile-hide">
                        <ul class="row gap-1">
                            <?php $__currentLoopData = $Allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li style="cursor: pointer; font-size: 16px;padding: 10px 5px;
    border: 1px solid var(--primary-color);
    border-radius: 10px;"
                                    class="nav-item text-center col-md-5 updateCategoryProduct"
                                    data-id="<?php echo e(strtolower($category->slug)); ?>">
                                    <div class="categories-icon">
                                        <img src="<?php echo e(asset($category->image)); ?>" height="50"
                                            alt="<?php echo e($category->name); ?>">
                                    </div>
                                    <?php echo e($category->name); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <div class="col-lg-9">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">

                                <div class="row g-4" id="productsContainer">
                                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class=" col-xxl-4 col-xl-6  col-lg-6 col-md-6 featured-item-mt "
                                            data-category="<?php echo e(implode(',', $product->cat_name->pluck('slug')->toArray())); ?>"
                                            data-search="<?php echo e($product->name); ?>">
                                            <div class="featured-item">
                                                <?php if($product->is_populer == 1): ?>
                                                    <div class="featured-item-img-populer">

                                                    </div>
                                                <?php endif; ?>
                                                <div class="featured-item-img">
                                                    <img src="<?php echo e(asset($product['tumb_image'])); ?>" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal<?php echo e($product['id']); ?>" class="w-100"
                                                        alt="featured-thumb">

                                                    <div class="featured-item-img-overlay">
                                                        <div class="featured-item-img-over-text">
                                                            <div class="left-text">
                                                                <?php
                                                                    $whish = null;
                                                                        if (auth()->check()) {
                                                                            $whish = App\Models\Wishlist::where('product_id', $product->id)
                                                                                ->where('user_id', auth()->id()) // Use auth()->id() instead of auth()->user()->id
                                                                                ->first();
                                                                        }
                                                                ?>
                                                                <a href="#" class="wishlist-btn"
                                                                    <?php if($whish === null): ?> style="display: block;" <?php else: ?> style="display: none;" <?php endif; ?>
                                                                    data-action="add" id="btn-display<?php echo e($product->id); ?>"
                                                                    data-product-id="<?php echo e($product->id); ?>">
                                                                    <div class="icon">
                                                                        <span>
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M4.31804 6.31804C3.90017 6.7359 3.5687 7.23198 3.34255 7.77795C3.1164 8.32392 3 8.90909 3 9.50004C3 10.091 3.1164 10.6762 3.34255 11.2221C3.5687 11.7681 3.90017 12.2642 4.31804 12.682L12 20.364L19.682 12.682C20.526 11.8381 21.0001 10.6935 21.0001 9.50004C21.0001 8.30656 20.526 7.16196 19.682 6.31804C18.8381 5.47412 17.6935 5.00001 16.5 5.00001C15.3066 5.00001 14.162 5.47412 13.318 6.31804L12 7.63604L10.682 6.31804C10.2642 5.90017 9.7681 5.5687 9.22213 5.34255C8.67616 5.1164 8.09099 5 7.50004 5C6.90909 5 6.32392 5.1164 5.77795 5.34255C5.23198 5.5687 4.7359 5.90017 4.31804 6.31804V6.31804Z"
                                                                                    stroke="#F01543" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                </a>

                                                                <a href="#" class="wishlist-btn"
                                                                    id="btn-remove<?php echo e($product->id); ?>"
                                                                    <?php if($whish === null): ?> style="display: none;" <?php else: ?> style="display: block;" <?php endif; ?>
                                                                    data-action="remove"
                                                                    data-product-id="<?php echo e($product->id); ?>">
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
                                                                $discount = $product->price - $product->offer_price;
                                                                $discountPercentage =
                                                                    ($discount / $product->price) * 100;
                                                            ?>
                                                            <?php if($discountPercentage != 100.0): ?>
                                                                <div class="right-text">
                                                                    <h5><?php echo e(number_format($discountPercentage, 2)); ?>% Off
                                                                    </h5>
                                                                </div>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="featured-item-text">
                                                    <div class="text-item">
                                                        <div class="left">
                                                            <h3><?php echo e($setting->currency_icon); ?><?php echo e(number_format($product->price, 2)); ?>

                                                            </h3>
                                                        </div>
                                                    </div>

                                                    <div class="text-item-center">
                                                        <h3><a title="<?php echo e($product->name); ?>" href="javascript:;"
                                                                class="line-clamp-1" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal<?php echo e($product['id']); ?>"><?php echo e($product->name); ?></a>
                                                        </h3>
                                                    </div>

                                                    <div class="text-item-center-item-box">
                                                        <?php $__currentLoopData = json_decode($product->specifaction, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($name): ?>
                                                            <div class="text-item-center-item">
                                                                <div class="icon">
                                                                    <span>
                                                                        <svg width="20" height="20"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M8 12L10.5347 14.2812C10.9662 14.6696 11.6366 14.6101 11.993 14.1519L16 9M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                                                stroke="#FE724C" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </span>
                                                                </div>

                                                                <div class="text">
                                                                    <h5><?php echo e($name); ?></h5>
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="featured-item-btn">
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal<?php echo e($product['id']); ?>"
                                                                class="main-btn-three">
                                                                
                                                                Add +
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="col-12 blog-mt-25px text-center cart_empty_area">
                                            <img class="sorry-img" src="<?php echo e(asset($setting->empty_result)); ?>">
                                            <h3 class="sorry-text"><?php echo e(__('translate.Sorry!! Product not found.')); ?></h3>
                                            <p class="mb-4">
                                                <?php echo e(__('translate.Whoops... this information is not available for a moment')); ?>

                                            </p>
                                            <a class="main-btn-four"
                                                href="<?php echo e(route('menu')); ?>"><span><?php echo e(__('translate.Back to Menu')); ?></span></a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <style>
                                        .text-center nav ul.pagination {
                                            justify-content: center;
                                        }
                                    </style>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </section>

    </main>
    <script>
        $(document).ready(function() {

            // Trigger the filtering logic when the input or select changes
            $('select[name="category"]').on('input change', function() {
                const selectedCategory = $('select[name="category"]').val().toLowerCase();

                // Iterate over each product
                $('#productsContainer > div[data-category]').each(function() {
                    const productCategory = $(this).data('category')
                        .toLowerCase(); // Categories (comma-separated)
                    const productName = $(this).data('search').toLowerCase(); // Product name

                    // Check if the product matches the selected category and the search keyword
                    const matchesCategory = !selectedCategory || productCategory.split(',')
                        .includes(selectedCategory);


                    // Show or hide the product based on matches
                    if (matchesCategory) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            setTimeout(() => {
                $('.updateCategoryProduct:first').trigger('click');
            }, 100);
            $('.updateCategoryProduct').on('click', function() {
                const selectedCategory = $(this).attr('data-id');
                $('.updateCategoryProduct').removeClass('active-box');
                $(this).addClass('active-box');
                console.log(selectedCategory);
                // Iterate over each product
                $('#productsContainer > div[data-category]').each(function() {
                    const productCategory = $(this).data('category')
                        .toLowerCase(); // Categories (comma-separated)
                    const productName = $(this).data('search').toLowerCase(); // Product name

                    // Check if the product matches the selected category and the search keyword
                    const matchesCategory = !selectedCategory || productCategory.split(',')
                        .includes(selectedCategory);


                    // Show or hide the product based on matches
                    if (matchesCategory) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/htdocs/food/resources/views/Frontend/Pages/menu.blade.php ENDPATH**/ ?>