@extends('Frontend.Layouts.master')

@section('title')
    <title>{{$setting->app_name}} - {{ __('translate.WishList') }}</title>
@endsection

@section('content')
<main>

    <!-- banner  -->

    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1>{{ __('translate.WishList') }}</h1>
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
                            <span>{{ __('translate.WishList') }}</span>
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
                <div class="col-lg-12 col-md-8 ">
                    <div class="row">
                        @foreach ($product as $product)
                            <div class="col-lg-6 col-md-12  popular-item-mt-30px" >
                                <div class="popular-item-box">
                                    <div class="popular-item-box-img">
                                        <img src="{{asset($product['tumb_image'])}}" alt="thumb">
                                        <div class="popular-item-box-img-overlay">
                                        </div>
                                    </div>

                                    <div class="popular-inner-box">
                                        <a href="{{route('menu-detils',$product->slug)}}">
                                            <div class="popular-item-box-text">
                                                <h3>{{$product->name}}</h3>
                                            </div>
                                        </a>
                                        @foreach(json_decode($product->specifaction, true) as $name)
                                            <div class="popular-inner-item">
                                                <div class="icon">
                                                    <span><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_304_21999)">
                                                            <path
                                                                d="M6.66699 10.0013L8.77923 11.9023C9.13881 12.2259 9.69748 12.1764 9.99449 11.7945L13.3337 7.5013M10.0003 18.3346C14.6027 18.3346 18.3337 14.6037 18.3337 10.0013C18.3337 5.39893 14.6027 1.66797 10.0003 1.66797C5.39795 1.66797 1.66699 5.39893 1.66699 10.0013C1.66699 14.6037 5.39795 18.3346 10.0003 18.3346Z"
                                                                stroke="#FE724C" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg></span>
                                                </div>

                                                <div class="text">
                                                    <h5>{{$name}}</h5>
                                                </div>
                                            </div>
                                        @endforeach


                                        <div class="popular-inner-item-btm">
                                            <div class="text">
                                                <h3>{{$setting->currency_icon}}{{$product->price}}</h3>
                                            </div>


                                            <div class="popular-inner-item-btn">
                                                <a href="{{route('wishlist.remove',$product->id)}}" class="main-btn-five">
                                                    <span>
                                                        <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.834 0.890599C6.20493 0.334202 6.8294 0 7.4981 0H9.35737C10.0261 0 10.6505 0.334202 11.0215 0.8906L11.9277 2.25H15.6777C16.0919 2.25 16.4277 2.58579 16.4277 3C16.4277 3.41421 16.0919 3.75 15.6777 3.75H1.17773C0.763521 3.75 0.427734 3.41421 0.427734 3C0.427734 2.58579 0.763521 2.25 1.17773 2.25H4.92773L5.834 0.890599ZM11.4277 20H5.42773C3.2186 20 1.42773 18.2091 1.42773 16V5H15.4277V16C15.4277 18.2091 13.6369 20 11.4277 20ZM6.42773 8.25C6.84195 8.25 7.17773 8.58579 7.17773 9V16C7.17773 16.4142 6.84195 16.75 6.42773 16.75C6.01352 16.75 5.67773 16.4142 5.67773 16L5.67773 9C5.67773 8.58579 6.01352 8.25 6.42773 8.25ZM10.4277 8.25C10.8419 8.25 11.1777 8.58579 11.1777 9V16C11.1777 16.4142 10.8419 16.75 10.4277 16.75C10.0135 16.75 9.67774 16.4142 9.67773 16V9C9.67773 8.58579 10.0135 8.25 10.4277 8.25Z" fill="white"></path>
                                                        </svg>
                                                    </span>
                                                    {{ __('translate.Remove') }}
                                                </a>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $product['id'] }}" class="main-btn-five">
                                                        <span>
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6 4H18C20.2091 4 22 5.79086 22 8V13C22 15.2091 20.2091 17 18 17H10C7.79086 17 6 15.2091 6 13V4ZM6 4C6 2.89543 5.10457 2 4 2H2"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path
                                                                    d="M11 20.5C11 21.3284 10.3284 22 9.5 22C8.67157 22 8 21.3284 8 20.5C8 19.6716 8.67157 19 9.5 19C10.3284 19 11 19.6716 11 20.5Z"
                                                                    stroke-width="1.5"></path>
                                                                <path
                                                                    d="M20 20.5C20 21.3284 19.3284 22 18.5 22C17.6716 22 17 21.3284 17 20.5C17 19.6716 17.6716 19 18.5 19C19.3284 19 20 19.6716 20 20.5Z"
                                                                    stroke-width="1.5"></path>
                                                                <path d="M14 8L14 13" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                                <path d="M16.5 10.5L11.5 10.5" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                        {{ __('translate.Add to Cart') }}
                                                </button>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- dashboard end  -->


    <!-- Restaurant part-start -->
    @if($setting->app_visibility == 1)
    <section class="restaurant">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="restaurant-taitel">
                        <h2>{{ $app->titel }}</h2>

                        <h4>{!! clean($app->description) !!}</h4>
                    </div>

                    <div class="restaurant-taitel-btn">
                        <a href="{{ $app->play_store }}" class="paly-bg" > <span>
                      
                            </span> {{ __('translate.Play Store') }}</a>
                        <a href="{{ $app->i_store }}" class=" restaurant-taitel-btn-two"> <span>
                              
                            </span> {{ __('translate.App Store') }}</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="restaurant-img-main">
                        <div class="restaurant-img">
                                <img src="{{asset($app->image)}}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Restaurant part-end -->
</main>

@endsection
