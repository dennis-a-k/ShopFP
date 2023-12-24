@extends('layouts.index')

@section('title')
    {{ $product->article }} {{ $product->title }}
@endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.css') }}">

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
                    <h1 class="m-0">Редактировать товар {{ $product->title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}" class="text-info">Главная</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('product.list') }}" class="text-info">
                                Список товаров
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{ $product->title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">
            <!-- Information Form-->
            @include('components.goods.edit-product-information')
            <!-- /.information-form -->

            <!-- Images form -->
            @include('components.goods.edit-product-images')
            <!-- /.images-form-->
        </div>

        <div class="row pb-4">
            <div class="col-12">
                @if (session('status') === 'product-updated')
                    <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-info text-align-center mr-2">Данные изменены</span>
                @endif

                <button type="submit" class="btn btn-info float-right">Сохранить</button>
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
    <!-- bs-custom-file-input -->
    <script src="{{ URL::asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ URL::asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            //всплывающие подсказки над кнопками
            $('.images').popover({
                placement: 'bottom',
                content: 'Размер изображения: не более 50Мб и не должен превышать 1200х1200px',
                trigger: 'hover',
            });
            // bs-custom-file-input
            bsCustomFileInput.init();
            // Select2
            $('.select2').select2();
            // Summernote
            $('#summernote').summernote({
                lang: 'ru-RU',
                placeholder: 'Описание товара',
                minHeight: 292,
                disableDragAndDrop: true,
                shortcuts: false,
                dialogsInBody: false,
                toolbar: [
                    ['para', ['ul']],
                ],
            });
            // Ekko Lightbox
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
        })
    </script>
@endsection
