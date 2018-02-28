@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Accounts
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <header class="mb-4">
        <h1 class="">Accounts List</h1>
        <a class="text-link" href="{{route('admin:accounts.create')}}">Add New Account</a>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
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
                <td>{{$account->id}}</td>
                <td>{{$account->user->name}}</td>
                <td>{{$account->viewer_id}}</td>
                <td>{{$account->viewer_pass}}</td>
                <td>{{$account->schedule}}</td>
                <td>{{$statuses[intval($account->status)]}}</td>
                <td style="text-align: right;">
                    <a class="btn btn-link" href="{{route('admin:accounts.edit', $account->id)}}">
                        <i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-link" href="{{route('admin:accounts.delete', $account->id)}}">
                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="text-secondary">*TV - Team Viewer</p>

@endsection
