<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Dashboard')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .card-expiry-month,
        .card-expiry-year {
            margin: 3px 0;
        }

        .sherah-color2__fill {
            fill: #ff6767 !important;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #ff6767;
            border-color: #ff6767;
        }

        .text-danger {
            font-size: 14px;
        }

        .form-group {
            text-align: left;

        }

        .btnRed {
            background: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
    </style>
    <main>

        <!-- banner  -->
        <div class="inner-banner">
            <div class="container">
                <div class="row  ">
                    <div class="col-lg-12">
                        <div class="inner-banner-head">
                            <h1><?php echo e(__('Payment Method')); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner  -->



        <!-- dashboard  start -->
        <section class="dashboard">
            <div class="container">
                <div class="row">
                    <?php echo $__env->make('Frontend.User.sideber', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="col-lg-9  col-md-8 text-end">
                        <a href="javascript:;" class="btn btn-primary btnRed" data-bs-toggle="modal"
                            data-bs-target="#exampleModalCard">Add Card</a>
                        <div class="row dashboard-item-mt30px  ">
                            <div class="order-reorderingmain-box-tabel">
                                <table class=" table w-100 text-left">
                                    <thead>
                                        <tr style="background: var(--primary-color);
    color: #fff;">
                                            
                                            <th><?php echo e(__('Card Number')); ?></th>
                                            <th><?php echo e(__('Expiry')); ?></th>
                                            <th><?php echo e(__('translate.Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td> <?php echo e(decrypt($card->card_number)); ?></td>
                                                <td><?php echo e($card->month); ?>/<?php echo e($card->year); ?></td>
                                                <td>
                                                    <div class="delete-action ">
                                                        <a href="javascript:;" class="edit-card-btn"
                                                            data-id="<?php echo e($card->id); ?>" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalCard">
                                                            <svg class="sherah-color3__fill"
                                                                xmlns="http://www.w3.org/2000/svg" width="18.29"
                                                                height="18.252" viewBox="0 0 18.29 18.252">
                                                                <g id="Group_132" data-name="Group 132"
                                                                    transform="translate(-234.958 -37.876)">
                                                                    <path id="Path_481" data-name="Path 481"
                                                                        d="M242.545,95.779h-5.319a2.219,2.219,0,0,1-2.262-2.252c-.009-1.809,0-3.617,0-5.426q0-2.552,0-5.1a2.3,2.3,0,0,1,2.419-2.419q2.909,0,5.818,0c.531,0,.87.274.9.715a.741.741,0,0,1-.693.8c-.3.026-.594.014-.892.014q-2.534,0-5.069,0c-.7,0-.964.266-.964.976q0,5.122,0,10.245c0,.687.266.955.946.955q5.158,0,10.316,0c.665,0,.926-.265.926-.934q0-2.909,0-5.818a.765.765,0,0,1,.791-.853.744.744,0,0,1,.724.808c.007,1.023,0,2.047,0,3.07s.012,2.023-.006,3.034A2.235,2.235,0,0,1,248.5,95.73a1.83,1.83,0,0,1-.458.048Q245.293,95.782,242.545,95.779Z"
                                                                        transform="translate(0 -39.652)" fill="#09ad95">
                                                                    </path>
                                                                    <path id="Path_482" data-name="Path 482"
                                                                        d="M332.715,72.644l2.678,2.677c-.05.054-.119.133-.194.207q-2.814,2.815-5.634,5.625a1.113,1.113,0,0,1-.512.284c-.788.177-1.582.331-2.376.48-.5.093-.664-.092-.564-.589.157-.781.306-1.563.473-2.341a.911.911,0,0,1,.209-.437q2.918-2.938,5.853-5.86A.334.334,0,0,1,332.715,72.644Z"
                                                                        transform="translate(-84.622 -32.286)"
                                                                        fill="#09ad95"></path>
                                                                    <path id="Path_483" data-name="Path 483"
                                                                        d="M433.709,42.165l-2.716-2.715a15.815,15.815,0,0,1,1.356-1.248,1.886,1.886,0,0,1,2.579,2.662A17.589,17.589,0,0,1,433.709,42.165Z"
                                                                        transform="translate(-182.038)" fill="#09ad95">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                        <a href="<?php echo e(route('user.card.delete', $card->id)); ?>"
                                                            onclick="confirmation(event)"
                                                            class="text-danger sherah-table__action sherah-color2 sherah-color2__bg--offset blog_comment_delete">
                                                            <svg class="sherah-color2__fill"
                                                                xmlns="http://www.w3.org/2000/svg" width="16.247"
                                                                height="18.252" viewBox="0 0 16.247 18.252">
                                                                <g id="Icon" transform="translate(-160.007 -18.718)">
                                                                    <path id="Path_484" data-name="Path 484"
                                                                        d="M185.344,88.136c0,1.393,0,2.786,0,4.179-.006,1.909-1.523,3.244-3.694,3.248q-3.623.007-7.246,0c-2.15,0-3.682-1.338-3.687-3.216q-.01-4.349,0-8.7a.828.828,0,0,1,.822-.926.871.871,0,0,1,1,.737c.016.162.006.326.006.489q0,4.161,0,8.321c0,1.061.711,1.689,1.912,1.69q3.58,0,7.161,0c1.2,0,1.906-.631,1.906-1.695q0-4.311,0-8.622a.841.841,0,0,1,.708-.907.871.871,0,0,1,1.113.844C185.349,85.1,185.343,86.618,185.344,88.136Z"
                                                                        transform="translate(-9.898 -58.597)"></path>
                                                                    <path id="Path_485" data-name="Path 485"
                                                                        d="M164.512,21.131c0-.517,0-.98,0-1.443.006-.675.327-.966,1.08-.967q2.537,0,5.074,0c.755,0,1.074.291,1.082.966.005.439.005.878.009,1.317a.615.615,0,0,0,.047.126h.428c1,0,2,0,3,0,.621,0,1.013.313,1.019.788s-.4.812-1.04.813q-7.083,0-14.165,0c-.635,0-1.046-.327-1.041-.811s.4-.786,1.018-.789C162.165,21.127,163.3,21.131,164.512,21.131Zm1.839-.021H169.9v-.764h-3.551Z"
                                                                        transform="translate(0 0)"></path>
                                                                    <path id="Path_486" data-name="Path 486"
                                                                        d="M225.582,107.622c0,.9,0,1.806,0,2.709a.806.806,0,0,1-.787.908.818.818,0,0,1-.814-.924q0-2.69,0-5.38a.82.82,0,0,1,.81-.927.805.805,0,0,1,.79.9C225.585,105.816,225.582,106.719,225.582,107.622Z"
                                                                        transform="translate(-58.483 -78.508)"></path>
                                                                    <path id="Path_487" data-name="Path 487"
                                                                        d="M266.724,107.63c0-.9,0-1.806,0-2.709a.806.806,0,0,1,.782-.912.818.818,0,0,1,.818.919q0,2.69,0,5.38a.822.822,0,0,1-.806.931c-.488,0-.792-.356-.794-.938C266.721,109.411,266.724,108.521,266.724,107.63Z"
                                                                        transform="translate(-97.561 -78.509)"></path>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- dashboard end  -->

        <!-- Restaurant part-start -->
        <?php echo $__env->make('Frontend.User.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Restaurant part-end -->


        <div class="modal fade" id="exampleModalCard" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(__('translate.Payment with stripe')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="card-form" action="<?php echo e(route('card.add.detils')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="" name="card_id" required>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group homec-form-input">
                                        <input class="ecom-wc__form-input card-number" type="text" name="card_number"
                                            placeholder="<?php echo e(__('translate.Card Number')); ?>" autocomplete="off">
                                        <span class="text-danger error-card_number"></span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group homec-form-input">
                                        <input class="ecom-wc__form-input card-expiry-month" type="text" name="month"
                                            placeholder="<?php echo e(__('translate.Month')); ?>" autocomplete="off">

                                        <span class="text-danger error-month"></span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group homec-form-input">
                                        <input class="ecom-wc__form-input card-expiry-year" type="text" name="year"
                                            placeholder="<?php echo e(__('translate.Year')); ?>" autocomplete="off">
                                        <span class="text-danger error-year"></span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group homec-form-input">
                                        <input class="ecom-wc__form-input card-cvc" type="text" name="cvc"
                                            placeholder="<?php echo e(__('translate.CVV')); ?>">
                                        <span class="text-danger error-cvc"></span>
                                    </div>
                                </div>
                                <div class="col-12 mg-top-20 pb-3">
                                    <button type="submit"
                                        class="homec-btn homec-btn__second  homec-btn--payment"><span><?php echo e(__('Submit')); ?></span></button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="<?php echo e(asset('cdn/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('cdn/sweetalert.js')); ?>"></script>
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
                    location.reload();

                    $('.text-danger').text(''); // Reset form
                    $('#card-form')[0].reset(); // Reset form
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
                        'Your Card has been deleted.',
                        'success'
                    )
                    window.location.href = urlToRedirect;
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
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

<?php echo $__env->make('Frontend.Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Frontend/User/card.blade.php ENDPATH**/ ?>