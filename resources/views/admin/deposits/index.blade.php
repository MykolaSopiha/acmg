@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Deposits
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <header class="mb-4">
        <h1 class="">Deposits List</h1>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Amount</th>
            <th scope="col">Account</th>
            <th scope="col">Cause</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($deposits as $deposit)
            <tr>
                <td>{{$deposit->id}}</td>
                <td>
                    <a href="{{route('admin:users.view', $deposit->wallet->user->id)}}">
                        {{$deposit->wallet->user->name}}
                    </a>
                </td>
                <td>
                    {{$deposit->amount}}&nbsp;{{$deposit->wallet->currency->symbol}}
                </td>
                <td>
                    <a href="{{route('admin:accounts.view', $deposit->wallet->user->id)}}">
                        {{$deposit->account->url}}
                    </a>
                </td>
                <td>{{$deposit->paymentType->label}}</td>
                <td>
                    {{($deposit->available) ? "available" : "expected"}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
