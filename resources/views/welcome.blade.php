@extends('layouts.app')

@section('content')
    <header class="masthead mb-auto">
        <div class="inner text-center">
            <h3 class="masthead-brand">{{config('app.name')}}</h3>
            @if (Route::has('login'))
                <nav class="nav nav-masthead justify-content-center">
                    @auth
                        <a class="nav-link" href="{{route('cabinet:dashboard')}}">Главная</a>
                    @else
                        <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                        <a class="nav-link" href="{{route('login')}}">Войти</a>
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <main role="main" class="inner cover text-center">
        <h1 class="cover-heading">Cover your page.</h1>
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the
            text, and add your own fullscreen background photo to make it your own.</p>
        <p class="lead">
            <a href="{{route('login')}}" class="btn btn-lg btn-primary">Начать зарабатывать</a>
        </p>
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
    </div>
@endsection