<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Статус и пароль</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div>
                    <label for="password">Пароль</label>
                    <input type="password" id="password"
                        class="form-control {{ $errors->get('password') ? 'is-invalid' : '' }}" name="password" required>
                    <x-input-error class="ml-2" :messages="$errors->get('password')" />
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="password_confirmation">Подтвердите пароль</label>
                    <input type="password" id="password_confirmation"
                        class="form-control {{ $errors->get('password_confirmation') ? 'is-invalid' : '' }}"
                        name="password_confirmation" required>
                    <x-input-error class="ml-2" :messages="$errors->get('password_confirmation')" />
                </div>
            </div>

            <div class="form-group">
                <div>
                    <span><strong>Статус</strong></span>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio1"
                            name="role" value="admin" checked>
                        <label for="customRadio1" class="custom-control-label">Администратор</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio2"
                            name="role" value="moderator">
                        <label for="customRadio2" class="custom-control-label">Модератор</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
