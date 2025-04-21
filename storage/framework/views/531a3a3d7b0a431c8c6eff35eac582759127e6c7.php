<?php echo $__env->make('Admin.Base.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

<style>
    .dropdown-menu li {
        padding: 0 0rem;
    }
    .dropdown-menu li a {
        padding: 0 1rem;
    }

    .dropdown-menu li a {
        color: #000929 !important;
    }

    .dropdown-menu li:hover {
        background-color: #e9ecef;
    }

    .form-control {
        height: 35px !important;
        color: #000 !important;
        margin: 2px 5px;
    }

    input[type="date"] {
        width: 94% !important;
        height: 35px !important;
    }

    .dropdown-toggle {
        height: 35px;
    }

    .menu-bar img {
        margin-right: -10px;
    }

    @media only screen and (min-width: 0px) and (max-width: 1278px) {
        .sherah-smenu {
            width: 100% !important;
        }

        .order-invoice .card {
            width: 100% !important;
        }

        a span,
        li span select {
            font-size: 0.8rem;
        }
    }


    @media only screen and (min-width: 992px) and (max-width: 1600px) {
        .sherah-smenu {
            width: 100% !important;
        }

        .order-invoice .card {
            width: 100% !important;
        }

        .menu-bar li a {
            padding-right: unset !important;
            padding-left: unset !important;
        }

        a span,
        li span select,
        .selected_date {
            font-size: 0.8rem;
        }

        body th,
        body td,
        td p,
        td p a {
            font-size: 0.8rem !important;
        }
    }

    @media only screen and (min-width: 0px) and (max-width: 992px) {
        .order-invoice .card {
            width: 100%;
        }
    }

    .sherah-adashboard {
        margin-left: unset;
    }

    .sherah-page-inner {
        padding: 10px;
        border-radius: 5px;
    }

    .logo {
        padding-left: unset;
    }

    th {
        background-color: #0066ff;
        color: #fff !important;
        font-weight: bold !important;

    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;

    }

    #loading-spinner {
        text-align: center;
        background-color: rgba(255, 255, 255, 0.5);
        position: absolute;
        z-index: 999;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #loading-spinner img {
        width: 250px;
        height: 200px;
    }

    #loading-spinner img {

        animation: rotate 2s linear infinite;
        /* Apply the animation */
    }

    @keyframes rotate {
        0% {
            transform: rotateX(0deg);
            /* Initial state: logo upright */
        }

        50% {
            transform: rotateX(180deg);
            /* Flip upside down */
        }

        100% {
            transform: rotateX(360deg);
            /* Complete the flip and return to upright */
        }
    }

    .order-invoice .card {
        width: 80%;
    }


    @media only screen and (min-width: 992px) and (max-width: 1550px) {
        .sherah-adashboard {
            padding-right: unset !important;
        }

        .sherah-table__main .sherah-table__head tr th,
        .sherah-table__main .sherah-table__body tr td {
            padding: 10px;
        }
    }

    @media only screen and (min-width: 1600px) and (max-width: 1860px) {
        .order-invoice .card {
            width: 95%;
        }

        a.btn {
            font-size: 13px !important;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 1100px) {
        .sherah-table__head tr th {
            font-size: 13px;
        }

        .crany-table__product--number a {
            font-size: 14px;
        }

        table p {
            font-size: 14px;
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 992px) {

        table th,
        table td {
            font-size: 14px;
        }
    }

    .modal-dialog .modal-content .modal-body .modal-img-text h3 {
        font-size: 32px;
        font-style: normal;
        font-weight: 700;
        line-height: 125%;
        letter-spacing: -0.32px;
        color: var(--heading-color);
    }

    .modal-dialog .modal-content .modal-body {
        text-align: center;
    }

    .dashboard .modal .modal-content {
        border-radius: 12px;
        border: none;
    }

    .modal {
        position: fixed;
        top: 20%;
        left: 0;
        display: none;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
        outline: 0;
        z-index: 99999999 !important;
    }

    .modal-dialog .modal-content .modal-body .modal-btn .no-btn {
        width: 100px;
        height: 44px;
        line-height: 44px;
        background-color: #fff;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: 145%;
        letter-spacing: -0.09px;
        color: var(--heading-color);
        border: 1px solid var(--grey-scale-500);
        border-radius: 8px;
        transition: alllinear 0.5s;
    }

    .dashboard .dashboard-menu .dashboard-menu-main ul li a {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 18px;
        font-weight: 500;
        line-height: 145%;
        letter-spacing: -0.09px;
        color: var(--heading-color);
        padding: 10px 20px;
        transition: all 0.3s;
    }

    .modal-dialog .modal-content .modal-body .modal-btn .yes-btn {
        background-color: #f01543;
        color: #fff;
        border: 1px solid #f01543;
        width: 130px;
    }

    .dashboard .modal .modal-dialog {
        max-width: 500px;
        text-align: center
    }

    body .menu-bar__text.w-100.btn:hover .text-white {
        color: #000 !important;
    }

    body .menu-bar__text.w-100.btn:hover {
        background-color: #fff !important;
        border: 1px solid #28214c !important;
    }

    .date-range,
    .btn-report,
    .old-order,
    .my-order {
        background: transparent;
        border: 1px solid #fff;
        margin: 0 5px;
    }

    .my-order,
    .old-order {
        background: #00ba00;
    }

    #z-report {
        background: #0d6efd;
    }

    #z-report:hover {
        background: #007fff;
    }

    #custom-report {
        background: #0d6efd;
    }

    #custom-report:hover,
    #z-report:hover {
        background: #007fff !important;
    }

    .date-range .text-white:hover {
        color: #000 !important;
    }

    #start-date,
    #end-date {
        margin: 16px 5px;
    }
    .menu-bar li a.active,
    .active {
        background: #fb8500 !important;
        color: #fff !important;
    }
</style>
<style>
    .sherah-table__main .sherah-table__head tr th,
    .sherah-table__main .sherah-table__body tr td {
        width: 4% !important;
        padding: 10px 3px;
    }
</style>

<body id="sherah-dark-light " class="bg-white">
    <div id="loading-spinner" style="display: none">
        <img src="<?php echo e(asset($setting->logo)); ?>" width="250" height="250" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-md-4" style="background-color: #28214c;">
                <!-- Admin Menu -->
                <!-- Logo -->
                <div class="logo sherah-sidebar-padding">
                    <a href="<?php echo e(url('/admin-dashboard')); ?>"
                        style="height: 150px; width: 150px; margin: auto; padding: 1rem 0rem;">
                        <img class="sherah-logo__main" src="<?php echo e(asset($admin->image)); ?>"
                            style="border-radius: 100%;
                            width: 145px;
                            height: 145px;"
                            alt="#">
                    </a>
                </div>
                <!-- Main Menu -->
                <div class="admin-menu__one sherah-sidebar-padding">

                    <div class="menu-bar">
                        <div id="sherahMenu">
                            <div class="container-fluid">
                                <div class="row mt-3 text-dark">
                                    <div class="col-md-9 col-6">
                                        <p style="font-size: 20px" class="menu-bar-subtaitel text-center text-white">
                                            <?php
                                                $admin_id = Auth::guard('admin')->user()->role;
                                            ?>
                                            <?php if($admin_id == 'Admin'): ?>
                                                Administrator
                                            <?php else: ?>
                                                Manager
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.49999 0V8H9.49999V0H6.49999Z" fill="#ffffff"></path>
                                                <path
                                                    d="M4.46447 11.5355C2.51184 9.58291 2.51184 6.41709 4.46447 4.46447L2.34315 2.34315C-0.781049 5.46734 -0.781049 10.5327 2.34315 13.6569C5.46734 16.781 10.5327 16.781 13.6569 13.6569C16.781 10.5327 16.781 5.46734 13.6569 2.34315L11.5355 4.46447C13.4882 6.41709 13.4882 9.58291 11.5355 11.5355C9.58291 13.4882 6.41709 13.4882 4.46447 11.5355Z"
                                                    fill="#ffffff"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <ul class="menu-bar__one sherah-dashboard-menu" style="background: #28214c;">
                                    <li>
                                        <div class="row my-2 g-0">
                                            <div class="col-sm-9">
                                                <input style="padding: 0 0.5rem" type="date" class="selected_date"
                                                    value="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="btn-group  w-100" style="height: 50px;">
                                                    <button class="btn btn-primary dropdown-toggle" style=""
                                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <img src="<?php echo e(asset('admin/img/notify.svg')); ?>" class="h-100"
                                                            alt="">
                                                        <i class="bi bi-arrow-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a data-id="bell1" class="dropdown-item bell-1 bell1 ring-bell active"
                                                                href="#">Bell
                                                                1</a>
                                                            <audio id="bell1"
                                                                src="<?php echo e(asset('admin/bells/bell2.wav')); ?>"
                                                                preload="auto"></audio>
                                                        </li>
                                                        <li><a data-id="bell2" class="dropdown-item bell2 ring-bell"
                                                                href="#">Bell
                                                                2</a>
                                                            <audio id="bell2"
                                                                src="<?php echo e(asset('admin/bells/bell3.wav')); ?>"
                                                                preload="auto"></audio>
                                                        </li>
                                                        <li><a data-id="bell3" class="dropdown-item bell3 ring-bell"
                                                                href="#">Bell
                                                                3</a>
                                                            <audio id="bell3"
                                                                src="<?php echo e(asset('admin/bells/bell4.mp3')); ?>"
                                                                preload="auto"></audio>
                                                            <audio id="bell4"
                                                                src="<?php echo e(asset('admin/bells/bell.mp3')); ?>"
                                                                preload="auto"></audio>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><span data-id="new"
                                                class="menu-bar__text w-100 btn  my-order">
                                                <span class="menu-bar__name text-white " style="">New Orders <span
                                                        id="user-count"
                                                        style="position: absolute;
   right: -85px;
  top: -25px;
    background: #0d6efd;
    color: #fff;
    width: 20px;
    height: 20px;
    border-radius: 50px;
    display: flex
;
    align-items: center;
    justify-content: center;
    font-size: 12px;"
                                                        class="badge badge-secondary">0</span> </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)"><span data-id="accepted"
                                                class="menu-bar__text w-100 btn accepted-order my-order" style="">
                                                <span class="menu-bar__name  text-white">Accepted Orders </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)"><span data-id="canceled"
                                                class="menu-bar__text  w-100 btn canceled-order my-order"
                                                style="">
                                                <span class="menu-bar__name text-white">Canceled Orders </span>
                                            </span>
                                        </a>
                                    </li>
                                    

                                    <li>
                                        <a href="javascript:void(0)"><span data-id="all"
                                                class="menu-bar__text w-100 btn all-order1 old-order" style="">
                                                <span class="menu-bar__name text-white">All Orders </span>
                                            </span>
                                        </a>
                                    </li>
                                    <?php
                                        $admin_id = Auth::guard('admin')->user()->role;
                                    ?>
                                    <?php if($admin_id == 'Admin'): ?>
                                        <li>
                                            <a href="javascript:void(0)"><span data-id="z-report" id="z-report"
                                                    class="menu-bar__text w-100 btn btn-report"
                                                    style="cursor: pointer; text-align: center;">
                                                    <span class="menu-bar__name text-white">Z Report</span>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <label for="" class="text-white">Custom Report</label>
                                            <input type="date" name="start_date" id="start-date" class="">
                                            <input type="date" name="end_date" id="end-date" class="">
                                            <a href="javascript:void(0)" class="date-range"
                                                style="padding: 0;     margin: 4px 5px;     width: 94%; border: none;"><span
                                                    id="custom-report" data-id="custom-report"
                                                    style="    font-size: 15px;"
                                                    class="menu-bar__text w-100 btn text-white">Custom Report</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    
                                    

                                </ul>
                            </div>


                        </div>


                    </div>
                    <!-- End Nav Menu -->
                </div>

                <!-- End Admin Menu -->
            </div>
            <!-- End sherah Admin Menu -->

            <!-- sherah Dashboard -->
            <section class="sherah-adashboard  col-xl-10  col-md-8 sherah-show">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-9">
                            <div class="sherah-body">
                                <!-- Dashboard Inner -->
                                <div class="sherah-dsinner">
                                    <div class="row mg-top-30">
                                        <div class="col-12 sherah-flex-center">
                                            <!-- Sherah Breadcrumb -->
                                            <div class="sherah-breadcrumb ">
                                                <h2 class="sherah-breadcrumb__title text-center">
                                                    <?php echo e(\Carbon\Carbon::now('Europe/Dublin')->format('l')); ?>

                                                </h2>
                                                <ul class="sherah-breadcrumb__list">
                                                    <li style="font-size: 18px;"><?php echo e(date('d-M-Y')); ?>

                                                        <img width="24"
                                                            src="<?php echo e(asset('admin/img/clock-time.svg')); ?>"
                                                            alt="">
                                                    </li>
                                                    <li style="font-size: 18px;" id="clock">
                                                        <?php echo e(\Carbon\Carbon::now('Europe/Dublin')->format('h:i A')); ?>

                                                    </li>
                                                </ul>
                                                <div class="bg-primary text-center text-white py-1" id="currentPage1">
                                                    New Orders</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div
                                        class="sherah-table sherah-page-inner sherah-border sherah-default-bg order-management">
                                        <table id="sherah-table__vendor"
                                            class="sherah-table__main sherah-table__main-v3">
                                            <!-- sherah Table Head -->
                                            <thead class="sherah-table__head">
                                                <tr>
                                                    <th class="sherah-table__column-1 sherah-table__h1 text-truncate">
                                                        Sr #</th>
                                                    <th class="sherah-table__column-1 sherah-table__h1 text-truncate">
                                                        Order ID
                                                    </th>
                                                    <th class="sherah-table__column-3 sherah-table__h3 text-truncate">
                                                        Order Time
                                                    </th>
                                                    <th class="sherah-table__column-9 sherah-table__h9 text-truncate">
                                                        Collection Time
                                                    </th>
                                                    <th
                                                        class="sherah-table__column-7 sherah-table__h7 text-truncate all-order-t">
                                                        Order Status
                                                    </th>
                                                    <th class="sherah-table__column-8 sherah-table__h8 text-truncate">
                                                        Payment Method
                                                    </th>
                                                    <th class="all-order-t">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="sherah-table__body">

                                            </tbody>
                                            <div class="row mg-top-40">
                                                
                                            </div>
                                        </table>
                                    </div>

                                    <div class="sherah-body">
                                        <!-- Dashboard Inner -->
                                        <div class="sherah-dsinner">

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4 order-report">


                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- End Dashboard Inner -->
                                    </div>
                                </div>
                                <!-- End Dashboard Inner -->
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-8">
                            <div class="sherah-body">
                                <!-- Dashboard Inner -->
                                <div class="sherah-dsinner">

                                    <div class="container-fluid order-invoice">

                                    </div>
                                </div>
                                <!-- End Dashboard Inner -->
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <input type="hidden" id="currentPage" name="" value="new">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-img">
                        <span>
                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_312_69316)">
                                    <path
                                        d="M77.4976 37.4998H45.8317C44.4517 37.4998 43.3318 36.3799 43.3318 34.9999C43.3318 33.62 44.4517 32.5 45.8317 32.5H77.4976C78.8776 32.5 79.9975 33.62 79.9975 34.9999C79.9975 36.3799 78.8776 37.4998 77.4976 37.4998Z"
                                        fill="#F01543"></path>
                                    <path
                                        d="M64.9978 50.0011C64.3576 50.0011 63.718 49.7576 63.2309 49.2681C62.2544 48.291 62.2544 46.7078 63.2309 45.7312L73.9642 34.9985L63.2309 24.2652C62.2544 23.2887 62.2544 21.7055 63.2309 20.729C64.2081 19.7518 65.7913 19.7518 66.7678 20.729L79.2674 33.2286C80.2439 34.2051 80.2439 35.7883 79.2674 36.7648L66.7678 49.2644C66.2777 49.7576 65.6381 50.0011 64.9978 50.0011Z"
                                        fill="#F01543"></path>
                                    <path
                                        d="M26.666 80.0014C25.9526 80.0014 25.2757 79.9013 24.5995 79.6914L4.53965 73.0082C1.81025 72.0549 0 69.5116 0 66.6687V6.67057C0 2.99393 2.99002 0.00390625 6.66666 0.00390625C7.37953 0.00390625 8.05639 0.104001 8.73325 0.313955L28.7924 6.9971C31.5225 7.95044 33.3321 10.4937 33.3321 13.3366V73.3347C33.3321 77.0114 30.3427 80.0014 26.666 80.0014ZM6.66666 5.00375C5.74994 5.00375 4.99984 5.75385 4.99984 6.67057V66.6687C4.99984 67.3785 5.47651 68.0383 6.15642 68.2751L26.1222 74.9283C26.2657 74.9747 26.4524 75.0016 26.666 75.0016C27.5828 75.0016 28.3322 74.2515 28.3322 73.3347V13.3366C28.3322 12.6268 27.8556 11.967 27.1757 11.7302L7.20986 5.07699C7.06643 5.0306 6.87967 5.00375 6.66666 5.00375Z"
                                        fill="#F01543"></path>
                                    <path
                                        d="M50.8315 26.6699C49.4516 26.6699 48.3316 25.55 48.3316 24.17V9.17049C48.3316 6.87381 46.4622 5.00375 44.1655 5.00375H6.66667C5.28671 5.00375 4.16675 3.88379 4.16675 2.50383C4.16675 1.12387 5.28671 0.00390625 6.66667 0.00390625H44.1655C49.2221 0.00390625 53.3315 4.11388 53.3315 9.17049V24.17C53.3315 25.55 52.2115 26.6699 50.8315 26.6699Z"
                                        fill="#F01543"></path>
                                    <path
                                        d="M44.1655 70.002H30.8322C29.4522 70.002 28.3323 68.882 28.3323 67.5021C28.3323 66.1221 29.4522 65.0021 30.8322 65.0021H44.1655C46.4622 65.0021 48.3316 63.1321 48.3316 60.8354V45.8359C48.3316 44.4559 49.4516 43.3359 50.8316 43.3359C52.2115 43.3359 53.3315 44.4559 53.3315 45.8359V60.8354C53.3315 65.892 49.2221 70.002 44.1655 70.002Z"
                                        fill="#F01543"></path>
                                </g>
                            </svg>
                        </span>
                    </div>

                    <div class="modal-img-text">
                        <h3><?php echo e(__('translate.Are you sure want to leave?')); ?></h3>
                    </div>

                    <div class="modal-btn">
                        <button type="button" class="no-btn" data-bs-dismiss="modal"><?php echo e(__('translate.No')); ?>

                        </button>
                        <a href="<?php echo e(route('logout')); ?>">
                            <button type="button" class="no-btn yes-btn"><?php echo e(__('translate.Yes, Logout')); ?> </button>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End sherah Dashboard -->
    <script src="<?php echo e(asset('admin/js/jquery-migrate.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('cdn/toster.main.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/datatables.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>

    <script>
        var audioPlayer = $('#bell4')[0]; // jQuery object, but we need the raw DOM element
        var storedBellId = localStorage.getItem('selectedBell');
        document.querySelectorAll(".ring-bell").forEach(bell => {
            bell.classList.remove("active");
        });
        if(storedBellId == 'bell1'){
            $('.bell1').addClass('')
        }else if(storedBellId == 'bell2'){
            $('.bell2 ').addClass('active')
        }else if(storedBellId == 'bell2'){
            $('.bell3').addClass('active')
        }else{
        }
        
        // Function to fetch user count every 5 seconds
        function fetchUserCount() {
            $.ajax({
                url: '/new-orders', // The URL for the route
                type: 'GET',
                success: function(response) {
                    // Update the user count displayed in the DOM
                    $('#user-count').text(response.orders);
                    if (response.orders > 0) {
                        // $('.all-order-t').hide();
                        var storedBellId = localStorage.getItem('selectedBell');
                        if (storedBellId) {
                            var audioPlayer = $('#' + storedBellId)[0]; // Get the audio element
                            if (audioPlayer) {
                                audioPlayer.play(); // Play the stored bell
                            }
                        } 
                        // else {
                        //     audioPlayer.play(); // Play the audio when the button is clicked
                        // }
                    } else {
                        audioPlayer.pause(); // Pause the audio
                        audioPlayer.currentTime = 0;
                    }
                },
                error: function() {
                    // Handle errors
                }
            });
        }

        // Call the function initially to set the user count
        fetchUserCount();
        // Call the function every 5 seconds (5000 milliseconds) to get updated count
        setInterval(fetchUserCount, 1000);
    </script>

    <script>
        $(document).ready(function() {

            //    get new orders

            $('.selected_date').on('change', function(e) {
                $('#loading-spinner').show();
                // getOrderOfCurrentPage1('all');
                setTimeout(function() {
                    $('#loading-spinner').hide(); // Hide loading spinner
                }, 1000); // Delay of 3 seconds
                setTimeout(function() {
                    $('.my-order[data-id="all"]').trigger('click');
                }, 100);

            });
            $('.my-order').on('click', function(e) {
                $('.my-order').removeClass('active');
                $(this).addClass('active');
                $('.order-invoice').html('');
                $('.order-report').html('');
                var getDate = $('.selected_date').val();
                if ($(this).data('id') == 'new') {
                    $('#currentPage').val('new');
                    $('#currentPage1').text('New Order');
                } else if ($(this).data('id') == 'accepted') {
                    $('#currentPage').val('accepted');
                    $('#currentPage1').text('Accepted Order');
                } else if ($(this).data('id') == 'refund') {
                    $('#currentPage').val('refund');
                    $('#currentPage1').text('Refund Order');
                } else if ($(this).data('id') == 'canceled') {
                    $('#currentPage').val('canceled');
                    $('#currentPage1').text('Cancel Order');
                } else {
                    $('#currentPage').val('all');
                    $('#currentPage1').text('All Order');

                }
                $('.old-order').removeClass('active');
                if ($(this).data('id') == 'new') {
                    $('.selected_date').val('');
                    $('.selected_date').val(new Date().toISOString().split('T')[0]);
                }
                var getDate = $('.selected_date').val();
                if (getDate == '' || getDate == undefined) {
                    toastr.error('Please select the date first');
                    return false
                }
                $('#loading-spinner').show();
                $('.order-management .sherah-table__body').html('loading...')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/new-orders',
                    data: {
                        get_date: getDate,
                        order_type: $(this).data('id')
                    },
                    before: function() {

                        $('.order-management .sherah-table__body').html('loading...')

                    },
                    success: function(data) {

                        $('.order-management .sherah-table__body').html(data.html);
                        // var jsonData = JSON.parse(data);
                        // toastr.success(jsonData.msg)
                        if (data.ordersall == 1) {
                            $('.all-order-t').show();
                        } else {
                            $('.all-order-t').hide();
                        }
                        setTimeout(function() {
                            $('#loading-spinner').hide(); // Hide loading spinner
                        }, 1000); // Delay of 3 seconds
                    },
                    errors: function(response) {
                        toastr.error('Something went wrong, please try again')
                    },
                });
            });

            function getOrderOfCurrentPage(order_type) {
                $('.order-invoice').html('');

                var getDate = $('.selected_date').val();
                if (order_type == 'accepted') {
                    $('#currentPage1').text('Accepted Order');
                } else if (order_type == 'canceled') {
                    $('#currentPage1').text('Canceled');
                } else if (order_type == 'all') {
                    $('#currentPage1').text('All Order');
                } else {
                    $('#currentPage1').text('New Order');
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/new-orders',
                    data: {
                        get_date: getDate,
                        order_type: order_type
                    },
                    before: function() {

                        $('.order-management .sherah-table__body').html('loading...')

                    },
                    success: function(data) {

                        $('.order-management .sherah-table__body').html(data.html);
                        // var jsonData = JSON.parse(data);
                        // toastr.success(jsonData.msg)
                        if (data.ordersall == 1) {
                            $('.all-order-t').show();
                        } else {
                            $('.all-order-t').hide();
                        }
                        setTimeout(function() {
                            $('#loading-spinner').hide(); // Hide loading spinner
                        }, 1000); // Delay of 3 seconds
                    },
                    errors: function(response) {
                        toastr.error('Something went wrong, please try again')
                    },
                });
            }
            function getOrderOfCurrentPage1(order_type) {
                $('.order-invoice').html('');

                var getDate = $('.selected_date').val();
                $('.old-order').addClass('active');
                $('#currentPage1').text('All Order');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/old-orders',
                    data: {
                        get_date: getDate,
                        order_type: 'all'
                    },
                    before: function() {

                        $('.order-management .sherah-table__body').html('loading...')

                    },
                    success: function(data) {

                        $('.order-management .sherah-table__body').html(data.html);
                        // var jsonData = JSON.parse(data);
                        // toastr.success(jsonData.msg)
                        $('.all-order-t').show();
                        
                        setTimeout(function() {
                            $('#loading-spinner').hide(); // Hide loading spinner
                        }, 1000); // Delay of 3 seconds
                    },
                    errors: function(response) {
                        toastr.error('Something went wrong, please try again')
                    },
                });
            }
            $('.old-order').on('click', function(e) {
                $('.my-order').removeClass('active');
                $(this).addClass('active');
                var getDate = $('.selected_date').val();
                if (getDate == '' || getDate == undefined) {
                    toastr.error('Please select the date first');
                    return false
                }
                $('.order-invoice').html('');
                $('#currentPage').val('all');
                $('#loading-spinner').show();
                $('#showDeleteBtn').show();
                $('.order-management .sherah-table__body').html('loading...')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/old-orders',
                    data: {
                        get_date: getDate,
                        order_type: $(this).data('id'),
                        currentPage: 'all'
                    },
                    before: function() {

                        $('.order-management .sherah-table__body').html('loading...')

                    },
                    success: function(data) {
                        $('.order-management .sherah-table__body').html(data.html);
                        // var jsonData = JSON.parse(data);
                        // toastr.success(jsonData.msg)
                        $('#currentPage1').text('All Order');
                        console.log(data.ordersall);
                        $('.all-order-t').show();
                        setTimeout(function() {
                            $('#loading-spinner').hide(); // Hide loading spinner
                        }, 1000); // Delay of 3 seconds
                    },
                    errors: function(response) {
                        toastr.error('Something went wrong, please try again')
                    },
                });
            });

            //    get order's invoice

            $(document).on('click', '.load-invoice', function(e) {
                var orderID = $(this).data('id');
                $('#loading-spinner').show();
                $('.order-invoice').html('');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/load-invoice',
                    data: {
                        order_id: orderID
                    },
                    before: function() {
                        $('.order-invoice').html('loading...')
                    },
                    success: function(data) {
                        $('.order-invoice').show();
                        $('.order-invoice').html(data.html);
                        // var jsonData = JSON.parse(data);
                        // toastr.success(jsonData.msg)
                        setTimeout(function() {

                            $('#loading-spinner').hide(); // Hide loading spinner
                        }, 1000); // Delay of 3 seconds
                    },
                    errors: function(response) {
                        toastr.error('Something went wrong, please try again')
                    },
                });
            });

            $(document).on('click', '.delete-order', function(e) {
                var orderID = $(this).data('id');
                // if (!confirm('Are you sure you want to delete this order?')) {
                //     return false;
                // }
                $('#loading-spinner').show();
                var row = $(this).data('row');
                var getDate = $('.selected_date').val();
                var currentP = $('#currentPage').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    url: '/order-delete',
                    data: {
                        order_id: orderID,
                        get_date: getDate,
                        currentPage: 'all'
                    },
                    before: function() {
                        $('.order-invoice').html('loading...')
                    },
                    success: function(data) {

                        if (data.status) {
                            toastr.success(data.message)
                            $('.order-invoice').html('')
                            $('.order-management .sherah-table__body').html(data.html1);
                            // $('#currentPage1').text('New Order');
                            // if(currentP == 'accepted'){
                            // $('#currentPage1').text('Accepted Order');
                            // } else if(currentP == 'canceled') {
                            //     $('#currentPage1').text('Canceled');
                            // } else if(currentP == 'all'){
                            // } else {
                            //     $('#currentPage1').text('New Order');
                            // }
                            $('#currentPage1').text('All Order');
                            setTimeout(function() {
                                $('#' + row).remove();
                                $('#loading-spinner').hide(); // Hide loading spinner
                            }, 1000); // Delay of 3 seconds
                        } else {
                            toastr.error(data.message)
                        }
                    },
                    errors: function(response) {
                        toastr.error('Something went wrong, please try again')
                    },
                });

            });

            $(document).on('click', '.cancel-order', function(e) {
                var orderID = $(this).data('id');
                // if (!confirm('Are you sure you want to decline this order?')) {
                //     return false;
                // }
                $('#loading-spinner').show();
                $('.order-invoice').html('');
                var getDate = $('.selected_date').val();
                var row = $(this).data('row');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/decline-order',
                    data: {
                        order_id: orderID,
                        get_date: getDate,
                        currentPage: $('#currentPage').val()
                    },
                    before: function() {
                        $('.order-invoice').html('loading...')
                    },
                    success: function(data) {
                        toastr.success(data.message)
                        $('.my-order').removeClass('active');
                        $('.canceled-order').addClass('active');
                        $('.order-invoice').html('')
                        // $('.order-management .sherah-table__body').html(data.html1);
                        // getOrderOfCurrentPage('canceled');
                        setTimeout(function() {
                            $('#' + row).remove();
                            if (!row) {
                                audioPlayer.pause(); // Pause the audio
                                audioPlayer.currentTime = 0;
                            }
                            $('#loading-spinner').hide(); // Hide loading spinner
                        }, 1000); // Delay of 3 seconds
                    },
                    errors: function(response) {
                        toastr.error('Something went wrong, please try again')
                    },
                });
            });

            $(document).on('click', '.accept-order', function(e) {
                var orderID = $(this).data('id');
                // if (!confirm('Are you sure you want to accept this order?')) {
                //     return false;
                // }
                var row = $(this).data('row');
                $('#loading-spinner').show();
                $('.order-invoice').html('');
                var getDate = $('.selected_date').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/accept-order',
                    data: {
                        order_id: orderID,
                        get_date: getDate,
                        currentPage: $('#currentPage').val()
                    },
                    before: function() {
                        $('.order-invoice').html('loading...')
                    },
                    success: function(data) {
                        $('.my-order').removeClass('active');
                        $('.accepted-order').addClass('active');
                        toastr.success(data.message)
                        $('.order-invoice').html(data.html);
                        // $('.order-management .sherah-table__body').html(data.html1);
                        $('#' + row).remove();
                        if (!row) {
                            audioPlayer.pause(); // Pause the audio
                            audioPlayer.currentTime = 0;
                        }
                        setTimeout(function() {
                            $('#loading-spinner').hide(); // Hide loading spinner
                            console.log(row)

                        }, 1000); // Delay of 3 seconds
                        var content = $('#print-invoice').html();
                        $('#print-invoice').print();
                        // getOrderOfCurrentPage('accepted');
                        setTimeout(function() {
                            $('.order-invoice').hide();
                        }, 500); // Delay of 3 seconds

                    },
                    errors: function(response) {
                        toastr.error('Something went wrong, please try again')
                    },
                });
            });


            //    order reports

            $('.date-range').on('click', function() {
                var startDate = $('#start-date').val();
                var endDate = $('#end-date').val();
                if (!startDate) {
                    alert('Please Select Start Date');
                }
                if (!endDate) {
                    alert('Please Select End Date');
                }

                fetchOrderReport(startDate, endDate);
            });


            // Function to send AJAX request
            function fetchOrderReport(startDate, endDate) {
                $('#loading-spinner').show();
                $('.order-report').html('Loading...');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/order-report',
                    data: {
                        report_type: 'custom-report',
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(data) {
                        $('.order-report').html(data.html);
                        $('.order-report').html(data.html)

                        setTimeout(function() {
                            var content = $('#print-invoice-report')
                                .html(); // Get the HTML content of the specific div

                            
                            
                            
                            
                            
                            
                            // Open the print dialog

                            // $('.order-report .card').hide();
                            setTimeout(function() {
                                $('#loading-spinner')
                                    .hide(); // Hide loading spinner
                            }, 1000); // Delay of 3 seconds
                        }, 2000)
                        $('#loading-spinner').hide();
                    },
                    error: function(response) {
                        toastr.error('Something went wrong, please try again');
                        $('#loading-spinner').hide();
                    }
                });
            }

            $('.btn-report').on('click', function(e) {
                var orderID = $(this).data('id');
                var getDate = $('.selected_date').val();
                if (getDate == '' || getDate == undefined) {
                    toastr.error('Please select the date first');
                    return false
                }
                $('#loading-spinner').show();
                $('.order-report').html('loading...')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/order-report',
                    data: {
                        report_type: orderID,
                        get_date: getDate
                    },
                    before: function() {
                        $('.order-report').html('loading...')
                    },
                    success: function(data) {
                        $('.order-report').html(data.html)

                        setTimeout(function() {
                            var content = $('#print-invoice-report')
                                .html(); // Get the HTML content of the specific div

                            
                            
                            
                            
                            
                            
                            // Open the print dialog

                            // $('.order-report .card').hide();
                            setTimeout(function() {
                                $('#loading-spinner')
                                    .hide(); // Hide loading spinner
                            }, 1000); // Delay of 3 seconds
                        }, 2000)


                    },
                    errors: function(response) {
                        toastr.error('Something went wrong, please try again')
                    },
                });
            })

        });
    </script>

    <script>
        console.log(localStorage.getItem('selectedBell'));
        // jQuery version of the code
        $('.ring-bell').click(function() {
            var bellId = $(this).data('id'); // Get the clicked bell ID
            $('.ring-bell').removeClass('active');
            // bellId.addClass('active');
            var audioPlayer = $('#' + bellId)[0]; // Get the audio element
            if (audioPlayer) {
                audioPlayer.play(); // Play the selected bell
                localStorage.setItem('selectedBell', bellId); // Store the bell ID in localStorage
            }
        });
    </script>

    <script>
        function printReport() {
            $('#print-invoice-report').print();
            $('.order-report .card').hide();
        }
        $(document).on('click', '#printInvoice', function() {
            var content = $('#print-invoice').html(); // Get the HTML content of the specific div

            
            
            
            
            
            
            

            $('#print-invoice').print();
        });
    </script>

    <script>
        $(document).ready(function() {
            // function updateClock() {
            // var now = new Date();
            // var hours = now.getHours().toString().padStart(2, '0');
            // var minutes = now.getMinutes().toString().padStart(2, '0');
            // var seconds = now.getSeconds().toString().padStart(2, '0');
            // var timeString = hours + ":" + minutes + ":" + seconds;
            // $('#clock').text(timeString);
            // }

            // Initial call to update clock immediately
            updateClock();

            // Set interval to update clock every second
            setInterval(updateClock, 1000);
        });
    </script>
</body>

</html>
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/pages/order/order_management.blade.php ENDPATH**/ ?>