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
                    @include('components.categories.add-category-modal')
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-sm">
                        @if (!isset($categories[0]))
                            <thead>
                                <h5 class="text-info text-center mt-2">Категории не созданы</h5>
                            </thead>
                        @else
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
                                                @include('components.categories.edit-category-modal')

                                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#modalDelete" data-category="{{ $category }}"
                                                    data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.categories.delete-category-modal')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
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
        $('[data-toggle="modal"]').popover({
            placement: 'top',
            trigger: 'hover',
        });

        //модалка для редактирования категории
        $('#modalEdit').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const category = button.data('category');

            const modal = $(this);
            modal.find('.modal-title').attr('value', category['title']);
            modal.find('.modal-id').attr('value', category['id']);
        })

        //модалка для удаления категории
        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const category = button.data('category');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить ' + category['title'] + '?')
            modal.find('.modal-id').attr('value', category['id']);
        })
    </script>
@endsection
