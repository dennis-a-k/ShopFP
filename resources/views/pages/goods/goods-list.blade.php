@extends('layouts.index')

@section('title', 'Список товаров')

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
                    <h1 class="m-0">Список товаров</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}" class="text-info">Главная</a></li>
                        <li class="breadcrumb-item active">Список товаров</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (!isset($goods[0]))
                <h5 class="text-info text-center mt-2">Список товаров пуст</h5>
            @else
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Артикул</th>
                                    <th style="width: auto">Наименование</th>
                                    <th>Серия</th>
                                    <th>Остаток</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($goods as $key => $product)
                                    <tr>
                                        <td>{{ $product->article }}</td>
                                        <td>
                                            <a href="#">{{ $product->title }}</a>
                                        </td>
                                        <td>{{ $product->category->title }}</td>
                                        <td>
                                            @include('components.goods.count-product-modal')
                                        </td>
                                        <td>
                                            @include('components.goods.price-product-modal')
                                        </td>
                                        <td>
                                            @include('components.goods.published-product-modal')
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                                    data-content="Редактировать">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>

                                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#modalDelete" data-product="{{ $product }}"
                                                    data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.goods.delete-product-modal')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            @endif
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

        //модалка для удаления категории
        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const product = button.data('product');

            const modal = $(this);
            modal.find('.modal-title').text('Удаление товара арт: ' + product['article']);
            modal.find('.modal-text').text('Удалить ' + product['title'] + '?');
            modal.find('.modal-id').attr('value', product['id']);
        })
    </script>
@endsection
