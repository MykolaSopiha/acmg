@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('admin:users.view', $user->id) }}">{{$user->name}}</a>
        </li>
        <li class="breadcrumb-item active">
            Wallet
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container">
            <h1 class="display-4">
                Balance: {{number_format($user->wallet->balance, 2, '.', ' ')." ".$user->wallet->currency->code}}</h1>
        </div>
    </div>

    <h3>Deposits:</h3>
    <div class="table-responsive mb-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Cause</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->wallet->deposit as $deposit)
                <tr>
                    <td>{{$deposit->created_at}}</td>
                    <td>{{$deposit->amount." ".$deposit->wallet->currency->code}}</td>
                    <td>{{($deposit->paymentType->name)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <h3>Withdraws:</h3>
    <div class="table-responsive mb-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->wallet->withdraw as $withdraw)
                <tr>
                    <td>{{$withdraw->created_at}}</td>
                    <td>{{$withdraw->amount." ".$deposit->wallet->currency->code}}</td>
                    <td>
                        @if (is_null($withdraw->confirmed_at))
                            <span class="badge badge-primary">padding</span>
                        @else
                            <span class="badge badge-success">confirmed</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
