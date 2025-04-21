@php
   $setting =  App\Models\Setting::first();
   $section =  App\Models\SectionTitel::first();

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    @yield('meta')

    <!-- Fav Icon -->
	<link rel="icon" href="{{asset($setting->favicon)}}">

    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{asset('cdn/toastr.min.css')}}"/>
    <style>
        .toggle-password-icon {
            top: -5px;
        }
    </style>
</head>

<body>

    <div class="sign-up-top">
        <div class="sign-up-main-two">
            <div class="sign-up-main-two-item">
                <div class="sign-up-img">
                    <img src="{{asset($setting->frondend_login_page) }}" alt="img">
                    <div class="sign-up-main-two-item-text">
                        {{-- <p>{{ __('translate.You agree to ReservQ') }} <a href="{{ route('trems.of.service') }}">{{ __('translate.Terms of Use') }}</a> & <a href="{{ route('privacy.policy') }}">{{ __('translate.Privacy Policy') }}</a>. {{ __('translate.You do not need to consent as a condition of food, or buying any other goods or services. Message data rates may apply.') }}</p> --}}

                    </div>
                </div>
            </div>
        </div>

        <div class="sign-up-main">
            <div class="sign-up-logo">
                <a href="{{route('index')}}">
                    <img src="{{asset($setting->logo)}}" height="100" alt="logo">
                </a>
            </div>
            @yield('user-layout')

        </div>
    </div>

    <script>
        "use strict"
        const togglePasswordElements = document.querySelectorAll('[data-toggle="password"]');

        togglePasswordElements.forEach(function (element) {
            const passwordInputId = element.getAttribute('data-target');
            const passwordInput = document.getElementById(passwordInputId);
            const passwordIcon = element.querySelector('.toggle-password-icon i');

            element.addEventListener('click', function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passwordIcon.classList.remove('fa-eye-slash');
                    passwordIcon.classList.add('fa-eye');
                } else {
                    passwordInput.type = 'password';
                    passwordIcon.classList.remove('fa-eye');
                    passwordIcon.classList.add('fa-eye-slash');
                }
            });
        });
    </script>

    <script src="{{asset('cdn/jquery-3.7.1.min.js') }}"></script>
    <script src="{{asset('frontend/assets/js/venobox.min.js') }}"></script>
    <script src="{{asset('frontend/assets/js/aos.js') }}"></script>
    <script src="{{asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{asset('frontend/assets/js//jquery.shuffle.min.js') }}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('frontend/assets/js/custom.js') }}"></script>
    <script src="{{asset('cdn/toster.main.js')}}"></script>

    <style>
        .btn-success {
            color: #fff;
            margin-left: 20px;
            background-color: #198754;
            border-color: #198754;
        }
    </style>

    @if(Session::has('message'))
            <script>
                toastr.options = {
                    "progressBar" : true,
                    "closeButton" : true,
                    }
                    var type="{{Session::get('alert-type','info')}}"
                    switch(type){
                        case 'info':
                            toastr.info("{{ Session::get('message') }}");
                            break;
                        case 'success':
                            toastr.success("{{ Session::get('message') }}");
                            break;
                        case 'warning':
                            toastr.warning("{{ Session::get('message') }}");
                            break;
                        case 'error':
                            toastr.error("{{ Session::get('message') }}");
                            break;
                    }
        </script>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif

</body>

</html>
