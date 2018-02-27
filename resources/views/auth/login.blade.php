@extends('layouts.app')

@section('content')

    <header class="masthead mb-auto">
        <div class="inner text-center">
            <h3 class="masthead-brand">
                <a href="{{url('/')}}">{{config('app.name')}}</a>
            </h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="{{route('register')}}">Регистрация</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover mt-auto mb-auto">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="panel panel-default">
                        <div class="panel-heading mb-3">
                            <h1 class="h2 text-center">Вход</h1>
                        </div>

                        <div class="panel-body">
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
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary mb-3">Войти</button>
                                    <br>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">Забыли пароль?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner text-center">
            <p>
                За дополнительной информацией обращайтесь<br/>
                <a class="btn btn-default" href="tel:+380967368180"><i class="fas fa-phone-square"></i></a>
                <a class="btn btn-default" href="mailto:niksop94@gmail.com"><i class="far fa-envelope"></i></a>
                <a class="btn btn-default" href="telegram.me/@groupname"><i class="fab fa-telegram-plane"></i></a>
            </p>
        </div>
    </footer>

@endsection
