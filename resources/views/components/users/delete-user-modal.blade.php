@if (Auth::user()->id == $user->id && $count == 1)
    <button class="btn btn-secondary btn-sm disabled">
        <i class="fas fa-trash"></i>
    </button>
@else
    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop" data-placement="top"
        data-id="{{ $user->id }}" data-name="{{ $user->name }}" title="Удалить">
        <i class="fas fa-trash"></i>
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Подтвердите дейсвие
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <button type="submit" class="btn btn-danger modal-id" name="id" value="">
                            Удалить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
