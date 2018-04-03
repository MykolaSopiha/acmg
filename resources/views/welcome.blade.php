<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}}</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/cover.css')}}" rel="stylesheet">

</head>
<body>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">

    <header class="masthead mb-auto">
        <div class="inner text-center">
            <h3 class="masthead-brand">{{config('app.name')}}</h3>
            @if (Route::has('login'))
                <nav class="nav nav-masthead justify-content-center">
                    @auth
                        <a class="nav-link" href="{{url('/home')}}">Главная</a>
                    @else
                        <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                        <a class="nav-link" href="{{route('login')}}">Войти</a>
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <main role="main" class="inner cover text-center">
        <h1 class="cover-heading">Сдай свой аккаунт в аренду.</h1>
        <p class="lead">Начни зарабатывать прямо сейчас сдав свой аакаунт от популярной социальной сети facebook.com в аренду.<br/>Для этого зарегестрируйся и следуй инструкциям.</p>
        <p class="lead">
            <a href="{{route('register')}}" class="btn btn-lg btn-primary">Начать зарабатывать</a>
        </p>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner text-center">
            <p>
                За дополнительной информацией обращайтесь по телефонам:<br/>
                <a class="btn btn-default" href="tel:{{config('contacts.phones.Kyivstar')}}">
                    {{config('contacts.phones.Kyivstar')}}
                </a>
                <a class="btn btn-default" href="tel:{{config('contacts.phones.MTS')}}">
                    {{config('contacts.phones.MTS')}}
                </a>
            </p>
        </div>
    </footer>

</div>
</body>
</html>
