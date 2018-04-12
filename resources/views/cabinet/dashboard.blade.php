@extends('cabinet.layouts.app')


@section('content')


    <!-- Jumbotron begin -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">
                Баланс: {{number_format($user->wallet->balance, $user->wallet->currency->decimal_digits, '.', ' ')." ".$user->wallet->currency->code}}</h1>
        </div>
    </div>
    <!-- Jumbotron end -->


    <!-- Breadcrumbs begin -->
    {{--<ol class="breadcrumb">--}}
    {{--<li class="breadcrumb-item">--}}
    {{--Консоль--}}
    {{--</li>--}}
    {{--</ol>--}}
    <!-- Breadcrumbs end -->


    <!-- Cards begin -->
    {{--<div class="row">--}}
    {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
    {{--<div class="card text-white bg-primary o-hidden h-100">--}}
    {{--<div class="card-body">--}}
    {{--<div class="card-body-icon">--}}
    {{--<i class="fa fa-fw fa-address-card-o"></i>--}}
    {{--</div>--}}
    {{--<div class="mr-5">Аккаунты: {{$accounts}}</div>--}}
    {{--</div>--}}
    {{--<a class="card-footer text-white clearfix small z-1" href="{{ route('cabinet:accounts.index') }}">--}}
    {{--<span class="float-left">View Details</span>--}}
    {{--<span class="float-right">--}}
    {{--<i class="fa fa-angle-right"></i>--}}
    {{--</span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
    {{--<div class="card text-white bg-warning o-hidden h-100">--}}
    {{--<div class="card-body">--}}
    {{--<div class="card-body-icon">--}}
    {{--<i class="fa fa-fw fa-money"></i>--}}
    {{--</div>--}}
    {{--<div class="mr-5">Баланс: {{$balance}}</div>--}}
    {{--</div>--}}
    {{--<a class="card-footer text-white clearfix small z-1" href="{{ route('cabinet:wallet.index') }}">--}}
    {{--<span class="float-left">View Details</span>--}}
    {{--<span class="float-right">--}}
    {{--<i class="fa fa-angle-right"></i>--}}
    {{--</span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
    {{--<div class="card text-white bg-success o-hidden h-100">--}}
    {{--<div class="card-body">--}}
    {{--<div class="card-body-icon">--}}
    {{--<i class="fa fa-fw fa-credit-card"></i>--}}
    {{--</div>--}}
    {{--<div class="mr-5">Выведено денег: {{$withdraw}}</div>--}}
    {{--</div>--}}
    {{--<a class="card-footer text-white clearfix small z-1" href="{{ route('cabinet:withdraws.index') }}">--}}
    {{--<span class="float-left">View Details</span>--}}
    {{--<span class="float-right">--}}
    {{--<i class="fa fa-angle-right"></i>--}}
    {{--</span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
    {{--<div class="card text-white bg-danger o-hidden h-100">--}}
    {{--<div class="card-body">--}}
    {{--<div class="card-body-icon">--}}
    {{--<i class="fa fa-fw fa-users"></i>--}}
    {{--</div>--}}
    {{--<div class="mr-5">Рефералы: {{$referals}}</div>--}}
    {{--</div>--}}
    {{--<a class="card-footer text-white clearfix small z-1" href="{{ route('cabinet:users.index') }}">--}}
    {{--<span class="float-left">View Details</span>--}}
    {{--<span class="float-right">--}}
    {{--<i class="fa fa-angle-right"></i>--}}
    {{--</span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- Cards end -->


    <!-- Accounts begin -->
    <section class="mb-3 border-bottom">
        <header class="mb-4">
            <h1>Мои аккаунты</h1>
        </header>

        <!-- Form begin -->
        <form action="{{route('cabinet:accounts.create')}}" method="POST" class="form-inline mb-3 align-items-start">
            {!! csrf_field() !!}
            <div class="form-group mr-3 mb-2 {{ $errors->has('profile_id') ? 'has-error' : '' }}">
                <label for="profile_id" class="sr-only">Profile ID</label>
                <div>
                    <input type="text" class="form-control" id="profile_id" name="profile_id"
                           value="{{old('profile_id')}}"
                           placeholder="ID вашего аккаунта" required>
                    @if ($errors->has('profile_id'))
                        <p class="text-danger">{{ $errors->first('profile_id') }}</p>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Добавить</button>
        </form>
        <p class="text-muted">Если Вы не знаете как получить ID Вашего аккаунта в Facebook воспользуйтесь этим <a
                    href="https://findmyfbid.com/" target="_blank">сервисом</a></p>
        <!-- Form end -->

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col" class="text-center">Доступ</th>
                    <th scope="col">Статус</th>
                    <th scope="col" class="text-right">Настройки</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accounts as $account)
                    <tr>
                        <td>
                            <a href="https://www.facebook.com/profile.php?id={{$account->profile_id}}" target="_blank">
                                {{$account->profile_id}}
                            </a>
                        </td>
                        <td class="text-center">
                        <span class="text-{{ ($account->viewer_id != '' && $account->viewer_pass != '') ? "success" : "secondary" }}">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </span>
                        </td>
                        <td>
                            <span class="badge badge-primary">{{config('accounts.statuses_ru')[$account->status]}}</span>
                        </td>
                        <td style="text-align: right;">
                            <a class="btn btn-link" href="{{route('cabinet:accounts.edit', $account->id)}}">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <p class="text-secondary">*TV - Team Viewer</p>
    <!-- Accounts end -->


    <!-- Deposits begin -->
    <header class="mb-4">
        <h1 class="">Начисления:</h1>
    </header>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Дата</th>
                <th scope="col">Объем</th>
                <th scope="col">Пометка</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->wallet->deposit as $deposit)
                <tr>
                    <td>{{$deposit->created_at}}</td>
                    <td>{{$deposit->amount." ".$deposit->wallet->currency->code}}</td>
                    <td>{{($deposit->paymentType->description)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Deposits end -->


    <!-- Withdraws begin -->
    <header class="mb-4">
        <h1>Заявки на вывод</h1>
        <a class="text-link" href="{{route('cabinet:withdraws.create')}}">Создать заявку на вывод денег</a>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Дата</th>
            <th scope="col">Объем</th>
            <th scope="col">Карта</th>
            <th scope="col">Статус</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->withdraw as $withdraw)
            <tr>
                <td>{{$withdraw->created_at}}</td>
                <td>{{$withdraw->amount." ".$withdraw->wallet->currency->code}}</td>
                <td>{{$withdraw->card_code}}</td>
                <td>
                    @if ( is_null($withdraw->confirmed_by) )
                        Обрабатывается
                    @else
                        Выполнено
                    @endif
                </td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Withdraws end -->
@endsection
