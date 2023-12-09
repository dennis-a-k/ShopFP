<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEdit" data-category="{{ $category }}"
    data-content="Редактировать">
    <i class="fas fa-pencil-alt"></i>
</button>

<!-- Модальное окно -->
<div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelAdd">
                    Редактирование серии
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('category.update') }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputCategory">Название серии</label>
                            <input type="text" id="inputCategory"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} modal-title"
                                name="title" value="" required autofocus autocomplete="title">
                            <x-input-error class="ml-2" :messages="$errors->get('title')" />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Отменить
                    </button>
                    <button type="submit" class="btn btn-info modal-id" name="id" value="">
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
