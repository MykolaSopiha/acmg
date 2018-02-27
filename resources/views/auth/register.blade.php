@extends('layouts.app')

@section('content')

    <header class="masthead mb-auto">
        <div class="inner text-center">
            <h3 class="masthead-brand">
                <a href="{{url('/')}}">{{config('app.name')}}</a>
            </h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="{{route('login')}}">Войти</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover mt-auto mb-auto">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="panel panel-default">
                        <div class="panel-heading mb-3">
                            <h1 class="h2 text-center">Регистрация</h1>
                        </div>

                        <div class="panel-body">
                            <form class="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Никнейм</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                           required autofocus>
                                    @if ($errors->has('name'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">E-Mail</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                           required>
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
                                    <label for="password-confirm">Повторите пароль</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>

                                <div class="form-group{{ $errors->has('ref_key') ? ' has-error' : '' }}">
                                    <label for="ref_key">Реферальный ключ *</label>
                                    <input id="ref_key" type="text" class="form-control" name="ref_key"
                                           value="{{(isset($_GET['ref_key'])) ? $_GET['ref_key'] : "" }}" {{(isset($_GET['ref_key'])) ? "readonly" : ""}} aria-describedby="refKeyHelp">
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
                <a class="btn btn-default" href="https://telegram.org/@groupname"><i class="fab fa-telegram-plane"></i></a>
            </p>
        </div>
    </footer>

@endsection
