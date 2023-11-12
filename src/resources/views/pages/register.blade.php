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
    <!-- jquery validation -->
    <div class="card">
        <!-- form start -->
        <form id="quickForm" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputName1">Имя</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                        placeholder="Укажите ваше имя" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Почта</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Укажите вашу почту" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Придумайте пароль">
                </div>

                <div class="form-group">
                    <label for="exampleInputPasswordConfirmation1">Подтверждение пароля</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        id="exampleInputPasswordConfirmation1" placeholder="Подтвердите пароль">
                </div>

                <div class="d-flex flex-wrap justify-content-end align-items-center">
                    <a class="text-dark" href="{{ route('login') }}">
                        {{ __('Войти') }}
                    </a>

                    <button type="submit" class="btn btn-info ml-2">Регистрация</button>
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
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: '[name="password"]',
                    },
                },
                messages: {
                    name: {
                        required: "Укажите ваше имя",
                    },
                    email: {
                        required: "Введите адрес электронной почты",
                        email: "Почта введена неверно",
                    },
                    password: {
                        required: "Придумайте пароль",
                        minlength: "Минимальная длинна пароля 6 символов",
                    },
                    password_confirmation: {
                        required: "Подтвердите пароль",
                        equalTo: "Пароль введён неверно",
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
