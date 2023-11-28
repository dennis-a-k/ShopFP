@extends('layouts.index')

@section('title', 'Добавление товара')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">

    <style type="text/css">
        .error-login {
            font-size: 80%;
            color: #dc3545;
        }
    </style>
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить новы товар</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}" class="text-info">Главная</a></li>
                        <li class="breadcrumb-item active">Добавление товара</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="card-body">
            <div class="row">
                <!-- Information Form-->
                @include('components.goods.add-product-information')
                <!-- /.information-form -->

                <!-- Password form -->
                {{-- @include('components.add-user-password') --}}
                <!-- /.password-form-->
            </div>
        </div>

        <div class="row pb-4">
            <div class="col-12">
                @if (session('status') === 'product-created')
                    <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-info text-align-center mr-2">Товар создан</span>
                @endif

                <button type="submit" class="btn btn-info float-right">Создать</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ URL::asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ URL::asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('adminlte/plugins/summernote/lang/summernote-ru-RU.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            // Select2
            $('.select2').select2();
            // Summernote
            $('#summernote').summernote({
                lang: 'ru-RU',
                placeholder: 'Описание товара',
                minHeight: 200,
                disableDragAndDrop: true,
                shortcuts: false,
                toolbar: [
                    ['para', ['ul']],
                ],
            });
        })
    </script>
@endsection
