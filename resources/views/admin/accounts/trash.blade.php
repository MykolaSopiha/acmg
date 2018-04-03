@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin:accounts.index')}}">Accounts</a>
        </li>
        <li class="breadcrumb-item active">
            Trash List
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <header class="mb-4">
        <h1 class="">Trash List</h1>
        <a class="text-link" href="{{route('admin:accounts.index')}}">White List</a>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User</th>
            <th scope="col">TV ID*</th>
            <th scope="col">TV Pass*</th>
            <th scope="col">Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <td>{{$account->profile_id}}</td>
                <td>{{$account->user->name}}</td>
                <td>{{$account->viewer_id}}</td>
                <td>{{$account->viewer_pass}}</td>
                <td>
                    <span class="badge badge-secondary">{{$statuses[intval($account->status)]}}</span>
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

@endsection
