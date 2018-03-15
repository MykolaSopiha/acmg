@extends('cabinet.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Консоль</a>
        </li>
        <li class="breadcrumb-item active">
            Баланс
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Баланс: {{number_format($user->wallet->balance, $user->wallet->currency->decimal_digits, '.', ' ')." ".$user->wallet->currency->code}}</h1>
            <p class="lead">Для вывода денег на балансе перейдите в раздел "<a href="{{ route('cabinet:withdraws.index') }}">Вывод денег</a>" и создайте заявку на вывод средств.</p>
        </div>
    </div>

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

@endsection
