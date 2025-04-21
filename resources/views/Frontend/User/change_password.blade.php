@extends('Frontend.Layouts.master')
@section('title')
    <title>{{ __('translate.Change Password') }}</title>
@endsection

@section('content')
<style>
    .passwordIcon {
        position: absolute;
        left: 89%;
        margin-top: 46px;
        z-index: 8;
    }
    @media (max-width: 676px){
        .passwordIcon {
            left: 86%;
        }
    }
</style>
    <main>

        <!-- banner  -->
        <div class="inner-banner">
            <div class="container">
                <div class="row  ">
                    <div class="col-lg-12">
                        <div class="inner-banner-head">
                            <h1> {{ __('translate.Change Password') }}</h1>
                        </div>

                        <div class="inner-banner-item">
                            <div class="left">
                                <span>{{ __('translate.Dashboard') }}</span>
                            </div>
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 7L14 12L10 17" stroke="#E5E6EB" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="left">
                                <span>{{ __('translate.Change Password') }}</span>
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
                        <div class="dashboard-item-taitel">
                            <h4>{{ __('translate.Dashboard') }}</h4>
                            <p>{{ __('translate.Change Password') }}</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="dashboard-edit-profile-from">
                                <form action="{{ route('user.update.password') }}" method="POST">
                                    @csrf
                                    <div class="shopping-cart-new-address-from">
                                        <div class="shopping-cart-new-address-from-item">
                                            <div class="shopping-cart-new-address-from-inner">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('translate.Current Password') }}</label>
                                                    <div class="icon passwordIcon" data-toggle="password5" data-target="passwordField5">
                                                        <span class="toggle-password-icon ">
                                                            <i class="fa-solid fa-eye-slash"></i>
                                                        </span>
                                                    </div>
                                                <input type="password" class="form-control" id="exampleFormControl6"
                                                    name="old_password">
                                                    <p id="loginPasswordError" style="display: block;width: 100%;" class="text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="shopping-cart-new-address-from-item">
                                            <div class="shopping-cart-new-address-from-inner">
                                                <label class="form-label"> {{ __('translate.New Password') }}</label>
                                                <div class="icon passwordIcon" data-toggle="password6" data-target="passwordField6">
                                                    <span class="toggle-password-icon login-ic">
                                                        <i class="fa-solid fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="password"
                                                    id="exampleFormControl">
                                            </div>
                                        </div>



                                        <div class="change-passowerd-btn  ">
                                            <button type="submit" class="main-btn-four">
                                                {{ __('translate.Save Now') }}</button>
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
        const togglePasswordElements33 = document.querySelectorAll('[data-toggle="password5"]');
        togglePasswordElements33.forEach(function(element) {
            const exampleFormControlInput06 = document.getElementById('exampleFormControl6');
            const passwordIcon5 = element.querySelector('.toggle-password-icon i');

            element.addEventListener('click', function() {
                if (exampleFormControlInput06.type === 'password') {
                    exampleFormControlInput06.type = 'text';
                    passwordIcon5.classList.remove('fa-eye-slash');
                    passwordIcon5.classList.add('fa-eye');
                } else {
                    exampleFormControlInput06.type = 'password';
                    passwordIcon5.classList.remove('fa-eye');
                    passwordIcon5.classList.add('fa-eye-slash');
                }
            });
        });
        const togglePasswordElements13 = document.querySelectorAll('[data-toggle="password6"]');
        togglePasswordElements13.forEach(function(element12) {
            const exampleFormControlInput08 = document.getElementById('exampleFormControl');
            const passwordIcon6 = element12.querySelector('.toggle-password-icon i');

            element12.addEventListener('click', function() {
                if (exampleFormControlInput08.type === 'password') {
                    exampleFormControlInput08.type = 'text';
                    passwordIcon6.classList.remove('fa-eye-slash');
                    passwordIcon6.classList.add('fa-eye');
                } else {
                    exampleFormControlInput08.type = 'password';
                    passwordIcon6.classList.remove('fa-eye');
                    passwordIcon6.classList.add('fa-eye-slash');
                }
            });
        });
    </script>
@endsection
