@extends('layouts.index')

@section('title')
    {{ $product->article }} {{ $product->title }}
@endsection

@section('css')
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">

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
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="productTitle">Наименование</label>
                                    <input type="text" id="productTitle"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="title"
                                        value="{{ old('title', $product->title) }}" required autofocus autocomplete="title">
                                    <x-input-error class="ml-2" :messages="$errors->get('title')" />
                                </div>
                                <div class="form-group">
                                    <label for="productArticle">Артикул</label>
                                    <input type="text" id="productArticle"
                                        class="form-control {{ $errors->has('article') ? 'is-invalid' : '' }}"
                                        name="article" value="{{ old('title', $product->article) }}" required autofocus
                                        autocomplete="article">
                                    <x-input-error class="ml-2" :messages="$errors->get('article')" />
                                </div>
                                <button class="btn btn-info" onclick="stepper.next()">Далее</button>
                            </div>
                            <div id="information-part" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-info" onclick="stepper.previous()">Назад</button>
                                <button type="submit" class="btn btn-info">Сохранить</button>
                            </div>
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

    <script type="text/javascript">
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
@endsection
