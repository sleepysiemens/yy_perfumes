@extends('layouts.main')

@section('content')
<div class="w-full">
    <div class="text-2xl mt-2 font-bold">
        {{ __('Register or log in to your personal account to manage orders') }}
    </div>
    <div class="flex flex-wrap justify-between mt-8">
        <div class="sm:w-1/2 w-full sm:mb-0 mb-12 sm:pr-20">
            <div class="card">
                <div class="text-xl font-bold mb-3">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="whitespace-nowrap p-2 px-5 bg-zinc-900 hover:bg-zinc-700 active:scale-95 text-white duration-200 flex items-center mb-3">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="sm:w-1/2 w-full sm:pr-20">
            <div class="card">
                <div class="text-xl font-bold mb-3">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_type" class="col-md-4 col-form-label text-md-end">Выберите тип регистрации</label>

                            <div class="col-md-6">
                                <select name="user_type" onchange="setUserType()" id="user_type" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600">
                                    <option value="client" selected>Клиент</option>
                                    <option value="dealer">Дилер</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3 hidden inn-field-block">
                            <label for="inn" class="col-md-4 col-form-label text-md-end">Введите Ваш ИНН</label>

                            <div class="col-md-6">
                                <input id="inn" type="text" name="inn" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600 @error('inn') is-invalid @enderror" value="{{ old('inn') }}">

                                @error('inn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="register-btn" class="whitespace-nowrap p-2 px-5 bg-zinc-900 hover:bg-zinc-700 active:scale-95 text-white duration-200 flex items-center">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="mt-5 border-2 p-3 inn-field-block hidden border-danger">
                            <b class="text-danger">Организация не найдена!</b>
                        </div>

                        <div class="mt-5 border-2 p-3 inn-field-block hidden">
                            <b>Информация по ИНН</b>
                            <p>Убедитесь, что данные соответствуют вашей организации</p>
                            <hr class="mt-3 mb-3">
                            <p>Наименование организации: <span id="soc_name"></span></p>
                            <p>Полное наименование организации: <span id="name"></span></p>
                            <p>Адрес: <span id="address"></span></p>
                            <p>ОГРН: <span id="ogrn"></span></p>
                            <p>ОКПО: <span id="okpo"></span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function setUserType() {
            let type = $('#user_type').val();

            if (type === 'dealer') {
                $('.inn-field-block').removeClass('hidden');
                $('#register-btn').attr('disabled', true);
            } else {
                $('.inn-field-block').addClass('hidden');
                $('#register-btn').attr('disabled', false);
            }
        }

        $('#inn').on('change', function () {
            axios.get('/invoices/load-data/' + $('#inn').val())
                .then(response => {
                    let data = response.data;
                    console.log(data);

                    $('#register-btn').attr('disabled', false);

                    if (data.length > 0) {
                        console.log(data);
                        $('#okpo').html(data[0].data.okpo);
                        $('#soc_name').html(data[0].data.name.short_with_opf);
                        $('#name').html(data[0].data.name.full_with_opf);
                        $('#address').html(data[0].data.address.unrestricted_value);
                        $('#ogrn').html(data[0].data.ogrn);
                    } else {
                        $('#okpo').html('');
                        $('#soc_name').html('');
                        $('#name').html('');
                        $('#address').html('');
                        $('#ogrn').html('');

                        alert('Организация не найдена');
                        $('#register-btn').attr('disabled', true);
                    }
                });
        })
    </script>
@endpush
