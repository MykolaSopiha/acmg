@extends('cabinet.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Консоль</a>
        </li>
        <li class="breadcrumb-item active">
            Вывод денег
        </li>
    </ol>
    <!-- Breadcrumbs end -->

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
        @foreach($withdraws as $withdraw)
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

@endsection
