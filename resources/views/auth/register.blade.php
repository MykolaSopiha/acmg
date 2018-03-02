@extends('layouts.app')


@section('content')
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">

                    <div class="card card-register mx-auto mt-5 mb-5">
                        <div class="card-header card-header--dark">Register an Account</div>
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Никнейм</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}"
                                           required autofocus>
                                    @if ($errors->has('name'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">E-Mail</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}"
                                           required>
                                    @if ($errors->has('email'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password">Пароль</label>
                                            <input id="password" type="password" class="form-control" name="password"
                                                   required>
                                            @if ($errors->has('password'))
                                                <p class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password-confirm">Повторите пароль</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                                    <label for="country">Страна</label>
                                    <select id="country" class="form-control js-select" name="country_id"
                                            data-placeholder="Выберите страну">
                                        <option value=""></option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}"
                                                    data-phone="{{$country->phone}}" {{($country->id == old('country_id') ? 'selected' : '')}}>
                                                {{$country->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('country_id') }}</strong>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone">Телефон</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span id="dialling-code" class="input-group-text">+380</span>
                                        </div>
                                        <input id="phone" type="tel" class="form-control" name="phone"
                                               value="{{old('phone')}}"
                                               onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                               required>
                                    </div>
                                    @if ($errors->has('phone'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('ref_key') ? ' has-error' : '' }}">
                                    <label for="ref_key">Реферальный ключ *</label>
                                    <input id="ref_key" type="text" class="form-control" name="ref_key"
                                           value="{{(isset($_GET['ref_key'])) ? $_GET['ref_key'] : "" }}"
                                           {{(isset($_GET['ref_key'])) ? "readonly" : ""}} aria-describedby="refKeyHelp">
                                    <small id="refKeyHelp" class="form-text text-muted">* Не обязательно</small>
                                    @if ($errors->has('password'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Регистрация</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <a class="d-block small mt-3 text-primary" href="{{ route('login') }}">Login Page</a>
                                <a class="d-block small text-primary" href="{{ route('password.request') }}">Forgot
                                    Password?</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </main>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                let dialling_code = $(this).find("option:selected").data('phone');
                $('#dialling-code').html(dialling_code);
            });
        })
    </script>
@endpush
