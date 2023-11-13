<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        <span class="">{{ Auth::user()->name }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
        <a href="{{ route('profile.edit') }}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <i class="fa fa-user-edit mr-2"></i>
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                        Настройки
                    </h3>
                </div>
            </div>
            <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <span
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Выход
                            </span>
                        </form>
                    </h3>
                </div>
            </div>
            <!-- Message End -->
        </a>
    </div>
</li>
