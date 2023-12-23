@extends('layouts.index')

@section('title')
    {{ $product->article }} {{ $product->title }}
@endsection

@section('css')
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">
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
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default">
                <div class="card-body p-0">
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Информация</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Медиа</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form method="POST" action="{{ route('product.update', $product->id) }}">
                                @csrf
                                @method('PATCH')

                                <!-- step 1 content -->
                                @include('components.goods.edit-product-information')

                                <!-- step 2 content -->
                                @include('components.goods.edit-product-images')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('js')
    <!-- BS-Stepper -->
    <script src="{{ URL::asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
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
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

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
                minHeight: 156,
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
