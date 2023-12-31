@extends('layouts.index')

@section('title', 'Добавление пользователя')

@section('css')
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
                    <h1 class="m-0">Добавить нового пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}" class="text-info">Главная</a></li>
                        <li class="breadcrumb-item active">Добавление пользователя</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="row">
            <!-- Information Form-->
            @include('components.users.add-user-information')
            <!-- /.information-form -->

            <!-- Password form -->
            @include('components.users.add-user-password')
            <!-- /.password-form-->
        </div>

        <div class="row pb-4">
            <div class="col-12">
                @if (session('status') === 'user-created')
                    <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-info text-align-center mr-2">Пользователь создан</span>
                @endif

                <button type="submit" class="btn btn-info float-right">Создать</button>
            </div>
        </div>
    </form>
@endsection
