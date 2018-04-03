@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin:users.view', $user->id) }}">{{ $user->name }}</a>
        </li>
        <li class="breadcrumb-item active">
            Accounts
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <header class="mb-4">
        <h1 class="">Accounts List</h1>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">TV ID*</th>
            <th scope="col">TV Pass*</th>
            <th scope="col">Schedule</th>
            <th scope="col">Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <td>{{$account->profile_id}}</td>
                <td>{{$account->viewer_id}}</td>
                <td>{{$account->viewer_pass}}</td>
                <td>{{$account->schedule}}</td>
                <td>
                    @if (is_null($account->confirmed_at))
                        <a href="{{ route('admin:accounts.confirm', $account->id) }}" class="btn btn-success">confirm</a>
                    @else
                        <span class="text-dark">confirmed</span>
                    @endif
                </td>
                <td style="text-align: right;">
                    <a class="btn btn-link" href="{{route('admin:accounts.view', $account->id)}}">
                        <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="text-secondary">*TV - Team Viewer</p>

    {{--@include('admin.partials.modals.account_confirmation')--}}

@endsection
