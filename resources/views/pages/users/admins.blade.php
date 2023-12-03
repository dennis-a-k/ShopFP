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
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}" class="text-info">Главная</a></li>
                        <li class="breadcrumb-item active">Администраторы сайта</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <!-- Admins List -->
    @include('components.users.users-list')
    <!-- /.admins-list -->
    {{ $users->onEachSide(0)->links() }}
@endsection

@section('js')
    <script type="text/javascript">
        //всплывающие подсказки над кнопками
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="dropdown"]').tooltip();
        $('[data-toggle="modal"]').tooltip();

        //модалка для удаление пользователя
        $('#staticBackdrop').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget)
            const id = button.data('id')
            const name = button.data('name')

            const modal = $(this)
            modal.find('.modal-text').text('Удалить ' + name + '?')
            modal.find('.modal-id').attr('value', id)
        })
    </script>
@endsection
