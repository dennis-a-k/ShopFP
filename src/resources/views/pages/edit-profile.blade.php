@extends('layouts.index')

@section('title')
    {{ Auth::user()->name }}
@endsection

@section('css')
    <style type="text/css">
        .error-login {
            margin-top: 0.25rem;
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
                    <h1 class="m-0">Редактирование профиля</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование профиля</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Update Profile -->
        @include('components.update-profile-information-form')
        <!-- /.update-profile -->

        <!-- Update Profile -->
        @include('components.update-password-form')
        <!-- /.update-profile -->
    </div>
@endsection
