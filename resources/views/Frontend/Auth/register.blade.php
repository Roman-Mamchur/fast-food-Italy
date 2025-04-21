@extends('Frontend.Auth.UserLayout')
@section('title')
    <title>{{$setting->app_name}} - {{ __('translate.Register') }}</title>
@endsection

@section('user-layout')

    <div class="sign-up-text">
        <h2>{{ __('translate.Welcome back') }}</h2>
        <p>{{ __('translate.Welcome back! Please enter your details.') }}</p>
    </div>

    <div class="sign-up-from">
        <div class="sign-up-from-item">
            @if (Session::has('error'))
                <p class="text-danger">{{Session::get('error')}}</p>
            @endif
            <form action="{{route('register')}}" method="post">
            @csrf
            <div class="sign-up-from-inner">
                <label for="exampleFormControlInput1" class="form-label">{{ __('translate.Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" id="exampleFormControlInput1">
                    @if ($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
            </div>
            <div class="sign-up-from-inner">
                <label for="exampleFormControlInput2" class="form-label">{{ __('translate.Email') }}</label>
                <input type="email" class="form-control" value="{{old('email')}}" name="email" id="exampleFormControlInput2">
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
                <label for="passwordField2" class="form-label">{{ __('translate.Confirm Password') }}</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password_confirmation" id="passwordField2">
                    <div class="icon" data-toggle="password" data-target="passwordField2">
                        <span class="toggle-password-icon">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="sign-up-btn">
                <button class="main-btn-four" type="submit">{{ __('translate.Sign Up') }}</button>
            </form>
                <p>{{ __('translate.Already have an account?') }} <a href="{{ route('login') }}">{{ __('translate.Sign in here') }}</a></p>

            </div>
        </div>
    </div>
@endsection
