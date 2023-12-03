<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Данные пользователя</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div>
                    <label for="inputName">Имя пользователя</label>
                    <input type="text" id="inputName"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                        value="{{ old('name') }}" required autofocus autocomplete="name">
                    <x-input-error class="ml-2" :messages="$errors->get('name')" />
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="inputPhone">Номер телефона</label>
                    <input type="text" id="inputPhone"
                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone"
                        value="{{ old('phone') }}" required autocomplete="phone">
                    <x-input-error class="ml-2" :messages="$errors->get('phone')" />
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="inputEmail">Электронная почта</label>
                    <input type="email" id="inputEmail"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                        value="{{ old('email') }}" required autocomplete="username">
                    <x-input-error class="ml-2" :messages="$errors->get('email')" />
                </div>
            </div>
        </div>
    </div>
</section>
