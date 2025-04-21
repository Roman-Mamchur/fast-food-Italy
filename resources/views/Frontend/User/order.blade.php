@extends('Frontend.Layouts.master')
@section('title')
    <title>{{ __('translate.My Orders') }}</title>
@endsection


@section('content')
<main>

    <!-- banner  -->
    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1>{{ __('translate.My Orders') }}</h1>
                    </div>

                    <div class="inner-banner-item">
                        <div class="left">
                            <a href="{{route('index')}}">{{ __('translate.Home') }}</a>
                        </div>
                        <div class="icon">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 7L14 12L10 17" stroke="#E5E6EB" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="left">
                            <span> {{ __('translate.My Orders') }}</span>
                        </div>
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
                @include('Frontend.User.sideber')


                <div class="col-lg-9  col-md-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="dashboard-item-taitel">
                                <h4>{{ __('translate.Dashboard') }} </h4>
                                <p>{{ __('translate.My Orders') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="order-reorderingmain-box">
                        <div class="order-reorderingmain-box-item">
                            <div class="text">

                                <h4>{{ __('translate.My Orders') }}</h4>

                            </div>

                        </div>

                        <div class="order-reorderingmain-box-tabel">
                            <table class=" table w-100 ">
                                <thead>
                                    <tr>
                                        <th>{{ __('translate.Order Id') }}</th>
                                        <th>{{ __('translate.Date') }}</th>
                                        <th>{{ __('translate.Amount') }}</th>
                                        <th>{{ __('translate.Status') }}</th>
                                        <th>{{ __('translate.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $order)
                                        <tr>
                                            <td><a href="{{route('user.order.detils',$order->id)}}"> #{{$order->id}}</a></td>
                                            <td>{{$order->created_at->format('M d, Y h:i A')}}</td>
                                            <td>{{ $setting->currency_icon }}{{$order->grand_total}}</td>
                                            <td>
                                                <div class="delete-action ">
                                                    @if($order->order_status == 1)
                                                        <a href="javascript:;" class="cancel">
                                                            {{ __('translate.Pending') }}
                                                        </a>
                                                    @endif
                                                    @if($order->order_status == 2)
                                                        <a href="javascript:;" class="active">
                                                            {{ __('translate.Proccessing') }}
                                                        </a>
                                                    @endif
                                                    @if($order->order_status == 3)
                                                        <a href="javascript:;" class="successful">
                                                            {{ __('translate.Confimred') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="delete-action ">
                                                    <a href="{{route('user.order.detils',$order->id)}}">
                                                        <button class="view-btn">
                                                            <span>
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M17.6084 11.7904C18.5748 10.7737 18.5748 9.22894 17.6084 8.21222C15.9786 6.49741 13.1794 4.16797 9.99984 4.16797C6.82024 4.16797 4.02108 6.49741 2.39126 8.21222C1.42492 9.22894 1.42492 10.7737 2.39126 11.7904C4.02108 13.5052 6.82024 15.8346 9.99984 15.8346C13.1794 15.8346 15.9786 13.5052 17.6084 11.7904ZM9.99984 12.5013C11.3805 12.5013 12.4998 11.382 12.4998 10.0013C12.4998 8.62059 11.3805 7.5013 9.99984 7.5013C8.61913 7.5013 7.49984 8.62059 7.49984 10.0013C7.49984 11.382 8.61913 12.5013 9.99984 12.5013Z"
                                                                        fill="white" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $data->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- dashboard end  -->

    <!-- Restaurant part-start -->
        @include('Frontend.User.app')
    <!-- Restaurant part-end -->

</main>
@endsection
