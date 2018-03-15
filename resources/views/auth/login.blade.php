@extends('layouts.app')


@section('content')
    <main role="main">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Вход</div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail</label>
                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <p class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Пароль</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <p class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                                меня
                            </label>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary mb-3">Войти</button>
                    </div>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="{{ route('register') }}">Регистрация</a>
                    <a class="d-block small" href="{{ route('password.request') }}">Забыли пароль?</a>
                </div>
            </div>
        </div>
    </main>

@endsection
