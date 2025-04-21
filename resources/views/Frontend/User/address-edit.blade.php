@extends('Frontend.Layouts.master')
@section('title')
    <title>{{ __('translate.Edit Address') }}</title>
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
                            <span> {{ __('translate.Address') }}</span>
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
                                <p>{{ __('translate.Edit Address') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-end">
                            <a href="{{route('user.address')}}" class="main-btn-four" >
                                {{ __('translate.Back') }}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('user.address.upadate',$address->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="shopping-cart-new-address-from">
                                    <div class="shopping-cart-new-address-from-item">
                                        <div class="shopping-cart-new-address-from-inner">
                                            <label class="form-label">{{ __('translate.Delivery Area') }}</label>
                                            <select class="form-select" name="area_id" id="country" aria-label="Default select example">
                                                <option value="" aria-readonly="true">{{ __('translate.Select Delivery Area') }}</option>
                                                @foreach ($DeleveryAreas as $area)
                                                    <option value="{{ $area->id }}" @if ($area->id == $address->area_id) selected @endif>{{ $area->area_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="shopping-cart-new-address-from-item">
                                        <div class="shopping-cart-new-address-from-inner">
                                            <label class="form-label"> {{ __('translate.Name') }}</label>
                                            <input type="text" name="name" value="{{html_decode($address->name)}}" class="form-control" id="exampleFormControlInput11">
                                        </div>
                                    </div>
                                    <div class="shopping-cart-new-address-from-item">
                                        <div class="shopping-cart-new-address-from-inner">
                                            <label class="form-label"> {{ __('translate.Email') }}</label>
                                            <input type="email" name="email" value="{{html_decode($address->email)}}" class="form-control" id="exampleFormControlInput8">
                                        </div>
                                        <div class="shopping-cart-new-address-from-inner">
                                            <label class="form-label"> {{ __('translate.Phone') }}</label>
                                            <input type="text" name="phone" value="{{html_decode($address->phone)}}" class="form-control" id="exampleFormControlInput12">
                                        </div>
                                    </div>

                                    <div class="shopping-cart-new-address-from-item">

                                        <div class="shopping-cart-new-address-from-inner">
                                            <label for="exampleFormControlInput1" class="form-label"> {{ __('translate.Address') }}</label>
                                            <input type="text" name="address" value="{{ html_decode($address->address) }}" class="form-control" id="exampleFormControlInput13">
                                        </div>
                                    </div>


                                    <div class="shopping-cart-new-address-from-btn">
                                        <div class="check-btn">
                                            <div class="form-check">
                                                <input {{ $address->address_type == 'home' ? 'checked' : '' }} class="form-check-input" type="radio"
                                                    id="flexCheckDefault" name="address_type" value="home">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ __('translate.Home') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input {{ $address->address_type == 'office' ? 'checked' : '' }}  class="form-check-input" type="radio"
                                                    id="flexCheckDefault1" value="office" name="address_type">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    {{ __('translate.Office') }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="check-btn-two">
                                            <button type="submit"  class="main-btn-four"> {{ __('translate.Update') }} </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                            $("#state").empty().append("<option value=''>{{ __('translate.Select State') }}</option>");

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
