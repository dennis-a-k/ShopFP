@if (Auth::user()->role == 'admin')
    @if (Auth::user()->id == $user->id && $count == 1)
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" disabled>
            <i class="fas fa-pencil-alt"></i>
        </button>
    @else
        <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-pencil-alt"></i>
        </button>

        <!-- Всплывающее окно -->
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PATCH')
                <button class="dropdown-item" type="submit" name="role" value="admin">
                    Администратор
                </button>
                <button class="dropdown-item" type="submit" name="role" value="moderator">
                    Модератор
                </button>
                <button class="dropdown-item" type="submit" name="role" value="user">
                    Пользователь
                </button>
            </form>
        </div>
    @endif
@endif
