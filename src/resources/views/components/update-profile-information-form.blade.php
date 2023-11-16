<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Данные пользователя</h3>
        </div>

        <div class="card-body">
            <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <div>
                        <label for="inputName">Имя пользователя</label>
                        <input type="text" id="inputName"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                            value="{{ old('name', $user->name) }}" required autocomplete="name">
                        <x-input-error class="ml-2" :messages="$errors->get('name')" />
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <label for="inputEmail">Электронная почта</label>
                        <input type="email" id="inputEmail"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                            value="{{ old('email', $user->email) }}" required autocomplete="username">
                        <x-input-error class="ml-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800">
                                    {{ __('Your email address is unverified.') }}

                                    <button form="send-verification"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        @if (session('status') === 'profile-updated')
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
