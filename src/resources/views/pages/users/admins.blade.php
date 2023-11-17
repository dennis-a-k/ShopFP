@extends('layouts.index')

@section('title', 'Администраторы сайта')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Администраторы сайта</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Администраторы сайта</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <!-- Admins List -->
    @include('components.users-list')
    <!-- /.admins-list -->
    {{ $users->onEachSide(0)->links() }}
@endsection

@section('js')
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="dropdown"]').tooltip();
        $('[data-toggle="modal"]').tooltip();
    </script>
@endsection
