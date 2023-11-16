@extends('layouts.auth')

@section('title', 'Регистрация')

@section('css')
    <style type="text/css">
        .error-login {
            font-size: 80%;
            color: #dc3545;
        }
    </style>
@endsection

@section('content')
    <p class="login-box-msg">Регистрация</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Укажите ваше имя"
                value="{{ old('name') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Укажите вашу почту"
                value="{{ old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Придумайте пароль">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Подтвердите пароль">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-info btn-block">Регистрация</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mt-3 mb-0">
        <a class="text-info" href="{{ route('login') }}">
            Войти
        </a>
    </p>
@endsection
