<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Изменение пароля пользователя</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div>
                        <label for="current_password">Текущий пароль</label>
                        <input type="password" id="current_password"
                            class="form-control {{ $errors->updatePassword->get('current_password') ? 'is-invalid' : '' }}"
                            name="current_password" autocomplete="current-password">
                        <x-input-error class="ml-2" :messages="$errors->updatePassword->get('current_password')" />
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <label for="password">Новый пароль</label>
                        <input type="password" id="password"
                            class="form-control {{ $errors->updatePassword->get('password') ? 'is-invalid' : '' }}"
                            name="password" autocomplete="new-password">
                        <x-input-error class="ml-2" :messages="$errors->updatePassword->get('password')" />
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <label for="password_confirmation">Подтвердите пароль</label>
                        <input type="password" id="password_confirmation"
                            class="form-control {{ $errors->updatePassword->get('password_confirmation') ? 'is-invalid' : '' }}"
                            name="password_confirmation" autocomplete="new-password">
                        <x-input-error class="ml-2" :messages="$errors->updatePassword->get('password_confirmation')" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        @if (session('status') === 'password-updated')
                            <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-info text-align-center mr-2">Изменения внесены</span>
                        @endif

                        <button type="submit" class="btn btn-info float-right">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
