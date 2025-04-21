<style>
    /* Regular styles for the table */
    .table-responsive-sm {
        width: 100%;
        margin-bottom: 20px;
    }

    .right {
        text-align: right;
    }

    .left {
        text-align: left;
    }

    #print-invoice td, #print-invoice th {
        border: none;
        padding-top: 4px;
        padding-bottom: 4px;
    }

    /* Centering the content on the print page */
    @media print {
        #print-invoice-report {
            width: 300px;
            max-width: 300px;
            margin: 0 auto;
            text-align: center;
            align-items: center;
            visibility: visible;
            page-break-before: auto;
            page-break-after: auto;
            overflow: hidden;
            transform: scale(1);  /* Scale down the content */
            transform-origin: top left; /* Start scaling from the top-left */
        }

        #print-invoice-report td, #print-invoice-report th {
            border: none;
            padding-top: 4px;
            padding-bottom: 4px;
        }

        /* Prevent page breaks inside the content */
        #print-invoice-report p {
            page-break-inside: avoid;
        }
        .page-break{
            page-break-before: always;
        }
    }
    #print-invoice-report th, #print-invoice-report td {
        padding: 5px;
        text-align: left;
        border: unset !important;

    }
    .page-break{
        page-break-before: always;
    }

</style>
<div class="card">

    <div class="card-body ">
        <div id="print-invoice-report">

            <div class="row text-center justify-content-center my-3" style="text-align: center">
                <div class="col-md-6 col-6">
                    <a href="#"> <img height="100" style="height: 100px;" class="sherah-logo__main" src="<?php echo e(asset($setting->logo)); ?>" alt="#"></a>
                    <h6 class="mt-2"><?php echo e($setting->app_name ?? ''); ?></h6>

                </div>
                <div class="col-12 text-center">
                    <p style="font-size: 11px">Barrack St, bansha West, Bansha,<br>
                        Co. Tipperary, +353 62 54448</p>
                </div>
            </div>
            <devider style="    border-bottom: 2px dotted #111 !important;
            margin: 15px 0px !important;
            width: 100%;
            display: block;" class="devider"></devider>


            <div class="row text-center justify-content-center my-2" style="text-align: center">

                <div class=" col-12 py-1 text-right">
                    <h6 style="font-weight: 400">
                        <?php if($reportType == 'Custom Report'): ?>
                        Date:
                        <b><?php echo e($date); ?></b>
                        <?php else: ?>
                        <?php echo e($reportType); ?> Date:<b><?php echo e(\Carbon\Carbon::parse($date)->format('d-M-Y')); ?></b>
                        <?php endif; ?>
                    </h6>
                </div>
            </div>

            <devider style="    border-bottom: 2px dotted #111 !important;
                margin: 15px 0px !important;
                width: 100%;
                display: block;" class="devider"></devider>


            <div class="row">
                <div class="col-12  ml-auto">
                    <table class="" style="margin: unset">
                        <tbody>
                        <tr >

                            <td style="font-size: 15px;  text-align: left;   width: 200px;" class="left py-1">
                                Credit Order
                            </td>
                            <td style="font-size: 15px; text-align: right;"><?php echo e($creditOrders->count()); ?></td>
                        </tr>

                        <tr >
                            <td style="font-size: 15px;  text-align: left;   width: 200px;" class="left py-1">
                                Credit amount
                            </td>
                            <td style="font-size: 15px; text-align: right;">
                                <strong><?php echo e($setting->currency_icon); ?> <?php echo e(number_format($creditOrders->sum('total'), 2)); ?></strong>
                            </td>
                        </tr>

                        <tr >

                            <td style="font-size: 15px;  text-align: left;   width: 200px;" class="left py-1">Cash Order</td>
                            <td style="font-size: 15px; text-align: right;"><?php echo e($cashOrders->count()); ?></td>
                        </tr>

                        <tr >
                            <td style="font-size: 15px;  text-align: left;   width: 200px;" class="left py-1">Cash amount</td>
                            <td style="font-size: 15px; text-align: right;">
                                <strong><?php echo e($setting->currency_icon); ?> <?php echo e(number_format($cashOrders->sum('total'), 2)); ?></strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>


            <devider style="    border-bottom: 2px dotted #111 !important;
                    margin: 15px 0px !important;
                    width: 100%;
                    display: block;" class="devider"></devider>


            <div class="row">
                <div class="col-12  ml-auto">
                    <table class="" style="margin: unset">
                        <tbody>
                        <tr >

                            <td style="font-size: 15px;  text-align: left;   width: 200px;" class="left py-1">
                                Total Order
                            </td>
                            <td style="font-size: 15px; text-align: right;"
                                class="right"><?php echo e($cashOrders->count() + $creditOrders->count()); ?></td>
                        </tr>

                        <tr >
                            <td style="font-size: 15px;  text-align: left;   width: 200px;" class="left py-1">
                                Total amount
                            </td>
                            <td style="font-size: 15px; text-align: right;" class="right">
                                <strong><?php echo e($setting->currency_icon); ?> <?php echo e(number_format($cashOrders->sum('total') + $creditOrders->sum('total'), 2)); ?></strong>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>


            </div>
            <devider style="    border-bottom: 2px dotted #111 !important;
                margin: 15px 0px !important;
                width: 100%;
                display: block;" class="devider"></devider>

            <div class="row">
                <div class="col-12 text-center">
                    <p style="font-size: 15px;  text-align: center">Print Date: <?php echo e(\Carbon\Carbon::now()->format('d m, Y h:i A')); ?></p>
                </div>
            </div>


        </div>
        <div class="page-break"></div>
    </div>
    <a onclick="printReport()" href="javascript:void(0)" class="btn btn-primary w-100">Print</a>
</div>
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/pages/order/_partials/reports.blade.php ENDPATH**/ ?>