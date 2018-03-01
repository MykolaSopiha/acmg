@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Sessions
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <header class="mb-4">
        <h1 class="">Sessions List</h1>
        <a class="text-link" href="{{route('admin:sessions.create')}}">Add New Session</a>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Account</th>
            <th scope="col">Manager</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
            <th scope="col"></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <td>{{$session->id}}</td>
                <td>{{$session->account->user->name}}</td>
                <td>{{$session->account->url}}</td>
                <td>{{$session->manager->name}}</td>
                <td>{{$session->start}}</td>
                <td>{{$session->end}}</td>
                <td style="text-align: right;">
                    <a class="btn btn-link" href="{{route('admin:sessions.view', $session->id)}}">
                        <i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-link" href="{{route('admin:sessions.delete', $session->id)}}">
                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
