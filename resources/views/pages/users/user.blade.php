@extends('layouts.index')

@section('title')
    {{ $user->name }}
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}" class="text-info">Главная</a></li>
                        <li class="breadcrumb-item active">Страница пользователя</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-info card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">
                        @switch($user->role)
                            @case('admin')
                                Администратор
                            @break

                            @case('moderator')
                                Модератор
                            @break

                            @default
                                Пользователь
                        @endswitch
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Почта</b> <a class="float-right text-info">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Телефон</b> <a class="float-right text-info">{{ $user->phone }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Создан</b> <a class="float-right text-info">{{ $user->created_at->format('d.m.Y') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <h4><b>Заказы:</b> шт.</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-12" id="accordion">
                                <div class="card bg-lightblue">
                                    <div class="card-header">
                                        <div class="row">
                                            <span class="col-3 ">
                                                <b>Номер заказа</b>
                                            </span>
                                            <span class="col-3 text-center">
                                                <b>Стоимость</b>
                                            </span>
                                            <span class="col-3 text-center">
                                                <b>Дата заказа</b>
                                            </span>
                                            <span class="col-3 text-center">
                                                <b>Статус</b>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @include('components.users.orders-list')

                            </div>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
