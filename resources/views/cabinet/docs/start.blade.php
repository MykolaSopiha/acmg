@extends('cabinet.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Консоль</a>
        </li>
        <li class="breadcrumb-item">
            Справка
        </li>
        <li class="breadcrumb-item active">
            Quick Start
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <h1 class="h1 my-5 text-center">
        С чего начать?
    </h1>

    <div class="row mb-5">
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img/start/step1.jpg')}}" alt="Sidebar menu items">
                <div class="card-body">
                    <h5 class="card-title">Перейдите в раздел "Аккаунты"</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img/start/step2.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Добавте новый аккаунт</h5>
                    <p class="card-text">Введите ID аккаунта и нажмите "Добавить"</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img/start/step3.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Ожидайте звонка</h5>
                    <p class="card-text">Наш оператор проверить пригодность аккаунта для использования в рекламных целях
                        и свяжется с вам в ближайшее время</p>
                </div>
            </div>
        </div>
    </div>

    <p class="mb-5">
        Вы можете найти ответы на самые частозадаваемые вопросы в разделе <a href="{{ route('cabinet:docs.faq') }}">FAQ.</a>
    </p>
@endsection
