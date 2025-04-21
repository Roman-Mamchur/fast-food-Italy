@extends('Frontend.Layouts.master')
@section('title')
    <title>{{ $product->name }}</title>
@endsection

@section('meta')
    <meta name="title" content="{{$product->seo_titel}}">
    <meta name="description" content="{{$product->seo_description}}">
    <meta name="keywords" content="{{$product->seo_description}}">
@endsection

@section('content')
<main>
    <!-- banner  -->
    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1>{{ __('translate.Menu Details') }}</h1>
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
                            <span>{{ __('translate.Menu Details') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner  -->

    <!-- Food Details part-start   -->
    <section class="food-details-section s-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="food-details-head">
                        <h2>{{$product->name}}</h2>
                    </div>

                    <div class="food-details-slick">
                        <div class="slider-for">
                            @foreach($galleries as $index => $gallery)
                                <div class="slider-for-img">
                                    <img src="{{asset($gallery['image'])}}" alt="img">
                                </div>
                            @endforeach


                        </div>

                        <div class="slider-nav">
                            @foreach($galleries as $index => $glry)
                                <div class="slider-nav-img">
                                    <img src="{{asset($glry['image'])}}" alt="">
                                    <div class="overlay"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="food-details-item-box">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">{{ __('translate.Menu Details') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">{{ __('translate.Video') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">{{ __('translate.Review') }}</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="food-details-text all-details-root">
                                            {!! clean($product->long_description) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">

                                <div class="food-video-text">
                                    {!! clean($product->vedio_top_ber_description) !!}
                                </div>

                                <div class="vedio-img">
                                    <img src="{{asset($product['vedio_tumb_image'])}}" alt="img">

                                    <a class="my-video-links" data-autoplay="true" data-vbtype="video"
                                        href="{{$product->vedio_url}}"><i class="fa-solid fa-play"></i></a>
                                </div>

                                <div class="food-video-text-btm">
                                    {!! clean($product->vedio_buttom_description) !!}

                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">


                                <div class="food-review">
                                    @foreach ($reviews as $review)
                                    <div class="food-review-item">
                                        <div class="food-review-item-top">
                                            <div class="icon">
                                                @if($review->rating == 1)
                                                <span>
                                                    <svg width="144" height="20" viewBox="0 0 144 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0311 0C9.60363 0 9.17613 0.2305 8.95488 0.695408L6.50617 5.86799L1.0275 6.69623C0.0450172 6.84469 -0.348727 8.10658 0.363762 8.82933L4.32745 12.8533L3.38997 18.5377C3.22122 19.5574 4.25245 20.3348 5.12994 19.8543L10.0311 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M9.96888 0C10.3964 0 10.8239 0.2305 11.0451 0.695408L13.4938 5.86799L18.9725 6.69623C19.955 6.84469 20.3487 8.10658 19.6362 8.82933L15.6725 12.8533L16.61 18.5377C16.7788 19.5574 15.7475 20.3348 14.8701 19.8543L9.96888 17.1742V0Z"
                                                            fill="#FFC403" />
                                                    </svg>
                                                </span>
                                                @endif
                                                @if($review->rating == 2)
                                                <span>
                                                    <svg width="144" height="20" viewBox="0 0 144 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0311 0C9.60363 0 9.17613 0.2305 8.95488 0.695408L6.50617 5.86799L1.0275 6.69623C0.0450172 6.84469 -0.348727 8.10658 0.363762 8.82933L4.32745 12.8533L3.38997 18.5377C3.22122 19.5574 4.25245 20.3348 5.12994 19.8543L10.0311 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M9.96888 0C10.3964 0 10.8239 0.2305 11.0451 0.695408L13.4938 5.86799L18.9725 6.69623C19.955 6.84469 20.3487 8.10658 19.6362 8.82933L15.6725 12.8533L16.61 18.5377C16.7788 19.5574 15.7475 20.3348 14.8701 19.8543L9.96888 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M40.9452 0C40.5177 0 40.0902 0.2305 39.8689 0.695408L37.4202 5.86799L31.9416 6.69623C30.9591 6.84469 30.5653 8.10658 31.2778 8.82933L35.2415 12.8533L34.304 18.5377C34.1353 19.5574 35.1665 20.3348 36.044 19.8543L40.9452 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M40.8829 0C41.3104 0 41.7379 0.2305 41.9592 0.695408L44.4079 5.86799L49.8866 6.69623C50.869 6.84469 51.2628 8.10658 50.5503 8.82933L46.5866 12.8533L47.5241 18.5377C47.6928 19.5574 46.6616 20.3348 45.7841 19.8543L40.8829 17.1742V0Z"
                                                            fill="#FFC403" />
                                                    </svg>
                                                </span>
                                                @endif
                                                @if($review->rating == 3)
                                                <span>
                                                    <svg width="144" height="20" viewBox="0 0 144 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0311 0C9.60363 0 9.17613 0.2305 8.95488 0.695408L6.50617 5.86799L1.0275 6.69623C0.0450172 6.84469 -0.348727 8.10658 0.363762 8.82933L4.32745 12.8533L3.38997 18.5377C3.22122 19.5574 4.25245 20.3348 5.12994 19.8543L10.0311 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M9.96888 0C10.3964 0 10.8239 0.2305 11.0451 0.695408L13.4938 5.86799L18.9725 6.69623C19.955 6.84469 20.3487 8.10658 19.6362 8.82933L15.6725 12.8533L16.61 18.5377C16.7788 19.5574 15.7475 20.3348 14.8701 19.8543L9.96888 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M40.9452 0C40.5177 0 40.0902 0.2305 39.8689 0.695408L37.4202 5.86799L31.9416 6.69623C30.9591 6.84469 30.5653 8.10658 31.2778 8.82933L35.2415 12.8533L34.304 18.5377C34.1353 19.5574 35.1665 20.3348 36.044 19.8543L40.9452 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M40.8829 0C41.3104 0 41.7379 0.2305 41.9592 0.695408L44.4079 5.86799L49.8866 6.69623C50.869 6.84469 51.2628 8.10658 50.5503 8.82933L46.5866 12.8533L47.5241 18.5377C47.6928 19.5574 46.6616 20.3348 45.7841 19.8543L40.8829 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M71.8514 0C71.4239 0 70.9964 0.2305 70.7752 0.695408L68.3265 5.86799L62.8478 6.69623C61.8653 6.84469 61.4716 8.10658 62.1841 8.82933L66.1478 12.8533L65.2103 18.5377C65.0415 19.5574 66.0728 20.3348 66.9503 19.8543L71.8514 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M71.7892 0C72.2167 0 72.6442 0.2305 72.8654 0.695408L75.3141 5.86799L80.7928 6.69623C81.7753 6.84469 82.169 8.10658 81.4566 8.82933L77.4929 12.8533L78.4303 18.5377C78.5991 19.5574 77.5679 20.3348 76.6904 19.8543L71.7892 17.1742V0Z"
                                                            fill="#FFC403" />
                                                    </svg>
                                                </span>
                                                @endif
                                                @if($review->rating == 4)
                                                <span>
                                                    <svg width="144" height="20" viewBox="0 0 144 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0311 0C9.60363 0 9.17613 0.2305 8.95488 0.695408L6.50617 5.86799L1.0275 6.69623C0.0450172 6.84469 -0.348727 8.10658 0.363762 8.82933L4.32745 12.8533L3.38997 18.5377C3.22122 19.5574 4.25245 20.3348 5.12994 19.8543L10.0311 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M9.96888 0C10.3964 0 10.8239 0.2305 11.0451 0.695408L13.4938 5.86799L18.9725 6.69623C19.955 6.84469 20.3487 8.10658 19.6362 8.82933L15.6725 12.8533L16.61 18.5377C16.7788 19.5574 15.7475 20.3348 14.8701 19.8543L9.96888 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M40.9452 0C40.5177 0 40.0902 0.2305 39.8689 0.695408L37.4202 5.86799L31.9416 6.69623C30.9591 6.84469 30.5653 8.10658 31.2778 8.82933L35.2415 12.8533L34.304 18.5377C34.1353 19.5574 35.1665 20.3348 36.044 19.8543L40.9452 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M40.8829 0C41.3104 0 41.7379 0.2305 41.9592 0.695408L44.4079 5.86799L49.8866 6.69623C50.869 6.84469 51.2628 8.10658 50.5503 8.82933L46.5866 12.8533L47.5241 18.5377C47.6928 19.5574 46.6616 20.3348 45.7841 19.8543L40.8829 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M71.8514 0C71.4239 0 70.9964 0.2305 70.7752 0.695408L68.3265 5.86799L62.8478 6.69623C61.8653 6.84469 61.4716 8.10658 62.1841 8.82933L66.1478 12.8533L65.2103 18.5377C65.0415 19.5574 66.0728 20.3348 66.9503 19.8543L71.8514 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M71.7892 0C72.2167 0 72.6442 0.2305 72.8654 0.695408L75.3141 5.86799L80.7928 6.69623C81.7753 6.84469 82.169 8.10658 81.4566 8.82933L77.4929 12.8533L78.4303 18.5377C78.5991 19.5574 77.5679 20.3348 76.6904 19.8543L71.7892 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M102.758 0C102.33 0 101.903 0.2305 101.681 0.695408L99.2327 5.86799L93.7541 6.69623C92.7716 6.84469 92.3778 8.10658 93.0903 8.82933L97.054 12.8533L96.1165 18.5377C95.9478 19.5574 96.979 20.3348 97.8565 19.8543L102.758 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M102.695 0C103.123 0 103.55 0.2305 103.772 0.695408L106.22 5.86799L111.699 6.69623C112.682 6.84469 113.075 8.10658 112.363 8.82933L108.399 12.8533L109.337 18.5377C109.505 19.5574 108.474 20.3348 107.597 19.8543L102.695 17.1742V0Z"
                                                            fill="#FFC403" />
                                                    </svg>
                                                </span>
                                                @endif
                                                @if($review->rating == 5)
                                                <span>
                                                    <svg width="144" height="20" viewBox="0 0 144 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0311 0C9.60363 0 9.17613 0.2305 8.95488 0.695408L6.50617 5.86799L1.0275 6.69623C0.0450172 6.84469 -0.348727 8.10658 0.363762 8.82933L4.32745 12.8533L3.38997 18.5377C3.22122 19.5574 4.25245 20.3348 5.12994 19.8543L10.0311 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M9.96888 0C10.3964 0 10.8239 0.2305 11.0451 0.695408L13.4938 5.86799L18.9725 6.69623C19.955 6.84469 20.3487 8.10658 19.6362 8.82933L15.6725 12.8533L16.61 18.5377C16.7788 19.5574 15.7475 20.3348 14.8701 19.8543L9.96888 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M40.9452 0C40.5177 0 40.0902 0.2305 39.8689 0.695408L37.4202 5.86799L31.9416 6.69623C30.9591 6.84469 30.5653 8.10658 31.2778 8.82933L35.2415 12.8533L34.304 18.5377C34.1353 19.5574 35.1665 20.3348 36.044 19.8543L40.9452 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M40.8829 0C41.3104 0 41.7379 0.2305 41.9592 0.695408L44.4079 5.86799L49.8866 6.69623C50.869 6.84469 51.2628 8.10658 50.5503 8.82933L46.5866 12.8533L47.5241 18.5377C47.6928 19.5574 46.6616 20.3348 45.7841 19.8543L40.8829 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M71.8514 0C71.4239 0 70.9964 0.2305 70.7752 0.695408L68.3265 5.86799L62.8478 6.69623C61.8653 6.84469 61.4716 8.10658 62.1841 8.82933L66.1478 12.8533L65.2103 18.5377C65.0415 19.5574 66.0728 20.3348 66.9503 19.8543L71.8514 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M71.7892 0C72.2167 0 72.6442 0.2305 72.8654 0.695408L75.3141 5.86799L80.7928 6.69623C81.7753 6.84469 82.169 8.10658 81.4566 8.82933L77.4929 12.8533L78.4303 18.5377C78.5991 19.5574 77.5679 20.3348 76.6904 19.8543L71.7892 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M102.758 0C102.33 0 101.903 0.2305 101.681 0.695408L99.2327 5.86799L93.7541 6.69623C92.7716 6.84469 92.3778 8.10658 93.0903 8.82933L97.054 12.8533L96.1165 18.5377C95.9478 19.5574 96.979 20.3348 97.8565 19.8543L102.758 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M102.695 0C103.123 0 103.55 0.2305 103.772 0.695408L106.22 5.86799L111.699 6.69623C112.682 6.84469 113.075 8.10658 112.363 8.82933L108.399 12.8533L109.337 18.5377C109.505 19.5574 108.474 20.3348 107.597 19.8543L102.695 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M133.672 0C133.244 0 132.817 0.2305 132.596 0.695408L130.147 5.86799L124.668 6.69623C123.686 6.84469 123.292 8.10658 124.004 8.82933L127.968 12.8533L127.031 18.5377C126.862 19.5574 127.893 20.3348 128.771 19.8543L133.672 17.1742V0Z"
                                                            fill="#FFC403" />
                                                        <path
                                                            d="M133.61 0C134.037 0 134.464 0.2305 134.686 0.695408L137.134 5.86799L142.613 6.69623C143.596 6.84469 143.989 8.10658 143.277 8.82933L139.313 12.8533L140.251 18.5377C140.419 19.5574 139.388 20.3348 138.511 19.8543L133.61 17.1742V0Z"
                                                            fill="#FFC403" />
                                                    </svg>
                                                </span>
                                                @endif

                                            </div>
                                            @php
                                                $user = App\Models\User::where('id',$review->user_id)->first();
                                                $dateString = $review->created_at;
                                                $postDate = new DateTime($dateString);
                                                $currentDate = new DateTime();
                                                $interval = $currentDate->diff($postDate);
                                                $daysAgo = $interval->days;
                                            @endphp
                                            <div class="text">
                                                <a href="#">{{$daysAgo .' days ago'}}</a>
                                            </div>
                                        </div>

                                        <div class="food-review-item-text">
                                            <p>“{{html_decode($review->review)}}”</p>
                                        </div>

                                        <div class="food-review-inner">

                                            <div class="food-review-inner-img">
                                                @if($user->image)
                                                <img  src="{{asset($user->image)}}" alt="img">
                                                @else
                                                    <img  src="{{asset($setting->empty_cart)}}" alt="img">
                                                @endif
                                            </div>

                                            <div class="food-review-inner-text">

                                                <h4>{{html_decode($user->name)}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach
                                </div>
                                <div class="sent-review">
                                    <div class="comment-from-box-main">
                                        <div class="comment-from-box-text">
                                            <h3>{{ __('translate.Submit a review') }}</h3>

                                            <p>{{ __('translate.Required fields are marked') }} *</p>
                                        </div>
                                        <form action="{{route('product.review')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="from-box">
                                                <div class="from-item">
                                                    <div id="full-stars-example-two">
                                                        <div class="rating-group">
                                                            <input disabled checked class="rating__input rating__input--none" name="rating" id="rating3-none" value="1" type="radio">
                                                            <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>

                                                            <input class="rating__input" name="rating" id="rating3-1" value="2" type="radio">
                                                            <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>

                                                            <input class="rating__input" name="rating" id="rating3-2" value="3" type="radio">
                                                            <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                            <input class="rating__input" name="rating" id="rating3-3" value="4" type="radio">
                                                            <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                            <input class="rating__input" name="rating3" id="rating3-4" value="5" type="radio">
                                                            <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                            <input class="rating__input" name="rating" id="rating3-5" value="5" type="radio">
                                                        </div>
                                                    </div>

                                                    <div class="from-inner-two  pb-4">
                                                        <textarea class="form-control" name="review" id="reviewText"
                                                            rows="5" placeholder="{{ __('translate.Write Review') }} *" required></textarea>
                                                    </div>

                                                     @if($googleRecaptcha->status==1)
                                                            <div class="form-group homec-form-input">
                                                                <div class="g-recaptcha" data-sitekey="{{ $googleRecaptcha->site_key }}"></div>
                                                            </div>
                                                    @endif

                                                    <div class="from-btn">
                                                        <button type="submit" class="main-btn-four">{{ __('translate.Submit Now') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <form action="{{route('cart.add.detils')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <div class="together-box">
                            <div class="together-box-text">
                                <h5>{{ __('translate.Select Size') }}</h5>
                            </div>
                            @foreach(json_decode($product->size, true) as $size => $price)
                            <div class="together-box-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="size" value="{{ $size }},{{ $price }}" id="size_{{ $loop->index }}" data-info="{{ $size }},{{ $price }}">
                                    <label class="form-check-label" for="size_{{ $loop->index }}">
                                        {{ $size }}
                                    </label>
                                </div>
                                <div class="form-check-btn">
                                    <div class="grid">
                                        {{$setting->currency_icon}}{{ $price }}
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            <div class="together-box-text">
                                <h5>{{ __('translate.Select Addon (Optional)') }}</h5>
                            </div>
                            @foreach(json_decode($product->items, true) as $id)
                            @php
                            $addons = App\Models\OptionalItem::where('id', $id)->get();
                            @endphp
                            @foreach ($addons as $addon)
                            <div class="together-box-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="addons[]" value="{{ $addon->id }}" id="addon_{{ $loop->parent->index }}_{{ $loop->index }}">
                                    <label class="form-check-label" for="addon_{{ $loop->parent->index }}_{{ $loop->index }}">
                                        {{ $addon->name }} ({{$setting->currency_icon}}{{ $addon->price }})
                                    </label>
                                </div>
                                <div class="form-check-btn">
                                    <div class="form-check-btn">

                                        <div class="grid">
                                            <button class="btn btn-minus" data-addon-index="{{ $loop->parent->index }}_{{ $loop->index }}"><i class="fa-solid fa-minus"></i></button>
                                            <div class="column product-qty" id="quantityUpdate_{{ $loop->parent->index }}_{{ $loop->index }}">0</div>
                                            <input type="hidden" name="addons_qty[]" id="qtyInput_{{ $loop->parent->index }}_{{ $loop->index }}" value="1">
                                            <button class="btn btn-plus" data-addon-index="{{ $loop->parent->index }}_{{ $loop->index }}"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                            @endforeach
                            <div class="together-box-inner-btn">
                                <div class="grid">
                                    <button class="btn btn-minus" id="btn-minus"><i class="fa-solid fa-minus"></i></button>
                                    <input class="column product-qty" type="text" name="qty" id="qtyInput" value="1">
                                    <button class="btn btn-plus" id="btn-plus"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="together-box-inner-btn-btm">
                                <button type="submit" class="main-btn-six" tabindex="-1">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 4H18C20.2091 4 22 5.79086 22 8V13C22 15.2091 20.2091 17 18 17H10C7.79086 17 6 15.2091 6 13V4ZM6 4C6 2.89543 5.10457 2 4 2H2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M11 20.5C11 21.3284 10.3284 22 9.5 22C8.67157 22 8 21.3284 8 20.5C8 19.6716 8.67157 19 9.5 19C10.3284 19 11 19.6716 11 20.5Z" stroke-width="1.5"></path>
                                            <path d="M20 20.5C20 21.3284 19.3284 22 18.5 22C17.6716 22 17 21.3284 17 20.5C17 19.6716 17.6716 19 18.5 19C19.3284 19 20 19.6716 20 20.5Z" stroke-width="1.5"></path>
                                            <path d="M14 8L14 13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M16.5 10.5L11.5 10.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    {{ __('translate.Add to Cart') }}
                                </button>

                            </div>
                        </div>
                    </form>
                    <div class="blog-details-promobanner-res-df">
                        @foreach ($promotions as $promotion)
                            <div class="blog-details-promobanner">
                                <a href="{{ $promotion->link }}"> <img src="{{asset($promotion['image'])}}" class="w-100"
                                        alt="img"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

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
</main>

<script>
    "use strict"
    $(document).ready(function () {
        $(".btn-minus, .btn-plus").on("click", function (e) {
            e.preventDefault();
            var addonIndex = $(this).data("addon-index");
            var currentQuantity = parseInt($("#quantityUpdate_" + addonIndex).text());
            if ($(this).hasClass("btn-minus")) {
                currentQuantity = Math.max(currentQuantity - 1, 0);
            } else if ($(this).hasClass("btn-plus")) {
                currentQuantity++;
            }
            $("#quantityUpdate_" + addonIndex).text(currentQuantity);
            $("#qtyInput_" + addonIndex).val(currentQuantity);
        });
    });
</script>
<script>
    "use strict"
    $(document).ready(function () {
        $("#btn-minus").on("click", function (e) {
            e.preventDefault();
            var currentQuantity = parseInt($("#qtyInput").val());
            currentQuantity = Math.max(currentQuantity - 1, 1);
            $("#qtyInput").val(currentQuantity);
        });

        $("#btn-plus").on("click", function (e) {
            e.preventDefault();
            var currentQuantity = parseInt($("#qtyInput").val());
            currentQuantity++;
            $("#qtyInput").val(currentQuantity);
        });
    });
</script>



@endsection
