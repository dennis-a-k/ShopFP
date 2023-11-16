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
        <div class="{{ $errors->has('name') ? 'input' : 'input-group' }} mb-3">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                placeholder="Укажите ваше имя" value="{{ old('name') }}" required autofocus>
            @if (!$errors->has('name'))
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            @endif
        </div>

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <div class="{{ $errors->has('email') ? 'input' : 'input-group' }} mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                placeholder="Укажите вашу почту" value="{{ old('email') }}" required>
            @if (!$errors->has('email'))
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            @endif
        </div>

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <div class="{{ $errors->has('password') ? 'input' : 'input-group' }} mb-3">
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                placeholder="Придумайте пароль" required>
            @if (!$errors->has('password'))
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            @endif
        </div>

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        <div class="{{ $errors->has('password_confirmation') ? 'input' : 'input-group' }} mb-3">
            <input type="password" name="password_confirmation"
                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                placeholder="Подтвердите пароль" required>
            @if (!$errors->has('password_confirmation'))
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            @endif
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
