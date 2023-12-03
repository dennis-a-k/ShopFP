@extends('layouts.auth')

@section('title', 'Вход')

@section('css')
    <style type="text/css">
        .error-login {
            margin-top: 0.25rem;
            font-size: 80%;
            color: #dc3545;
        }
    </style>
@endsection

@section('content')
    <p class="login-box-msg">Вход</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <x-input-error :messages="$errors->get('email')" />
        <div class="{{ $errors->has('email') ? 'input' : 'input-group' }} mb-3">
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                placeholder="Введите почту" value="{{ old('email') }}" required autofocus>
            @if (!$errors->has('email'))
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            @endif
        </div>

        <x-input-error :messages="$errors->get('password')" />
        <div class="{{ $errors->has('password') ? 'input' : 'input-group' }} mb-3">
            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"
                placeholder="Введите пароль" required>
            @if (!$errors->has('password'))
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-info">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">
                        Запомнить меня
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-info btn-block">Войти</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mb-1">
        <a class="text-info" href="{{ route('password.request') }}">
            Восстановить пароль
        </a>
    </p>
    <p class="mb-0">
        <a class="text-info" href="{{ route('register') }}">
            Регистрация
        </a>
    </p>
@endsection
