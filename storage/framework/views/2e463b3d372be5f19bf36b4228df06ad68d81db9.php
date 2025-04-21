<?php
    $section = App\Models\SectionTitel::first();
    $footer = App\Models\Footer::first();
    $TawkChat = App\Models\TawkChat::first();
    $gallery = App\Models\Gallery::get();

    $social_link = App\Models\FooterSocialLink::get();
?>
<div id="loaderofForm1"
    style="display: none;     position: fixed;
                z-index: 9999;
                height: 100%;
                width: 100%;
                top: 40%;
                text-align: center;">
    <div class="spinner-border text-danger" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
<section class="shopping-cart">
    <!-- modal  -->
    <?php
        $products = App\Models\Product::where('status', 'active')->get();
        $contactus = App\Models\ContactPage::with('translate_contactus')->first();
    ?>
    <?php $idcounter = 0; ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productmodel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="exampleModal<?php echo e($productmodel['id']); ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    <form action="<?php echo e(route('cart.add.detils')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($productmodel->id); ?>" name="product_id" required>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="featured-item-img">
                                        <img src="<?php echo e(asset($productmodel['tumb_image'])); ?>" class="w-100"
                                            alt="featured-thumb">
                                    </div>
                                    
                                </div>
                                <div class="col-md-7">
                                    <div class="modal-body-text">
                                        <h3> <?php echo e($productmodel->name); ?></h3>
                                        <p style="    color: var(--primary-color);">
                                            <?php if($productmodel->size === '{"":""}'): ?>
                                                <?php echo e($setting->currency_icon); ?><?php echo e(number_format($productmodel->price, 2)); ?>

                                            <?php else: ?>
                                                <?php
                                                    $prices = array_map(
                                                        fn($price) => (float) $price,
                                                        json_decode($productmodel->size, true),
                                                    );
                                                ?>
                                                <?php if(min($prices) > 0 && max($prices) > 0): ?>
                                                    <?php echo e($setting->currency_icon); ?><?php echo e(number_format(min($prices), 2)); ?>

                                                    -
                                                    <?php echo e($setting->currency_icon); ?><?php echo e(number_format(max($prices), 2)); ?>

                                                <?php elseif(min($prices) > 0): ?>
                                                    <?php echo e($setting->currency_icon); ?><?php echo e(number_format(min($prices), 2)); ?>

                                                <?php elseif(max($prices) > 0): ?>
                                                    <?php echo e($setting->currency_icon); ?><?php echo e(number_format(max($prices), 2)); ?>

                                                <?php else: ?>
                                                    <?php echo e($setting->currency_icon); ?><?php echo e(number_format($productmodel->price, 2)); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="modal-body-item-box">
                                        <?php if(json_decode($productmodel->specifaction, true)): ?>
                                            <div class="text-item-center-item-box">
                                                <?php $__currentLoopData = json_decode($productmodel->specifaction, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="d-flex gap-3 my-1">
                                                        <div class="icon">
                                                            <span>
                                                                <svg width="20" height="20" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8 12L10.5347 14.2812C10.9662 14.6696 11.6366 14.6101 11.993 14.1519L16 9M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                                        stroke="#FE724C" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                        </div>

                                                        <div class="text" style="    align-self: center;">
                                                            <h6><?php echo e($name); ?></h6>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($productmodel->size !== '{"":""}'): ?>
                                            <div class="together-box-text">
                                                <h5><?php echo e(__('translate.Select Size')); ?></h5>
                                            </div>

                                            <?php $__currentLoopData = json_decode($productmodel->size, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="together-box-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="size"
                                                            value="<?php echo e($size); ?>,<?php echo e($price); ?>"
                                                            data-id="<?php echo e($productmodel->id); ?>"
                                                            id="size_<?php echo e($idcounter); ?>"
                                                            data-info="<?php echo e($size); ?>,<?php echo e($price); ?>"
                                                            required>
                                                        <label class="form-check-label d-flex justify-content-between"
                                                            for="size_<?php echo e($idcounter); ?>">
                                                            <?php echo e($size); ?>

                                                            <div class="form-check-btn">
                                                                <div class="grid">
                                                                    <?php echo e($setting->currency_icon); ?> <?php echo e($price); ?>

                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php $idcounter++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <input type="text" id="priceSingle<?php echo e($productmodel->id); ?>"
                                                value="<?php echo e($productmodel->price); ?>" hidden>
                                        <?php endif; ?>
                                        <?php if(json_decode($productmodel->items)): ?>
                                            <div class="modal-body-item-box-text">
                                                <h5><?php echo e(__('translate.Select Addon (Optional)')); ?></h5>
                                            </div>
                                            <?php $__currentLoopData = json_decode($productmodel->items, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $addons = App\Models\OptionalItem::where('id', $id)->get();
                                                ?>
                                                <?php $__currentLoopData = $addons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="together-box-item">
                                                        <div class="form-check">

                                                            <input class="form-check-input" type="checkbox"
                                                                name="addons[]" value="<?php echo e($addon->id); ?>"
                                                                data-id="<?php echo e($productmodel->id); ?>"
                                                                data-addonsprice="<?php echo e($addon->price); ?>"
                                                                id="addon_<?php echo e($loop->parent->index); ?>_<?php echo e($loop->index); ?>"
                                                                <?php if(isset($item['addons'][$addon->id])): ?> checked <?php endif; ?>>
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                <?php echo e($addon->name); ?>

                                                            </label>
                                                        </div>

                                                        <div class="form-check-btn">
                                                            <div class="form-check-btn">
                                                                <div class="grid">
                                                                    <?php echo e($setting->currency_icon); ?><?php echo e(number_format($addon->price, 2)); ?>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php if($productmodel->special_instructions): ?>
                                            <h5 class="text-left">Special Instructions</h5>
                                            <p class="text-left"> <?php echo e(strip_tags($productmodel->special_instructions)); ?>

                                            </p>
                                        <?php endif; ?>
                                        <div class="sign-up-from-inner text-start">
                                            <label for="exampleFormControlInput2"
                                                class="form-label"><?php echo e(__('Note')); ?></label>

                                            <textarea class="form-control" row="8" style="height: auto;" placeholder="Type here" type="text"
                                                id="notes" name="note"></textarea>

                                        </div>
                                        <div class="together-box-inner-btn-btm d-flex gap-3">
                                            <div class="tabel-text-btn">
                                                <div class="d-flex">
                                                    <a href="javascript:;"
                                                        onclick="decrementQuantity(<?php echo e($productmodel->id); ?>)"
                                                        class="btn btn-minus-custom" style="line-height: 1.8;">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </a>
                                                    <input type="number" id="quantity-<?php echo e($productmodel->id); ?>"
                                                        style="height: 45px;" value="1" min="1"
                                                        class="form-control column product-qty quantity-input"
                                                        readonly>
                                                    <a href="javascript:;" style="line-height: 1.8;"
                                                        onclick="incrementQuantity(<?php echo e($productmodel->id); ?>)"
                                                        class="btn btn-plus-custom">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </a>

                                                </div>
                                            </div>
                                            <button type="submit"
                                                style="height: 45px; padding: 5px 10px; line-height: 1.8;"
                                                class="btn main-btn-six" tabindex="-1">
                                                <?php echo e(__('translate.Add to Cart')); ?>

                                                <?php $zero = 0.00; ?>
                                                <span id="priceCalulate<?php echo e($productmodel->id); ?>">
                                                    <?php echo e($setting->currency_icon); ?> <?php if($productmodel->size !== '{"":""}'): ?>
                                                        <?php echo e(number_format($zero, 1)); ?>

                                                    <?php else: ?>
                                                        <?php echo e(number_format($productmodel->price, 2)); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script>
        function incrementQuantity(id) {
            const quantityInput = document.getElementById(`quantity-${id}`);
            let currentValue = parseInt(quantityInput.value);
            let price_calculate = 0;
            quantityInput.value = currentValue + 1;
            let qty = currentValue + 1;
            const sizeInputs = document.querySelectorAll(`input[id^="size_"][data-id="${id}"]`);
            const size = Array.from(sizeInputs).find(input => input.checked);
            // const size = document.querySelector(`input[name="size"]:checked`);

            // const addons = Array.from(document.querySelectorAll(`input[name="addons[]"]:checked`));
            if (size) {
                const [sizeName, sizePrice] = size.value.split(',');
                price_calculate += parseFloat(sizePrice) * qty;
            } else {
                const element = document.getElementById(`priceSingle${id}`);

                // Remove non-numeric characters (e.g., currency symbols)
                price_calculate += parseFloat(element.value) * qty;

            }
            let sumByAddonsPrice = 0;
            const addonCheckboxes = document.querySelectorAll(
                `input[type="checkbox"][name="addons[]"][data-id="${id}"]`
            );

            const addons = Array.from(addonCheckboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => ({
                    addonId: checkbox.value,
                    addonPrice: parseFloat(checkbox.getAttribute('data-addonsprice')) || 0
                }));


            if (addons.length > 0) {
                addons.forEach((addon) => {
                    sumByAddonsPrice += addon.addonPrice;
                });
                price_calculate += sumByAddonsPrice;
            }
            const priceCalulate = document.getElementById(`priceCalulate${id}`);
            if (priceCalulate) {
                priceCalulate.textContent = '<?php echo e($setting->currency_icon); ?>' + parseFloat(price_calculate).toFixed(2);
            } else {
                console.error(`Element with ID priceCalulate${id} not found.`);
            }


        }

        function decrementQuantity(id) {
            const quantityInput = document.getElementById(`quantity-${id}`);
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                let price_calculate = 0;
                let qty = currentValue - 1;
                const sizeInputs = document.querySelectorAll(`input[id^="size_"][data-id="${id}"]`);
                const size = Array.from(sizeInputs).find(input => input.checked);
                // const addons = Array.from(document.querySelectorAll(`input[name="addons[]"]:checked`));

                if (size) {
                    const [sizeName, sizePrice] = size.value.split(',');
                    price_calculate += parseFloat(sizePrice) * qty;
                } else {
                    const element = document.getElementById(`priceSingle${id}`);

                    // Remove non-numeric characters (e.g., currency symbols)
                    price_calculate += parseFloat(element.value) * qty;

                }
                let sumByAddonsPrice = 0;
                const addonCheckboxes = document.querySelectorAll(
                    `input[type="checkbox"][name="addons[]"][data-id="${id}"]`
                );

                const addons = Array.from(addonCheckboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => ({
                        addonId: checkbox.value,
                        addonPrice: parseFloat(checkbox.getAttribute('data-addonsprice')) || 0
                    }));


                if (addons.length > 0) {
                    addons.forEach((addon) => {
                        sumByAddonsPrice += addon.addonPrice;
                    });
                    price_calculate += sumByAddonsPrice;
                }
                const priceCalulate = document.getElementById(`priceCalulate${id}`);
                if (priceCalulate) {
                    priceCalulate.textContent = '<?php echo e($setting->currency_icon); ?>' + parseFloat(price_calculate).toFixed(2);
                } else {
                    console.error(`Element with ID priceCalulate${id} not found.`);
                }
            }
        }
        // click on current radio size calculate price and update button calculatepricer
        $(document).on('change', 'input[name="size"]', function() {
            let size = $(this).val();
            let dataInfo = $(this).data('info');
            let price = dataInfo.split(',')[1];
            let id = $(this).data('id');
            let qty = parseInt(document.getElementById(`quantity-${id}`).value);
            let price_calculate = 0;
            price_calculate += parseFloat(price);
            const priceCalulate = document.getElementById(`priceCalulate${id}`);
            const addons = Array.from(document.querySelectorAll(`input[name="addons[]"]:checked`));
            let sumByAddonsPrice = 0;

            // Iterate over the addons array to calculate the sum of data-addonsprice
            addons.forEach((addon) => {
                const addonPrice = parseFloat(addon.getAttribute('data-addonsprice')) || 0;
                sumByAddonsPrice += addonPrice;
            });
            price_calculate += sumByAddonsPrice;
            if (priceCalulate) {
                priceCalulate.textContent = '<?php echo e($setting->currency_icon); ?>' + parseFloat(price_calculate * qty)
                    .toFixed(2);
            } else {
                console.error(`Element with ID priceCalulate${id} not found.`);
            }
        });
        $(document).on('change', 'input[name="addons[]"]', function() {
            let id = $(this).data('id');
            let qty = parseInt(document.getElementById(`quantity-${id}`).value);
            let price_calculate = 0;
            const size = document.querySelector(`input[name="size"]:checked`);
            if (size) {
                const [sizeName, sizePrice] = size.value.split(',');
                price_calculate += parseFloat(sizePrice) * qty;
            } else {
                const element = document.getElementById(`priceSingle${id}`);

                // Remove non-numeric characters (e.g., currency symbols)
                price_calculate += parseFloat(element.value) * qty;
            }
            const addons = Array.from(document.querySelectorAll(`input[name="addons[]"]:checked`));
            let sumByAddonsPrice = 0;

            // Iterate over the addons array to calculate the sum of data-addonsprice
            addons.forEach((addon) => {
                const addonPrice = parseFloat(addon.getAttribute('data-addonsprice')) || 0;
                sumByAddonsPrice += addonPrice;
            });
            price_calculate += sumByAddonsPrice;
            const priceCalulate = document.getElementById(`priceCalulate${id}`);
            if (priceCalulate) {
                priceCalulate.textContent = '<?php echo e($setting->currency_icon); ?>' + parseFloat(price_calculate).toFixed(
                    2);
            } else {
                console.error(`Element with ID priceCalulate${id} not found.`);
            }
        });

        function incrementQuantity1(id) {
            const quantityInput1 = document.getElementById(`quantity1-${id}`);
            let currentValue1 = parseInt(quantityInput1.value);
            quantityInput1.value = currentValue1 + 1;
            addToCart(id, currentValue1 + 1);
        }

        function closeCart() {
            $('#cart-dropdown').hide();
            $('#cart-dropdown').removeClass('active-dropdown');

        }

        function decrementQuantity1(id) {
            const quantityInput1 = document.getElementById(`quantity1-${id}`);
            let currentValue1 = parseInt(quantityInput1.value);
            if (currentValue1 > 0) {
                quantityInput1.value = currentValue1 - 1;
                addToCartDec(id, currentValue1 - 1);
            }
        }
        $(".wishlist-btn").click(function(e) {
            $('#loaderofForm1').show();
            e.preventDefault();
            let btn = $(this);
            let productId = btn.data("product-id");
            let action = btn.data("action");
            let url = action === "add" ? "<?php echo e(route('wishlist.add', '')); ?>/" + productId :
                "<?php echo e(route('wishlist.remove', '')); ?>/" + productId;

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    product_id: productId
                },
                success: function(response) {
                    $('#loaderofForm1').hide();
                    if (response.status === "success") {
                        // Toggle icon and action

                        if (action === "add") {
                            $('#btn-display' + productId).hide();
                            $('#btn-remove' + productId).show();
                            toastr.success(response.message);
                        } else {
                            $('#btn-display' + productId).show();
                            $('#btn-remove' + productId).hide();
                            toastr.success(response.message);
                        }
                    }
                },
                error: function(xhr) {
                    $('#loaderofForm1').hide();
                    toastr.options = {
                        "timeOut": "2000",
                    };
                    if (xhr.status === 401) {
                        toastr.error(xhr.responseJSON.message || "Unauthorized access. Please log in.");
                    } else {
                        toastr.error("An error occurred. Please try again.");
                    }
                }
            });
        });

        const cartDropdownItemBox = document.getElementById("cartBox");
        const cartCountElement = document.getElementById("carCount");
        const cartCountElementM = document.getElementById("carCountM");

        const updateSubTotalElement = document.getElementById('updateSubTotal');
        // Select all forms within modals
        const addToCartForms = document.querySelectorAll('.modal form');

        // Attach event listeners to each form
        addToCartForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Collect data from the form
                const formData = new FormData(form);
                const size = formData.get('size'); // Get selected size
                const addons = formData.getAll('addons[]'); // Get selected addons
                const p_id = formData.get('product_id');
                const note = formData.get('note');
                const quantityInput = document.getElementById(`quantity-${p_id}`).value;

                // // Validate required inputs
                // if (!size) {
                //     alert('Please select a size.');
                //     return;
                // }

                // Prepare data for the AJAX request
                const data = {
                    product_id: formData.get('product_id'),
                    size: size,
                    note: note,
                    qty: parseInt(quantityInput),
                    addons: addons,
                    _token: formData.get('_token') // Include CSRF token
                };

                // Perform AJAX request
                $.ajax({
                    url: '<?php echo e(route('cart.add.detils')); ?>',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(data), // Send data as JSON
                    success: function(response) {
                        // Handle successful response
                        if (response.success) {
                            // updateCartCount(5); // Example cart count

                            const cartCountElement = document.getElementById("carCount");
                            const cartCountElementM = document.getElementById("carCountM");
                            if (cartCountElement) {
                                // Update the text content with the new cart count
                                cartCountElement.textContent = response.cart_count;
                                cartCountElementM.textContent = response.cart_count;
                                var item = response.newProduct;
                                const cartItemHTML = `
                                <div class="cart-dropdown-item-box" data-product-id="${item.id}">
                                    <div class="cart-dropdown-item">
                                        <div class="cart-dropdown-item-img">
                                            <img src="${item.tumb_image}" alt="img">
                                        </div>
                                        <div class="cart-dropdown-item-text">
                                            <a href="javascript:;">
                                                <h3>${item.name}</h3>
                                            </a>
                                            <div class="d-flex">
                                                <p id="price1-${item.id}"><?php echo e($setting->currency_icon); ?>${ parseFloat(item.price).toFixed(2)}</p>
                                                <div class="d-flex w-75">
                                                    <button type="button" class="btn btn-minus-custom"
                                                        onclick="decrementQuantity1(${item.id})" style="width: 40px; line-height: 10px; height: 30px;">-</button>
                                                    <input type="number" style="height: 30px; text-align: center;" id="quantity1-${item.id}" value="${item.qty}"
                                                        min="1" class="form-control product-qty quantity-input" readonly>
                                                    <button type="button" class="btn btn-plus-custom"
                                                        onclick="incrementQuantity1(${item.id})" style="width: 40px; line-height: 10px; height: 30px;">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-dropdown-inner">
                                        <div class="cart-dropdown-inner-btn mt-4">
                                            <a class="remove-cart-item" href="javascript:;" onclick="removeCartItem(${item.id})" data-product-id="${item.id}">
                                                <span>
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M3.75 6V13.5C3.75 15.1569 5.09315 16.5 6.75 16.5H11.25C12.9069 16.5 14.25 15.1569 14.25 13.5V6M10.5 8.25V12.75M7.5 8.25L7.5 12.75M12 3.75L10.9453 2.16795C10.6671 1.75065 10.1988 1.5 9.69722 1.5H8.30278C7.80125 1.5 7.3329 1.75065 7.0547 2.16795L6 3.75M12 3.75H6M12 3.75H15.75M6 3.75H2.25"
                                                            stroke="#F01543" stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                `;
                                if (response.updatedTotalPrice !== undefined) {
                                    $('#updateSubTotal').text('<?php echo e($setting->currency_icon); ?>' +
                                        parseFloat(response.updatedTotalPrice).toFixed(2));
                                }

                                console.log('Elements exist:', document.getElementById(
                                    'cartBody'), document.getElementById('hasCart'));

                                try {
                                    document.getElementById('hasCart').style.display = "block";
                                    document.getElementById('cartBody').style.display = "none";
                                } catch (e) {
                                    console.error("Error with DOM manipulation:", e);
                                }
                                const cartDropdownItemBox = document.getElementById("cartBox");
                                cartDropdownItemBox.insertAdjacentHTML("afterbegin",
                                    cartItemHTML);
                            } else {
                                console.log("Cart count element not found.");
                            }
                            toastr.options = {
                                "timeOut": "2000",
                            };
                            toastr.success(response.message); // Notify user
                            $('.modal').modal('hide'); // Close modal
                        } else {
                            toastr.error('Item already added.'); // Show error message
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log any errors
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const cartDropdown = document.getElementById('cart-dropdown');

            // Function to show the dropdown
            function showDropdown() {
                cartDropdown.style.display = 'block';
            }

            // Function to hide the dropdown
            function hideDropdown() {
                cartDropdown.style.display = 'none';
            }

            // Click event inside the dropdown
            cartDropdown.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevent the event from bubbling to the document
            });

            // Click event outside the dropdown
            document.addEventListener('click', function() {
                hideDropdown();
            });

            // Example of a trigger to show the dropdown (add your actual trigger logic here)
            const trigger = document.querySelector('.cart-icon'); // Replace with your actual trigger
            if (trigger) {
                trigger.addEventListener('click', function(event) {
                    event.stopPropagation(); // Prevent closing the dropdown immediately
                    showDropdown();
                });
            }
        });
        // Function to update cart count UI
        function addToCart(id, qty) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const data = {
                product_id: id,
                qty: qty,
                _token: csrfToken // Include CSRF token
            };
            $.ajax({
                url: '<?php echo e(route('cart.increment', ':id')); ?>'.replace(':id', id),
                method: 'get',
                contentType: 'application/json',
                data: JSON.stringify(data), // Send data as JSON
                success: function(response) {
                    // Handle successful response
                    if (response.success) {
                        const price1 = document.getElementById('price1-' + id);
                        price1.textContent = '<?php echo e($setting->currency_icon); ?>' + parseFloat(response.price)
                            .toFixed(2);

                        toastr.success(response.message); // Notify user
                        $('.modal').modal('hide'); // Close modal
                    } else {
                        toastr.options = {
                            "timeOut": "2000",
                        };
                        toastr.error('Something went wrong.'); // Show error message
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); // Log any errors
                }
            });
        }

        function addToCartDec(id, qty) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const data = {
                product_id: id,
                qty: qty,
                _token: csrfToken // Include CSRF token
            };
            $.ajax({
                url: '<?php echo e(route('cart.decrement', ':id')); ?>'.replace(':id', id),
                method: 'get',
                contentType: 'application/json',
                data: JSON.stringify(data), // Send data as JSON
                success: function(response) {
                    // Handle successful response
                    if (response.success) {
                        const price1 = document.getElementById('price1-' + id);
                        price1.textContent = '<?php echo e($setting->currency_icon); ?>' + parseFloat(response.price)
                            .toFixed(2);
                        if (response.qty == 0) {
                            $(`.cart-dropdown-item-box[data-product-id="${id}"]`).remove();
                            try {
                                if (response.cart_count == 0) {
                                    document.getElementById('hasCart').style.display = "none";
                                    document.getElementById('cartBody').style.display = "block";
                                    $('#cart-dropdown').hide();
                                    $('#cart-dropdown').removeClass('active-dropdown');

                                }
                            } catch (e) {
                                console.error("Error with DOM manipulation:", e);
                            }
                        }
                        toastr.success(response.message); // Notify user
                        $('.modal').modal('hide'); // Close modal
                    } else {
                        toastr.options = {
                            "timeOut": "2000",
                        };
                        toastr.error('Something went wrong.'); // Show error message
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); // Log any errors
                }
            });
        }

        function removeCartItem(id) {

            const productId = id; // Get the product ID

            $.ajax({
                url: '/cart/remove/' + productId,
                method: 'Get', // Assuming the route uses DELETE
                data: {
                    _token: "<?php echo e(csrf_token()); ?>" // Add CSRF token for security
                },
                success: function(response) {
                    if (response.success) {
                        // Remove the item box from the DOM
                        $(`.cart-dropdown-item-box[data-product-id="${productId}"]`).remove();
                        if (response.updatedTotalPrice !== undefined) {
                            $('#updateSubTotal').text('<?php echo e($setting->currency_icon); ?>' + parseFloat(response
                                .updatedTotalPrice).toFixed(2));
                        }
                        cartCountElement.textContent = response.cart_count;
                        const cartCountElementM = document.getElementById("carCountM");
                        cartCountElementM.textContent = response.cart_count;
                        if (response.cart_count == 0) {
                            try {
                                document.getElementById('hasCart').style.display = "none";
                                document.getElementById('cartBody').style.display = "block";
                                $('#cart-dropdown').hide();
                                $('#cart-dropdown').removeClass('active-dropdown');
                            } catch (e) {
                                console.error("Error with DOM manipulation:", e);
                            }
                        }
                        toastr.options = {
                            "timeOut": "2000",
                        };
                        toastr.success(response.message); // Notify user

                    } else {

                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });

        }
    </script>


</section>
<!-- Modal -->
<div class="modal modal-seven fade" id="exampleModalLogin" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('translate.Login')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body popform">
                <div id="loaderofForm"
                    style="display: none;     position: absolute;
                z-index: 9999;
                height: 100%;
                width: 100%;
                top: 40%;
                text-align: center;">
                    <div class="spinner-border text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="sign-up-main">
                    <div class="sign-up-from">
                        <div class="alert alert-success alert-success1" style="display: none;">
                            <?php echo e(Session::get('success')); ?>

                        </div>
                        <div class="alert alert-danger alert-danger1" style="display: none;">
                        </div>
                        <div class="sign-up-from-item" id="lignForm">
                            <form id="loginForm">
                                <?php echo csrf_field(); ?>
                                <div class="sign-up-from-inner">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo e(__('translate.Email')); ?></label>
                                    <input type="email" class="form-control" name="email" id="loginEmail">
                                    <p id="loginEmailError" class="text-danger"></p>
                                </div>
                                <div class="sign-up-from-inner">
                                    <label for="passwordField1"
                                        class="form-label"><?php echo e(__('translate.Password')); ?></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control toggle-password" name="password"
                                            id="loginPassword">
                                        <p id="loginPasswordError" style="    display: block;width: 100%;"
                                            class="text-danger"></p>
                                        <div class="icon" data-toggle="password1" data-target="passwordField1">
                                            <span class="toggle-password-icon login-ic">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sign-up-from-inner">
                                    <div class="sign-up-from-df">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                <?php echo e(__('translate.Remember Me')); ?>

                                            </label>
                                        </div>

                                        <div class="sign-up-main-btn">
                                            <a href="javascript:;" onclick="showForgetPassword()"
                                                class="modal-sign-up-from-btn"><?php echo e(__('Reset Password')); ?>?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sign-up-btn">
                                    <button type="submit"
                                        class="main-btn-four"><?php echo e(__('translate.Sign In')); ?></button>
                                    <p>
                                        <a href="javascript:;" onclick="showSingUp()" class="sign-up-modal">
                                            <?php echo e(__('translate.Sign Up')); ?>

                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                        <div class="sign-up-from-item" id="registrationFrom" style="display: none;">
                            <form action="<?php echo e(route('register')); ?>" id="registerForm" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="sign-up-from-inner">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo e(__('translate.Name')); ?></label>
                                    <input type="text" class="form-control" name="name"
                                        value="<?php echo e(old('name')); ?>" id="exampleFormControlInput1">
                                    <p id="nameRegister" class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                </div>
                                <div class="sign-up-from-inner">
                                    <label for="phone" class="form-label"><?php echo e(__('Phone')); ?></label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" name="phone" id="phone">
                                    </div>
                                    <p id="phoneRegister" class="text-danger"><?php echo e($errors->first('name')); ?></p>
                                </div>
                                <div class="sign-up-from-inner">
                                    <label for="exampleFormControlInput2"
                                        class="form-label"><?php echo e(__('translate.Email')); ?></label>
                                    <input type="email" class="form-control" value="<?php echo e(old('email')); ?>"
                                        name="email" id="exampleFormControlInput2">
                                    <p id="emailRegister" class="text-danger"><?php echo e($errors->first('email')); ?></p>

                                </div>
                                <div class="sign-up-from-inner">
                                    <label for="passwordField1"
                                        class="form-label"><?php echo e(__('translate.Password')); ?></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control toggle-password" name="password"
                                            id="passwordField1">
                                        <p id="passwordRegister" class="text-danger"
                                            style="    display: block;width: 100%;"><?php echo e($errors->first('password')); ?>

                                        </p>
                                        <div class="icon" data-toggle="password" data-target="passwordField1">
                                            <span class="toggle-password-icon">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="sign-up-btn">
                                    <button class="main-btn-four"
                                        type="submit"><?php echo e(__('translate.Sign Up')); ?></button>
                                    <p>
                                        <a href="javascript:;" onclick="showSingIn()" class="sign-up-modal">
                                            <?php echo e(__('translate.Sign In')); ?>

                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                        <div class="sign-up-from-item" id="ForgetForm" style="display: none;">
                            <form id="forgot-password-form" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="sign-up-from-inner">
                                    <label for="exampleFormControlInput155"
                                        class="form-label"><?php echo e(__('translate.Email')); ?></label>
                                    <input type="email" class="form-control" name="email"
                                        id="exampleFormControlInput155">
                                    <?php if($errors->has('email')): ?>
                                        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                                    <?php endif; ?>
                                </div>



                                <div class="sign-up-btn">
                                    <button class="main-btn-four" type="submit">
                                        <?php echo e(__('translate.Send Mail')); ?>

                                        <span>
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_317_13742)">
                                                    <path
                                                        d="M1.41972 8.63898L11.0737 8.63898L7.30373 12.379C7.09177 12.5965 6.97314 12.8882 6.97314 13.192C6.97314 13.4957 7.09177 13.7875 7.30373 14.005C7.51841 14.217 7.80799 14.3359 8.10973 14.3359C8.41146 14.3359 8.70105 14.217 8.91573 14.005L14.6477 8.305C14.8528 8.0869 14.9669 7.79885 14.9669 7.49951C14.9669 7.20018 14.8528 6.91207 14.6477 6.69397L8.91573 0.993959C8.70105 0.781929 8.41146 0.663087 8.10973 0.663087C7.80799 0.663087 7.51841 0.781928 7.30373 0.993959C7.09659 1.20969 6.97748 1.49504 6.96973 1.79401C6.97267 2.09575 7.09238 2.3846 7.30373 2.59998L11.0737 6.35498L1.41972 6.35498C1.12309 6.36377 0.84155 6.48776 0.634836 6.70068C0.428121 6.91361 0.312501 7.19872 0.312501 7.49548C0.312501 7.79225 0.428121 8.07736 0.634835 8.29028C0.84155 8.50321 1.12309 8.6272 1.41972 8.63599L1.41972 8.63898Z"
                                                        fill="white" />
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </form>
                            <p><?php echo e(__('translate.Back to login page')); ?> <a href="javascript:;" onclick="showSingIn()"
                                    class="sign-up-modal"><?php echo e(__('translate.Sign in here')); ?></a></p>
                        </div>
                        <div class="sign-up-from-item" id="modifyEmail" style="display: none;">
                            <form>
                                <?php echo csrf_field(); ?>
                                <div class="sign-up-from-inner">
                                    <label for="exampleFormControlInput156"
                                        class="form-label"><?php echo e(__('translate.Email')); ?></label>
                                    <input type="email" class="form-control" name="email"
                                        id="exampleFormControlInput156">
                                    <?php if($errors->has('email')): ?>
                                        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                                    <?php endif; ?>
                                </div>



                                <div class="sign-up-btn">
                                    <button class="main-btn-four" id="modify-email-form" type="button">
                                        <?php echo e(__('translate.Send Mail')); ?>

                                        <span>
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_317_13742)">
                                                    <path
                                                        d="M1.41972 8.63898L11.0737 8.63898L7.30373 12.379C7.09177 12.5965 6.97314 12.8882 6.97314 13.192C6.97314 13.4957 7.09177 13.7875 7.30373 14.005C7.51841 14.217 7.80799 14.3359 8.10973 14.3359C8.41146 14.3359 8.70105 14.217 8.91573 14.005L14.6477 8.305C14.8528 8.0869 14.9669 7.79885 14.9669 7.49951C14.9669 7.20018 14.8528 6.91207 14.6477 6.69397L8.91573 0.993959C8.70105 0.781929 8.41146 0.663087 8.10973 0.663087C7.80799 0.663087 7.51841 0.781928 7.30373 0.993959C7.09659 1.20969 6.97748 1.49504 6.96973 1.79401C6.97267 2.09575 7.09238 2.3846 7.30373 2.59998L11.0737 6.35498L1.41972 6.35498C1.12309 6.36377 0.84155 6.48776 0.634836 6.70068C0.428121 6.91361 0.312501 7.19872 0.312501 7.49548C0.312501 7.79225 0.428121 8.07736 0.634835 8.29028C0.84155 8.50321 1.12309 8.6272 1.41972 8.63599L1.41972 8.63898Z"
                                                        fill="white" />
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </form>
                            <p><?php echo e(__('translate.Back to login page')); ?> <a href="javascript:;" onclick="showSingIn()"
                                    class="sign-up-modal"><?php echo e(__('translate.Sign in here')); ?></a></p>
                        </div>
                        <div class="sign-up-from-item" id="otpForm" style="display: none;">
                            <form id="opt-password-form" action="<?php echo e(route('otp.check')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="sign-up-from-inner">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo e(__('Enter OTP')); ?></label>
                                    <input type="hidden" name="type" value="password" id="type">
                                    <input type="number" class="form-control" name="token" id="token"
                                        placeholder="000000" required>
                                    <p class="text-danger" id="tokenError"><?php echo e($errors->first('token')); ?></p>
                                </div>
                                
                                <div class="sign-up-btn">
                                    <button class="main-btn-four" type="submit">
                                        <?php echo e(__('Validate Code')); ?>

                                        <span>
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_317_13742)">
                                                    <path
                                                        d="M1.41972 8.63898L11.0737 8.63898L7.30373 12.379C7.09177 12.5965 6.97314 12.8882 6.97314 13.192C6.97314 13.4957 7.09177 13.7875 7.30373 14.005C7.51841 14.217 7.80799 14.3359 8.10973 14.3359C8.41146 14.3359 8.70105 14.217 8.91573 14.005L14.6477 8.305C14.8528 8.0869 14.9669 7.79885 14.9669 7.49951C14.9669 7.20018 14.8528 6.91207 14.6477 6.69397L8.91573 0.993959C8.70105 0.781929 8.41146 0.663087 8.10973 0.663087C7.80799 0.663087 7.51841 0.781928 7.30373 0.993959C7.09659 1.20969 6.97748 1.49504 6.96973 1.79401C6.97267 2.09575 7.09238 2.3846 7.30373 2.59998L11.0737 6.35498L1.41972 6.35498C1.12309 6.36377 0.84155 6.48776 0.634836 6.70068C0.428121 6.91361 0.312501 7.19872 0.312501 7.49548C0.312501 7.79225 0.428121 8.07736 0.634835 8.29028C0.84155 8.50321 1.12309 8.6272 1.41972 8.63599L1.41972 8.63898Z"
                                                        fill="white" />
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </form>

                            <p><?php echo e(__('translate.Back to login page')); ?> <a href="javascript:;"
                                    onclick="showSingIn()"
                                    class="sign-up-modal"><?php echo e(__('translate.Sign in here')); ?></a></p>

                        </div>
                        <div class="sign-up-from-item" id="ResetForm" style="display: none;">
                            <?php if(Session::has('error')): ?>
                                <p class="text-danger"><?php echo e(Session::get('error')); ?></p>
                            <?php endif; ?>
                            <form id="reset-password-form" action="<?php echo e(route('reset.password.user')); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>
                                <div class="sign-up-from-inner">
                                    <label for="passwordField15"
                                        class="form-label"><?php echo e(__('Create New Password')); ?></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control toggle-password" name="password"
                                            id="passwordField15">
                                        <p id="newPasswordError" class="text-danger"
                                            style="    display: block;width: 100%;"></p>
                                        <div class="icon" data-toggle="password" data-target="passwordField15">
                                            <span class="toggle-password-icon">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </span>
                                        </div>
                                        <input type="hidden" name="passordUser" id="userId" value="">
                                    </div>
                                    <?php if($errors->has('password')): ?>
                                        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="sign-up-btn">
                                    <button class="main-btn-four"
                                        type="submit"><?php echo e(__('translate.Reset Password')); ?></button>
                                </div>
                            </form>

                            <p><?php echo e(__('translate.Back to login page')); ?> <a href="javascript:;"
                                    onclick="showSingIn()"
                                    class="sign-up-modal"><?php echo e(__('translate.Sign in here')); ?></a></p>

                        </div>
                        <div class="sign-up-from-item" id="ResetEmail" style="display: none;">
                            <?php if(Session::has('error')): ?>
                                <p class="text-danger"><?php echo e(Session::get('error')); ?></p>
                            <?php endif; ?>
                            <form id="reset-email-form" action="<?php echo e(route('reset.email.user')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="sign-up-from-inner">
                                    <label for="email16" class="form-label"><?php echo e(__('Enter New Email')); ?></label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" id="email16">
                                        <input type="hidden" name="emailUser" id="userId1" value="">
                                    </div>
                                    <p class="text-danger"></p>
                                </div>
                                <div class="sign-up-btn">
                                    <button class="main-btn-four" type="submit">Reset Email</button>
                                </div>
                            </form>

                            <p><?php echo e(__('translate.Back to login page')); ?> <a href="javascript:;"
                                    onclick="showSingIn()"
                                    class="sign-up-modal"><?php echo e(__('translate.Sign in here')); ?></a></p>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script>
    document.querySelectorAll('input[type="password"]').forEach(function(passwordField) {
        passwordField.addEventListener("input", function() {
            let password = this.value;
            let errorElement = this
                .nextElementSibling; // Get the next sibling element for error message

            if (password.length > 0 && password.length < 8) {
                errorElement.textContent = "Password must be at least 8 characters long.";
            } else {
                errorElement.textContent = "";
            }
        });
    });


    function showSingUp() {
        document.getElementById('registrationFrom').style.display = "block";
        document.getElementById('lignForm').style.display = "none";
        document.getElementById('lignForm').style.display = "none";
        document.getElementById('otpForm').style.display = "none";
        document.getElementById('ResetForm').style.display = "none";
        document.getElementById('ResetEmail').style.display = "none";
        $('#exampleModalLabel').text('Registration');
    }

    function showForgetPassword() {
        document.getElementById('registrationFrom').style.display = "none";
        document.getElementById('lignForm').style.display = "none";
        document.getElementById('ForgetForm').style.display = "block";
        document.getElementById('otpForm').style.display = "none";
        document.getElementById('ResetForm').style.display = "none";
        document.getElementById('ResetEmail').style.display = "none";
        $('#exampleModalLabel').text('Forget Password');
        $('#passwordField15').val('');
        $('#loginPassword').val('');
        $('#passwordField1').val('');
        hideError();
    }

    function showForgetEmail() {
        document.getElementById('registrationFrom').style.display = "none";
        document.getElementById('lignForm').style.display = "none";
        document.getElementById('ForgetForm').style.display = "none";
        document.getElementById('modifyEmail').style.display = "block";
        document.getElementById('otpForm').style.display = "none";
        document.getElementById('ResetEmail').style.display = "none";
        document.getElementById('ResetForm').style.display = "none";
        $('#exampleModalLabel').text('Modify Email');
        hideError();
    }
    $('.custom-btn').on('click', function() {
        showSingIn();
    })

    function showSingIn() {
        $('#exampleModalLabel').text('Login');
        document.getElementById('lignForm').style.display = "block";
        document.getElementById('ForgetForm').style.display = "none";
        document.getElementById('registrationFrom').style.display = "none";
        document.getElementById('otpForm').style.display = "none";
        document.getElementById('ResetEmail').style.display = "none";
        document.getElementById('ResetForm').style.display = "none";
        $('#exampleModalLabel').text('Login');
        hideError();
    }
</script>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="footer-logo">
                    <div class="logo">
                        <img src="<?php echo e(asset('frontend/assets/images/logo/logo-header.png')); ?>" alt="logo">
                    </div>
                </div>

                <div class="footer-text">
                    <h4><?php echo clean($footer->about_us); ?></h4>
                </div>
            </div>


            <div class="col-lg-9 mol-md-12 ">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="quick-line-item">
                            <div class="quick-line-item-head">
                                <h3>Get Started</h3>
                            </div>


                            
                            <p class="text-white" style="font-size: 14px;">Barrack St, Bansha West, Bansha, Co.
                                Tipperary, E34 X402, Ireland</p>
                            <p></p>
                            <p class="text-white" style="font-size: 14px;">Email: <a class="text-white"
                                    href="mailto:midwaykebabish@gmail.com">midwaykebabish@gmail.com</a></p>
                            <p class="text-white" style="font-size: 14px;">Phone: <a class="text-white"
                                    href="tel:+3536254448"> +353 62 54448 </a></p>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="quick-line-item">
                            <div class="quick-line-item-head">
                            </div>
                            <p class="text-white" style="font-size: 14px;">Mon To Sun: 4:00 PM -11:00 PM</p>
                            <div class="footer-icon">
                                <div class="icon">
                                    <?php $__currentLoopData = $social_link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($social_link->link); ?>" target="_blank"><i
                                                class="fa-brands <?php echo e($social_link->icon); ?>"></i></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <a href="mailto:midwaykebabish@gmail.com" target="_blank"><i
                                            class="fa fa-inbox"></i></a>
                                    <a href="tel:+3536254448" target="_blank"><i class="fa fa-phone"></i></a>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="quick-line-item">
                            <div class="quick-line-item-head">
                                <h3>Visit us</h3>
                            </div>
                            <div>
                                <iframe class="col-lg-12" src="<?php echo e($contactus->google_map); ?>"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            

                            

                            
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</footer>
<!-- Footer part End  -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-text">
                    <h4><?php echo e($footer->copyright); ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    "use strict"
    const togglePasswordElements = document.querySelectorAll('[data-toggle="password"]');

    togglePasswordElements.forEach(function(element) {
        const passwordInput = document.getElementById('passwordField1');
        const passwordField15 = document.getElementById('passwordField15');
        const passwordIcon = element.querySelector('.toggle-password-icon i');

        element.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            }
            if (passwordField15.type === 'password') {
                passwordField15.type = 'text';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            } else {
                passwordField15.type = 'password';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            }
        });
    });
    const togglePasswordElements1 = document.querySelectorAll('[data-toggle="password1"]');

    togglePasswordElements1.forEach(function(element) {
        const loginPassword = document.getElementById('loginPassword');
        const passwordIcon = element.querySelector('.toggle-password-icon i');

        element.addEventListener('click', function() {
            if (loginPassword.type === 'password') {
                loginPassword.type = 'text';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            } else {
                loginPassword.type = 'password';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            }
        });
    });
</script>
<?php if($TawkChat->status == 1): ?>
    <script type="text/javascript">
        var checkDevice = window.matchMedia("(max-width: 575px)");
        if (checkDevice && !checkDevice.matches) {
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = '<?php echo e($TawkChat->chat_link); ?>';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        }
    </script>
    <!--End of Tawk.to Script-->
<?php endif; ?>
<script>
    function hideError() {
        $('#passwordError').text('');
        $('#tokenError').text('');
        $('#nameRegister').text('');
        $('.alert-success1').text('');
        $('.alert-danger1').text('');
        $('.alert-danger1').hide();
        $('#phoneRegister').text('');
        $('#emailRegister').text('');
        $('#passwordRegister').text('');
        $('#loginPasswordError').text('');
        $('#newPasswordError').text('');
        $('#loginEmail').val('');
        $('#loginPassword').val('');
        $('#exampleFormControlInput1').val('');
        $('#phone').val('');
        $('#exampleFormControlInput2').val('');
        $('#passwordField1').val('');
        // $('#exampleFormControlInput155').val('');
        $('#exampleFormControlInput156').val('');
        $('#token').val('');
        $('#passwordField15').val('');
        $('#email16').val('');
    }
    $('.btn-close').on('click', function() {
        hideError();
    });
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let email = document.getElementById('loginEmail').value;
        let password = document.getElementById('loginPassword').value;
        let csrfToken = document.querySelector('input[name="_token"]').value;

        // Clear previous errors
        document.getElementById('loginEmailError').textContent = '';
        document.getElementById('loginPasswordError').textContent = '';
        const commonMistakes = ['@gmai.com', '@gma.com', '@gmil.com', '@gamil.com'];

        if (email === '') {
            document.getElementById('loginEmailError').textContent = 'Please Enter Email';
        } else if (!validateEmail(email)) {
            document.getElementById('loginEmailError').textContent = 'Invalid Email Format';
        } else if (commonMistakes.some(mistake => email.includes(mistake))) {
            document.getElementById('loginEmailError').textContent = 'Did you mean @gmail.com?';
        }
        if (password == '') {
            document.getElementById('loginPasswordError').textContent = 'Please Enter Password';
        }
        function validateEmail(email) {
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }
        $('#loaderofForm').show();
        setTimeout(() => {
            $('#loaderofForm').hide();
        }, 100);
        fetch("<?php echo e(route('login')); ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({
                    email,
                    password
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    $('#loaderofForm').hide();
                    $('.alert-success1').show();
                    $('.alert-success1').text(data.message);
                    setTimeout(() => {
                        $('.alert-success1').hide();
                        window.location.href = data.redirect_url; // Redirect if necessary
                    }, 1000);
                } else {
                    $('#loaderofForm').hide();
                    // Show errors
                    if (data.message == 'Invalid email') {
                        document.getElementById('loginEmailError').textContent = data.errors;
                    }
                    if (data.message == 'Wrong password') {
                        document.getElementById('loginPasswordError').textContent = data.errors;
                    }
                    if (data.errors == 'Wrong password') {
                        document.getElementById('loginPasswordError').textContent = data.message;
                    }
                }
            })
            .catch(error => console.error('Error:', error));
    });
    $('#registerForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        $('#loaderofForm').show();
        let formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: $(this).attr('action'), // Get the form action URL
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                $('#loaderofForm').hide();
                $('.alert-success1').show();
                $('.alert-success1').text(response.message);
                setTimeout(() => {
                    $('.alert-success1').hide();
                    window.location.href = response.redirect_url; // Example redirect
                    hideError();
                }, 1000);
            },
            error: function(xhr) {
                $('#loaderofForm').hide();
                // Handle error response
                if (xhr.status === 422) { // Validation error
                    let errors = xhr.responseJSON.errors;
                    if (errors.name) {
                        document.getElementById('nameRegister').textContent = errors.name[0];
                    }
                    if (errors.phone) {
                        document.getElementById('phoneRegister').textContent = errors.phone[0];
                    }
                    if (errors.email) {
                        document.getElementById('emailRegister').textContent = errors.email[0];
                    }
                    if (errors.password) {
                        document.getElementById('passwordRegister').textContent = errors.password[
                            0];
                    }
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });
    // document.addEventListener("click", function(event) {
    //     var dropdown = document.getElementById("profile-dropdown");

    //     // Check if the click is outside the dropdown
    //     if (dropdown && !dropdown.contains(event.target)) {
    //         dropdown.style.display = "none";
    //     }
    // });

    $('#modify-email-form').on('click', function(e) {
        e.preventDefault();

        // Reset error messages
        $('#email-error').hide().text('');
        let type1 = $('#type').val('email');

        // Get form data
        let formData = $('#exampleFormControlInput156').val();
        $('#loaderofForm').show();
        $('.alert-success1').hide();
        $('.alert-danger1').hide();
        hideError();
        // Perform AJAX request
        $.ajax({
            url: '<?php echo e(route('forgot.password.user')); ?>',
            method: 'POST',
            data: {
                email: formData,
                type: 'email'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#loaderofForm').hide();
                $('.alert-success1').show();
                $('.alert-success1').text(response.message);
                setTimeout(() => {
                    // $('.alert-success1').hide();
                    document.getElementById('lignForm').style.display = "none";
                    document.getElementById('ForgetForm').style.display = "none";
                    document.getElementById('modifyEmail').style.display = "none";
                    document.getElementById('registrationFrom').style.display = "none";
                    $('#exampleModalLabel').text('OTP');
                    document.getElementById('otpForm').style.display = "block";
                    document.getElementById('ResetForm').style.display = "none";
                }, 2000);
            },
            error: function(response) {
                $('#loaderofForm').hide();
                $('.alert-danger1').show();
                $('.alert-danger1').text(response.responseJSON.message);

            },
        });
    });
    $('#forgot-password-form').on('submit', function(e) {
        e.preventDefault();

        // Reset error messages
        $('#email-error').hide().text('');
        let type1 = $('#type').val('password');
        $('.alert-success1').hide();
        $('.alert-danger1').hide();
        // Get form data
        let formData = $(this).serialize();
        let email = $('#exampleFormControlInput155').val();
        formData += `&email=${encodeURIComponent(email)}`;
        formData += `&type=password`;
        $('#loaderofForm').show();
        hideError();
        // Perform AJAX request
        $.ajax({
            url: '<?php echo e(route('forgot.password.user')); ?>',
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#loaderofForm').hide();
                $('.alert-success1').show();
                $('.alert-success1').text(response.message);
                setTimeout(() => {
                    $('.alert-success1').hide();
                    document.getElementById('lignForm').style.display = "none";
                    document.getElementById('ForgetForm').style.display = "none";
                    document.getElementById('modifyEmail').style.display = "none";
                    document.getElementById('registrationFrom').style.display = "none";
                    $('#exampleModalLabel').text('OTP');
                    document.getElementById('otpForm').style.display = "block";
                    document.getElementById('ResetForm').style.display = "none";
                }, 2000);
            },
            error: function(response) {
                $('#loaderofForm').hide();
                $('.alert-danger1').show();
                $('.alert-danger1').text(response.responseJSON.message);

            },
        });
    });

    $('#opt-password-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        $('.alert-success1').hide();
        $('.alert-danger1').hide();
        let formData = $(this).serialize(); // Serialize the form data
        let email = $('#exampleFormControlInput155').val();
        console.log(email)
        if (email == '') {
            email = $('#exampleFormControlInput156').val();
        }
        formData += `&email=${encodeURIComponent(email)}`;
        let actionUrl = $(this).attr('action'); // Get the form action URL
        $('#loaderofForm').show();
        // Clear previous error messages
        hideError();

        $.ajax({
            url: actionUrl, // Submit the form to the specified action URL
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#loaderofForm').hide();
                $('.alert-success1').show();
                $('.alert-success1').text(response.message);
                setTimeout(() => {
                    document.getElementById('lignForm').style.display = "none";
                    document.getElementById('ForgetForm').style.display = "none";
                    document.getElementById('registrationFrom').style.display = "none";
                    document.getElementById('otpForm').style.display = "none";
                    let type = $('#type').val();
                    if (type == 'password') {
                        document.getElementById('ResetForm').style.display = "block";
                        $('#userId').val(response.user);
                    } else {
                        document.getElementById('ResetEmail').style.display = "block";
                        $('#userId1').val(response.user);
                    }
                    $('.alert-success1').hide();
                }, 2000);
            },
            error: function(response) {
                $('#loaderofForm').hide();
                $('.alert-danger1').show();
                $('.alert-danger1').text(response.responseJSON.message);
            }
        });
    });
    $('#reset-password-form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        let formData = $(this).serialize(); // Serialize form data
        let actionUrl = $(this).attr('action'); // Get the form action URL

        $('#loaderofForm').show();
        // Clear any previous error messages
        $('#passwordError').text('');
        hideError();
        $.ajax({
            url: actionUrl, // URL specified in the form's action
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#loaderofForm').hide();
                    $('#passwordError').text('');
                    $('.alert-danger1').hide();
                    $('.alert-success1').show();
                    $('.alert-success1').text(response.message);
                    $('#token').val('');
                    setTimeout(() => {
                        $('#exampleModalLabel').text('Login');
                        $('#exampleFormControlInput155').val('');
                        $('#passwordField15').val();
                        document.getElementById('lignForm').style.display = "block";
                        document.getElementById('ForgetForm').style.display = "none";
                        document.getElementById('registrationFrom').style.display = "none";
                        document.getElementById('otpForm').style.display = "none";
                        document.getElementById('ResetForm').style.display = "none";
                        $('.alert-success1').hide();
                    }, 2000);
                }
            },
            error: function(response) {
                $('#loaderofForm').hide();
                $('#token').val('');
                $('.alert-danger1').show();
                $('.alert-danger1').text(response.responseJSON.message);
            }
        });
    });
    $('#reset-email-form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        let formData = $(this).serialize(); // Serialize form data
        let actionUrl = $(this).attr('action'); // Get the form action URL

        $('#loaderofForm').show();
        // Clear any previous error messages
        $('#passwordError').text('');
        hideError();
        $.ajax({
            url: actionUrl, // URL specified in the form's action
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#loaderofForm').hide();
                    $('#passwordError').text('');
                    $('.alert-success1').show();
                    $('.alert-success1').text(response.message);
                    setTimeout(() => {
                        $('#exampleModalLabel').text('Login');
                        $('#exampleFormControlInput155').val('');
                        $('#passwordField15').val();
                        document.getElementById('lignForm').style.display = "block";
                        document.getElementById('ForgetForm').style.display = "none";
                        document.getElementById('registrationFrom').style.display = "none";
                        document.getElementById('otpForm').style.display = "none";
                        document.getElementById('ResetForm').style.display = "none";
                        $('.alert-danger1').hide();
                        $('.alert-success1').hide();
                    }, 2000);
                }
            },
            error: function(response) {
                $('#loaderofForm').hide();
                $('#token').val('');

                $('.alert-danger1').show();
                $('.alert-danger1').text(response.responseJSON.message);
            }
        });
    });
</script>
<?php /**PATH /Applications/XAMPP/htdocs/food/resources/views/Frontend/Layouts/Partials/footer.blade.php ENDPATH**/ ?>