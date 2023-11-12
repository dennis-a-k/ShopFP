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
    <!-- jquery validation -->
    <div class="card">
        <!-- form start -->
        <form id="quickForm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card-body">
                <x-input-error :messages="$errors->get('email')" />

                <div class="form-group">
                    <label for="exampleInputEmail1">Почта</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Введите почту" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Введите пароль">
                </div>

                <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input custom-control-input-info"
                            id="exampleCheck1">
                        <label class="custom-control-label" for="exampleCheck1">Запомнить меня</label>
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-end align-items-center">
                    <a class="text-dark" href="{{ route('register') }}">
                        {{ __('Регистрация') }}
                    </a>

                    <a class="text-dark ml-2" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>

                    <button type="submit" class="btn btn-info ml-2">Войти</button>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('js')
    <!-- jquery-validation -->
    <script src="{{ URL::asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        password: true,
                    },
                },
                messages: {
                    email: {
                        required: "Введите адрес электронной почты",
                        email: "Почта введена неверно",
                    },
                    password: {
                        required: "Введите пароль",
                        minlength: "Минимальная длинна пароля 6 символов",
                        password: "Пароль введён неверно",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
