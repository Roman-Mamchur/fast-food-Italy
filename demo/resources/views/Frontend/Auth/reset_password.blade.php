@extends('Frontend.Auth.UserLayout')
@section('title')
    <title>{{$setting->app_name}} - {{ __('translate.Reset Password') }}</title>
@endsection

@section('user-layout')

    <div class="sign-up-text">
        <h2>{{ __('translate.Reset Password') }}</h2>
        <p>{{ __('translate.Please fill out the form below and reset your password') }}</p>
    </div>

    <div class="sign-up-from">
        <div class="sign-up-from-item">
            @if (Session::has('error'))
                <p class="text-danger">{{Session::get('error')}}</p>
            @endif
            <form action="{{route('reset.password.user')}}" method="post">
            @csrf
            <div class="sign-up-from-inner">
                <label for="passwordField1" class="form-label">{{ __('translate.Password') }}</label>
                <div class="input-group">
                    <input type="password" class="form-control toggle-password" name="password" id="passwordField1">
                    <input class="sherah-wc__form-input" type="hidden" name="id" value="{{$user[0]['id']}}">
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
            <div class="sign-up-btn">
                <button class="main-btn-four" type="submit">{{ __('translate.Reset Password') }}</button>
            </form>

            <p>{{ __('translate.Back to login page') }} <a href="{{ route('login') }}">{{ __('translate.Sign in here') }}</a></p>

            </div>
        </div>
    </div>
@endsection
