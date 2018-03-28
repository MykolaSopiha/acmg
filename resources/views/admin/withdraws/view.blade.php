@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin:withdraws.index')}}">Withdraws</a>
        </li>
        <li class="breadcrumb-item">
            #{{$withdraw->id}}
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <form class="form">

        <div class="form-group">
            <label for="created_at">Created at:</label>
            <input type="text" class="form-control" id="created_at" name="created_at" value="{{$withdraw->created_at}}"
                   readonly>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" id="amount" value="{{$withdraw->amount. " " . $withdraw->wallet->currency->code}}"
                   placeholder="Withdraw amount" readonly>
        </div>

        <div class="form-group">
            <label for="user">User</label>
            <input type="text" class="form-control" id="user" value="{{$withdraw->wallet->user->name}}"
                   placeholder="User name" readonly>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" id="amount" value="{{$withdraw->amount. " " . $withdraw->wallet->currency->code}}"
                   placeholder="Withdraw amount" readonly>
        </div>

        @if ($withdraw->isConfirmed())
            <div class="form-group">
                Confirmed by <a href="{{ route('admin:users.view', $withdraw->inspector->id) }}">{{ $withdraw->inspector->name }}</a> at {{ $withdraw->confirmed_at }}
            </div>
        @endif

        <div class="form-group text-center">
            <a href="{{route('admin:withdraws.index')}}" class="btn btn-primary">All Withdraws</a>
            @if (!$withdraw->isConfirmed())
                <a href="{{route('admin:withdraws.confirm', $withdraw->id)}}" class="btn btn-success">Confirm</a>
            @endif
        </div>

        <div class="form-group mt-5">
            <div class="alert alert-light">
                *We'll never share your personal info with anyone else.
            </div>
        </div>

    </form>

@endsection