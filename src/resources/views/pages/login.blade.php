@extends('layouts.auth')

@section('title', 'Вход')

@section('content')
    <!-- jquery validation -->
    <div class="card">
        <!-- form start -->
        <form id="quickForm">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Почта</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Введите почту">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Введите пароль">
                </div>
                <button type="submit" class="btn btn-success">Войти</button>
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
