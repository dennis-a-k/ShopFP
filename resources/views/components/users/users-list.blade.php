<section class="content">
    @if (!isset($users[0]))
        <h3 class="text-info text-center mt-2">Список пользователей пуст</h3>
    @else
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
                                    @include('components.users.edit-user-modal')

                                    <a class="btn btn-primary btn-sm" href="{{ route('user.show', $user->id) }}"
                                        data-toggle="tooltip">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    @include('components.users.delete-user-modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    @endif
</section>
