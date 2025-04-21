@extends('Frontend.Layouts.master')
@section('title')
    <title>{{ __('translate.Address') }}</title>
@endsection

@section('content')
<main>

    <!-- banner  -->
    <div class="inner-banner">
        <div class="container">
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="inner-banner-head">
                        <h1>{{ __('translate.Dashboard') }}</h1>
                    </div>

                    <div class="inner-banner-item">
                        <div class="left">
                            <span>{{ __('translate.User') }}</span>
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
                            <span>{{ __('translate.Address') }}</span>
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
                                <h4>{{ __('translate.Dashboard') }}</h4>
                                <p>{{ __('translate.Address') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-end">
                            <button type="button" class="main-btn-four" data-bs-toggle="modal" data-bs-target="#addNewAddress">
                                {{ __('translate.Add New Address') }}
                            </button>

                        </div>
                    </div>

                    <div class="row">
                        @foreach ($address as $index => $addres)
                            <div class="col-lg-6" data-aos="fade-left">
                                <div class="dashboard-address-item">
                                    <div class="shopping-cart-address-one">

                                        <div class="shopping-cart-address-one-item">
                                            <div class="text">
                                                <h4>{{ __('translate.Address') }} #{{++$index}}</h4>
                                            </div>
                                            <div class="delet-btn">
                                                <a href="{{route('user.address.edit',$addres->id)}}" class="delet-btn-two">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M22 12V18C22 20.2091 20.2091 22 18 22H6C3.79086 22 2 20.2091 2 18V6C2 3.79086 3.79086 2 6 2H12M15.6864 4.02275C15.6864 4.02275 15.6864 5.45305 17.1167 6.88334C18.547 8.31364 19.9773 8.31364 19.9773 8.31364M9.15467 15.9896L12.1583 15.5605C12.5916 15.4986 12.9931 15.2978 13.3025 14.9884L21.4076 6.88334C22.1975 6.09341 22.1975 4.81268 21.4076 4.02275L19.9773 2.59245C19.1873 1.80252 17.9066 1.80252 17.1167 2.59245L9.01164 10.6975C8.70217 11.0069 8.50142 11.4084 8.43952 11.8417L8.01044 14.8453C7.91508 15.5128 8.4872 16.0849 9.15467 15.9896Z"
                                                                stroke="#000929" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModal{{$addres->id}}">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5 8V18C5 20.2091 6.79086 22 9 22H15C17.2091 22 19 20.2091 19 18V8M14 11V17M10 11L10 17M16 5L14.5937 2.8906C14.2228 2.3342 13.5983 2 12.9296 2H11.0704C10.4017 2 9.7772 2.3342 9.40627 2.8906L8 5M16 5H8M16 5H21M8 5H3"
                                                                stroke="#F01543" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>


                                            </div>
                                        </div>


                                        <address>{{ __('translate.Name') }} :<b>{{html_decode($addres->name)}}</b>
                                            <br>{{ __('translate.Email') }} :
                                            <a href="mailto:{{html_decode($addres->email)}}"><b>{{html_decode($addres->email)}}</b></a>
                                            <br>{{ __('translate.Phone') }}
                                            <a href="tel:{{html_decode($addres->phone)}}"><b>{{html_decode($addres->phone)}}</b>
                                            </a>

                                            <br>{{ __('translate.Delivery Area') }} :
                                            <a href="javascript:;"><b>{{html_decode($addres->DeliveryArea->area_name)}}</b></a>
                                            <br>{{ __('translate.Address') }} :
                                            <a href="javascript:;"> <b>{{html_decode($addres->address)}}</b></a>
                                        </address>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>




                </div>
            </div>
        </div>
    </section>
    @foreach ($address as $index => $adrs)
    <div class="modal fade" id="exampleModal{{$adrs->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal-img-text">
                        <h3>{{ __('translate.Are you sure want to delete it?') }}</h3>
                    </div>

                    <div class="modal-btn">
                        <button type="button" class="no-btn" data-bs-dismiss="modal">{{ __('translate.No') }}
                        </button>
                        <a href="{{route('remove.address',$addres->id)}}">
                            <button type="button" class="no-btn yes-btn">{{ __('translate.Yes, Delete') }} </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- dashboard end  -->

     <!-- Modal -->
     <div class="modal fade" id="addNewAddress" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-five ">
         <div class="modal-content">
             <div class="modal-body modal-body-five ">
                 <form action="{{route('add.new.address')}}" method="POST">
                     @csrf
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="shopping-cart-new-address-top-item">
                                 <div class="shopping-cart-new-address-taitel">
                                     <h4>{{ __('translate.Add New Address') }}</h4>
                                 </div>

                                 <div class="shopping-cart-new-address-top-btn">
                                     <a href="{{route('user.address')}}">
                                         <span>
                                             <svg width="24" height="24" viewBox="0 0 24 24"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <path
                                                     d="M5 8H15C17.2091 8 19 9.79086 19 12V12C19 14.2091 17.2091 16 15 16H5M5 8L9 5M5 8L9 11"
                                                     stroke="#394150" stroke-width="1.5"
                                                     stroke-linecap="round"
                                                     stroke-linejoin="round" />
                                             </svg>
                                         </span>

                                         {{ __('translate.Back') }}
                                     </a>
                                 </div>
                             </div>
                             <div class="shopping-cart-new-address-from">
                                <div class="shopping-cart-new-address-from-item">
                                    <div class="shopping-cart-new-address-from-inner">
                                        <label class="form-label">{{ __('translate.Delivery Area') }}</label>
                                        <select class="form-select" name="area_id" id="country" aria-label="Default select example">
                                            <option value="" aria-readonly="true">{{ __('translate.Select Delivery Area') }}</option>
                                            @foreach ($DeleveryAreas as $area)
                                                <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 <div class="shopping-cart-new-address-from-item">
                                     <div class="shopping-cart-new-address-from-inner">
                                         <label class="form-label">{{ __('translate.First Name') }}</label>
                                         <input type="text" class="form-control"
                                             id="exampleFormControlInput7" name="fname" value="{{old('fname')}}" >
                                     </div>
                                     <div class="shopping-cart-new-address-from-inner">
                                         <label for="exampleFormControlInput1"
                                             class="form-label">{{ __('translate.Last Name') }}</label>
                                         <input type="text" class="form-control"
                                             id="exampleFormControlInput8"  name="lname" value="{{old('lname')}}" >
                                     </div>
                                 </div>
                                 <div class="shopping-cart-new-address-from-item">
                                     <div class="shopping-cart-new-address-from-inner">
                                         <label for="exampleFormControlInput1"
                                             class="form-label">{{ __('translate.Phone') }}</label>
                                         <input type="text" class="form-control"
                                             id="exampleFormControlInput9"  name="phone" value="{{old('phone')}}" >
                                     </div>
                                     <div class="shopping-cart-new-address-from-inner">
                                         <label for="exampleFormControlInput1"
                                             class="form-label">{{ __('translate.Email') }}</label>
                                         <input type="email" class="form-control"
                                             id="exampleFormControlInput10" name="email" value="{{old('email')}}" >
                                     </div>
                                 </div>

                                 <div class="shopping-cart-new-address-from-item">
                                     <div class="shopping-cart-new-address-from-inner">
                                         <label for="exampleFormControlInput1"
                                             class="form-label">{{ __('translate.Address') }}</label>
                                             <textarea name="address" class="form-control" id="address" cols="30" rows="10">{{old('address')}}</textarea>
                                     </div>
                                 </div>
                                 <div class="shopping-cart-new-address-from-btn">
                                     <div class="check-btn">
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio"
                                                 id="flexCheckDefault" name="address_type" value="home">
                                             <label class="form-check-label" for="flexCheckDefault">
                                                 {{ __('translate.Home') }}
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="radio"
                                                 id="flexCheckDefault1" value="office" name="address_type">
                                             <label class="form-check-label" for="flexCheckDefault1">
                                                 {{ __('translate.Office') }}
                                             </label>
                                         </div>
                                     </div>

                                     <div class="check-btn-two">
                                         <button type="submit" class="main-btn-four">{{ __('translate.Save Now') }}</button>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

    <!-- Restaurant part-start -->
    @include('Frontend.User.app')
    <!-- Restaurant part-end -->



</main>
<script>
    "use strict"
   $(document).ready(function() {
    $("#country").change(function() {
        var countryId = $(this).val();
        $("#state").empty().append("<option value=''>{{ __('translate.Select State') }}</option>");
        $("#city").empty().append("<option value=''>{{ __('translate.Select City') }}</option>");
        if (countryId) {
            $.ajax({
                type: "GET",
                url: '{{ url("get-states") }}' + '?country_id=' + countryId,
                success: function(res) {
                    if (res) {
                        $("#state").empty().append("<option value=''>{{ __('translate.Select State') }}</option>");
                        $.each(res, function(key, value) {
                            $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    } else {
                        $("#state").empty();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", status, error);
                }
            });
        } else {
            $("#state").empty().append("<option value=''>{{ __('translate.Select State') }}</option>");
            $("#city").empty().append("<option value=''>{{ __('translate.Select City') }}</option>");
        }
    });

    $("#state").change(function() {
        var stateId = $(this).val();
        if (stateId) {
            $.ajax({
                type: "GET",
                url: '{{ url("get-cities") }}' + '?state_id=' + stateId,
                success: function(res) {
                    if (res) {
                        $("#city").empty().append("<option value=''>{{ __('translate.Select City') }}</option>");
                        $.each(res, function(key, value) {
                            $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    } else {
                        $("#city").empty();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", status, error);
                }
            });
        } else {
            $("#city").empty();
        }
    });
});

</script>
@endsection
