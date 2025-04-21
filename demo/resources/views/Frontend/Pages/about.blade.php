@extends('Frontend.Layouts.master')

@section('title')
    <title>{{$seo_setting->seo_title}}</title>
@endsection

@section('meta')
    <meta name="title" content="{{$seo_setting->seo_title}}">
    <meta name="description" content="{{$seo_setting->seo_description}}">
    <meta name="keywords" content="{{$seo_setting->seo_description}}">
@endsection

@section('content')
<main>

    <!-- banner  -->

    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1>{{ __('translate.About Us') }}</h1>
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
                            <span>{{ __('translate.About Us') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner  -->


    <!-- about part start  -->

    <section class="about-us s-padding">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-lg-6 ">
                    <div class="about-us-img">
                        <img src="{{asset($about_us->banner_image)}}" class="w-100" alt="thumb">

                        <div class="about-us-img-btn-img">

                            <div class="about-us-img-btn-img-main">
                                <div class="about-us-img-btn-img-main-animetion-img">

                                </div>
                                <div class="about-us-img-btn-img-overlay">
                                    <h2>{{$about_us->title}}</h2>
                                    <span>{{ __('translate.YEARS') }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 about-pl-45px" data-aos="fade-left">
                    <div class="about-us-head">
                        <h2>{{$about_us->main_title}}</h2>

                        {!! clean($about_us->description) !!}
                    </div>

                    <div class="row about-mt-48px">
                        <div class="col-lg-6 col-md-6">
                            <div class="about-us-item">
                                <div class="icon">
                                </div>

                                <div class="text">
                                    <h3>{{$about_us->customer}}</h3>

                                    <p>{{$about_us->text_1}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="about-us-item about-us-item-resmt ">
                                <div class="icon">

                                </div>

                                <div class="text">
                                    <h3>{{$about_us->branch}}</h3>

                                    <p>{{$about_us->text_2}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- about part end  -->


   

     <!-- Customer part-start -->
        <section class="customer s-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="customer-head mb-48px">
                            <h2>{{$section->testonimal_titel}}</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($testimonials as $testimonial)
                        <div class=" col-xxl-4 col-xl-4 col-lg-6 col-md-6" >

                            <div class="customer-item">

                                <div class="customer-img">

                                </div>
                                <div class="customer-item-text">
                                    <p>{!! clean($testimonial->comment) !!}</p>
                                </div>
                            </div>

                            <div class="customer-inner">
                                <div class="customer-inner-img">
                                    <img src="{{asset($testimonial->image)}}" alt="img">
                                </div>

                                <div class="customer-inner-text">
                                    <div class="icon">

                                    </div>

                                    <h3>{{$testimonial->name}}</h3>
                                    <h5>{{$testimonial->designation}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    <!-- Customer part-end -->
    <!-- faq part-star -->
        {{-- <section class="faq s-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12" data-aos="fade-left">
                        <div class="faq-head">
                            <h2>{{$faqAbout->titel}}</h2>
                        </div>

                        <div class="faq-main">
                            <div class="accordion" id="accordionExample">
                                @foreach ($faqs as $index => $item)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $index + 1 }}">
                                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index + 1}}"
                                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index + 1 }}">
                                                {{ $item->question }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index + 1 }}" class="accordion-collapse {{ $index === 0 ? 'show' : 'collapse' }}"
                                            aria-labelledby="heading{{ $index + 1 }}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! clean($item->answer) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 ">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="faq-img  ">
                                    <img src="{{asset($faqAbout->image1)}}" class="w-100" alt="thumb">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="faq-img">
                                    <div class="faq-img-two">
                                        <img src="{{asset($faqAbout->image3)}}" alt="thumb">
                                        <div class="faq-img-overlay">
                                            <div class="faq-img-overlay-text">
                                                <h2>
                                                    <span>
                                                        <svg width="24" height="32" viewBox="0 0 24 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12 26.1844C10.3275 26.1844 8.9625 27.4919 8.9625 29.0922C8.9625 30.6926 10.3275 32 12 32C13.6725 32 15.0375 30.6926 15.0375 29.0922C15.0375 27.499 13.6725 26.1844 12 26.1844ZM3.0375 0C1.365 0 0 1.30743 0 2.90779C0 4.50815 1.365 5.81558 3.0375 5.81558C4.71 5.81558 6.075 4.50815 6.075 2.90779C6.075 1.30743 4.71 0 3.0375 0ZM3.0375 8.73052C1.365 8.73052 0 10.038 0 11.6383C0 13.2387 1.365 14.5461 3.0375 14.5461C4.71 14.5461 6.075 13.2387 6.075 11.6383C6.075 10.038 4.71 8.73052 3.0375 8.73052ZM3.0375 17.461C1.365 17.461 0 18.7685 0 20.3688C0 21.9692 1.365 23.2766 3.0375 23.2766C4.71 23.2766 6.075 21.9692 6.075 20.3688C6.075 18.7685 4.71 17.461 3.0375 17.461ZM20.9625 5.82273C22.635 5.82273 24 4.51529 24 2.91494C24 1.31458 22.635 0 20.9625 0C19.29 0 17.925 1.30743 17.925 2.90779C17.925 4.50815 19.29 5.82273 20.9625 5.82273ZM12 17.461C10.3275 17.461 8.9625 18.7685 8.9625 20.3688C8.9625 21.9692 10.3275 23.2766 12 23.2766C13.6725 23.2766 15.0375 21.9692 15.0375 20.3688C15.0375 18.7685 13.6725 17.461 12 17.461ZM20.9625 17.461C19.29 17.461 17.925 18.7685 17.925 20.3688C17.925 21.9692 19.29 23.2766 20.9625 23.2766C22.635 23.2766 24 21.9692 24 20.3688C24 18.7685 22.635 17.461 20.9625 17.461ZM20.9625 8.73052C19.29 8.73052 17.925 10.038 17.925 11.6383C17.925 13.2387 19.29 14.5461 20.9625 14.5461C22.635 14.5461 24 13.2387 24 11.6383C24 10.038 22.635 8.73052 20.9625 8.73052ZM12 8.73052C10.3275 8.73052 8.9625 10.038 8.9625 11.6383C8.9625 13.2387 10.3275 14.5461 12 14.5461C13.6725 14.5461 15.0375 13.2387 15.0375 11.6383C15.0375 10.038 13.6725 8.73052 12 8.73052ZM12 0C10.3275 0 8.9625 1.30743 8.9625 2.90779C8.9625 4.50815 10.3275 5.81558 12 5.81558C13.6725 5.81558 15.0375 4.50815 15.0375 2.90779C15.0375 1.30743 13.6725 0 12 0Z"
                                                                fill="white" />
                                                        </svg>
                                                    </span>
                                                    {{$faqAbout->first_description}}
                                                </h2>

                                                <h4>{{ __('translate.Success') }}
                                                    <br> {{ __('translate.Event') }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="faq-img img-mt">
                                    <div class="faq-img-two">
                                        <img src="{{asset($faqAbout->image4)}}" alt="thumb">
                                        <div class="faq-img-overlay faq-img-overlay-two ">
                                            <div class="faq-img-overlay-text">
                                                <h2>
                                                    <span>
                                                        <svg width="24" height="32" viewBox="0 0 24 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12 26.1844C10.3275 26.1844 8.9625 27.4919 8.9625 29.0922C8.9625 30.6926 10.3275 32 12 32C13.6725 32 15.0375 30.6926 15.0375 29.0922C15.0375 27.499 13.6725 26.1844 12 26.1844ZM3.0375 0C1.365 0 0 1.30743 0 2.90779C0 4.50815 1.365 5.81558 3.0375 5.81558C4.71 5.81558 6.075 4.50815 6.075 2.90779C6.075 1.30743 4.71 0 3.0375 0ZM3.0375 8.73052C1.365 8.73052 0 10.038 0 11.6383C0 13.2387 1.365 14.5461 3.0375 14.5461C4.71 14.5461 6.075 13.2387 6.075 11.6383C6.075 10.038 4.71 8.73052 3.0375 8.73052ZM3.0375 17.461C1.365 17.461 0 18.7685 0 20.3688C0 21.9692 1.365 23.2766 3.0375 23.2766C4.71 23.2766 6.075 21.9692 6.075 20.3688C6.075 18.7685 4.71 17.461 3.0375 17.461ZM20.9625 5.82273C22.635 5.82273 24 4.51529 24 2.91494C24 1.31458 22.635 0 20.9625 0C19.29 0 17.925 1.30743 17.925 2.90779C17.925 4.50815 19.29 5.82273 20.9625 5.82273ZM12 17.461C10.3275 17.461 8.9625 18.7685 8.9625 20.3688C8.9625 21.9692 10.3275 23.2766 12 23.2766C13.6725 23.2766 15.0375 21.9692 15.0375 20.3688C15.0375 18.7685 13.6725 17.461 12 17.461ZM20.9625 17.461C19.29 17.461 17.925 18.7685 17.925 20.3688C17.925 21.9692 19.29 23.2766 20.9625 23.2766C22.635 23.2766 24 21.9692 24 20.3688C24 18.7685 22.635 17.461 20.9625 17.461ZM20.9625 8.73052C19.29 8.73052 17.925 10.038 17.925 11.6383C17.925 13.2387 19.29 14.5461 20.9625 14.5461C22.635 14.5461 24 13.2387 24 11.6383C24 10.038 22.635 8.73052 20.9625 8.73052ZM12 8.73052C10.3275 8.73052 8.9625 10.038 8.9625 11.6383C8.9625 13.2387 10.3275 14.5461 12 14.5461C13.6725 14.5461 15.0375 13.2387 15.0375 11.6383C15.0375 10.038 13.6725 8.73052 12 8.73052ZM12 0C10.3275 0 8.9625 1.30743 8.9625 2.90779C8.9625 4.50815 10.3275 5.81558 12 5.81558C13.6725 5.81558 15.0375 4.50815 15.0375 2.90779C15.0375 1.30743 13.6725 0 12 0Z"
                                                                fill="white" />
                                                        </svg>
                                                    </span>
                                                    {{$faqAbout->secend_description}}
                                                </h2>

                                                <h4>{{ __('translate.Success') }}
                                                    <br> {{ __('translate.Event') }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="faq-img  ">

                                    <div class="img-animetion">
                                        <img src="{{asset($faqAbout->image2)}}" alt="thumb">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section> --}}
    <!-- faq part-end -->

    <!-- App part-start -->
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
    <!-- App part-end -->
    <div class="map-section" style="padding-bottom: 0!important">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <iframe
                            src="{{$contactus->google_map}}"
                            width="1320" height="350"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
