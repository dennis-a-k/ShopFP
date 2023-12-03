@extends('layouts.auth')

@section('title', 'Восстановление пароля')

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
    <p class="login-box-msg">Восстановление пароля</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <div class="{{ $errors->has('email') ? 'input' : 'input-group' }} mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                placeholder="Введите почту" value="{{ old('email') }}" required autofocus>
            @if (!$errors->has('email'))
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-info btn-block">Восстановить пароль</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mt-3 mb-1">
        <a class="text-info" href="{{ route('login') }}">
            Войти
        </a>
    </p>
    <p class="mb-0">
        <a class="text-info" href="{{ route('register') }}">
            Регистрация
        </a>
    </p>
@endsection
