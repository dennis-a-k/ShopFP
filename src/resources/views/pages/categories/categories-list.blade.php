@extends('layouts.index')

@section('title', 'Категории')

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
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}" class="text-info">Главная</a></li>
                        <li class="breadcrumb-item active">Категории</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    @include('components.add-category-modal')
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="width: auto">Серия</th>
                                <th style="width: 40px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            @include('components.edit-category-modal')

                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                data-target="#modalDelete" data-placement="top" title="Удалить">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        @include('components.delete-category-modal')
                                    </td>
                                    {{-- <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-info btn-xs" data-toggle="modal-edit"
                                            data-target="#staticBackdrop" data-placement="top" data-id="" data-name=""
                                            title="Редактировать">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn btn-danger btn-xs" data-toggle="modal-delete"
                                            data-target="#staticBackdrop" data-placement="top" data-id="" data-name=""
                                            title="Удалить">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Модальное окно -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">
                                                        Подтвердите дейсвие
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="modal-text text-center">Удалить?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Отменить
                                                    </button>

                                                    <form method="POST" action="{{ route('user.destroy') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger modal-id"
                                                            name="id" value="">
                                                            Удалить
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        //всплывающие подсказки над кнопками
        $('[data-toggle="modal"]').tooltip();

        //модалка для удаления категории
        $('#staticBackdrop').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget)
            const id = button.data('id')
            const name = button.data('name')

            const modal = $(this)
            modal.find('.modal-text').text('Удалить ' + name + '? ')
            modal.find('.modal-id').attr('value', id)
        })
    </script>
@endsection
