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
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($withdraws as $withdraw)
            <tr>
                <td>{{$withdraw->id}}</td>
                <td>{{$withdraw->wallet->user->name}}</td>
                <td>{{$withdraw->amount}}&nbsp;{{$withdraw->wallet->currency->symbol}}</td>
                <td>
                    @if (is_null($withdraw->confirmed_by))
                        <a class="btn btn-success" href="{{ route('admin:withdraws.confirm', $withdraw->id) }}">confirm</a>
                    @else
                        <span>confirmed by <a href="{{ route('admin:users.view', $withdraw->inspector->id) }}">{{ $withdraw->inspector->name }}</a> at {{ $withdraw->confirmed_at }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin:withdraws.view', $withdraw->id) }}">
                        <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
