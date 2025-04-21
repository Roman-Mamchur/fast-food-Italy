@extends('Frontend.Auth.UserLayout')
@section('title')
    <title>{{$setting->app_name}} - {{ __('translate.Login') }}</title>
@endsection

@section('user-layout')

    <div class="sign-up-text">
        <h2>{{ __('translate.Welcome back') }}</h2>
        <p>{{ __('translate.Welcome back! Please enter your details.') }}</p>
    </div>

    <div class="sign-up-from">
        <div class="sign-up-from-item">
            <form action="{{route('login')}}" method="post">
            @csrf
            <div class="sign-up-from-inner">
                <label for="exampleFormControlInput1" class="form-label">{{ __('translate.Email') }} </label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput">
                    @if ($errors->has('email'))
                        <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
            </div>
            <div class="sign-up-from-inner">
                <label for="passwordField1" class="form-label">{{ __('translate.Password') }}</label>
                <div class="input-group">
                    <input type="password" class="form-control toggle-password" name="password" id="passwordField1">
                    <div class="icon" data-toggle="password" data-target="passwordField1">
                        <span class="toggle-password-icon">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <p class="text-danger">{{$errors->first('password')}}</p>
                @endif

            </div>
             <div class="sign-up-from-inner">

                    <div class="sign-up-from-df">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                {{ __('translate.Remember Me') }}
                            </label>
                        </div>

                        <div class="sign-up-main-btn">
                            <a href="{{route('forgot.password.user')}}" class="modal-sign-up-from-btn">{{ __('translate.Forget Password?') }}</a>
                        </div>
                    </div>
                </div>




            <div class="sign-up-btn">
                <button class="main-btn-four" type="submit">{{ __('translate.Login') }}</button>
            </form>
                <p>{{ __('translate.Do not have an account?') }} <a href="{{ route('register') }}">{{ __('translate.Sign up for free') }}</a></p>

            </div>
        </div>
    </div>


@endsection
