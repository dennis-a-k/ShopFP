<section class="content">
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 20%">
                            Имя
                        </th>
                        <th style="width: 20%">
                            Электронная почта
                        </th>
                        <th style="width: 20%">
                            Телефон
                        </th>
                        <th style="width: 8%" class="text-center">
                            Статус
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                                <br />
                                <small>
                                    Создан {{ $user->created_at->format('d.m.Y') }}
                                </small>
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>

                            <td class="project-state">
                                @if ($user->role == 'admin')
                                    <span class="badge badge-success">Администратор</span>
                                @elseif ($user->role == 'moderator')
                                    <span class="badge badge-info">Модератор</span>
                                @else
                                    <span class="badge badge-secondary">Пользователь</span>
                                @endif
                            </td>

                            <td class="project-actions text-right">
                                @if (Auth::user()->role == 'admin')
                                    @if (Auth::user()->id == $user->id && $count == 1)
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                            disabled>
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-placement="top" title="Редактировать роль">
                                            <i
                                                class="fas
                                            fa-pencil-alt"></i>
                                        </button>

                                        <!-- Всплывающее окно -->
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <form method="POST" action="{{ route('user.update', $user->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button class="dropdown-item" type="submit" name="role"
                                                    value="admin">
                                                    Администратор
                                                </button>
                                                <button class="dropdown-item" type="submit" name="role"
                                                    value="moderator">
                                                    Модератор
                                                </button>
                                                <button class="dropdown-item" type="submit" name="role"
                                                    value="user">
                                                    Пользователь
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endif

                                <a class="btn btn-primary btn-sm" href="{{ route('user.show', $user->id) }}"
                                    data-toggle="tooltip" data-placement="top" title="Посмотреть профиль">
                                    <i class="fas fa-eye"></i>
                                </a>

                                @if (Auth::user()->id == $user->id && $count == 1)
                                    <button class="btn btn-secondary btn-sm disabled">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @else
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#staticBackdrop" data-placement="top" data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}" title="Удалить">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Модальное окно -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
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
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
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
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>
