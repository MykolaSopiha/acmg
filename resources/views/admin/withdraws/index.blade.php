@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Withdraws
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <h1 class="mb-3">Withdraws List</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($withdraws as $withdraw)
            <tr>
                <td>{{$withdraw->id}}</td>
                <td>{{$withdraw->user->name}}</td>
                <td>{{$withdraw->amount}}&nbsp;{{$withdraw->wallet->currency->symbol}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
