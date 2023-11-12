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
    <!-- jquery validation -->
    <div class="card">
        <!-- form start -->
        <form id="quickForm" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="card-body">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <div class="form-group">
                    <label for="exampleInputEmail1">Почта</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Введите почту" value="{{ old('email') }}">
                </div>

                <div class="d-flex flex-wrap justify-content-end align-items-center">
                    @if (Route::has('login'))
                        <a class="text-dark" href="{{ route('login') }}">
                            {{ __('Войти') }}
                        </a>
                    @endif

                    <button type="submit" class="btn btn-info ml-2">Восстановить</button>
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
                },
                messages: {
                    email: {
                        required: "Введите адрес электронной почты",
                        email: "Почта введена неверно",
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
