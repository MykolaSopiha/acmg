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
        <a href="{{ route('admin:sessions.create') }}">Create session</a>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Account</th>
            <th scope="col">Manager</th>
            <th scope="col">Status</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <td>{{$session->id}}</td>
                <td>{{$session->account->user->name}}</td>
                <td>
                    <a href="https://www.facebook.com/profile.php?id=100004092528536"{{$session->account->profile_id}}>
                        {{$session->account->profile_id}}
                    </a>
                </td>
                <td>{{$session->manager->name}}</td>
                <td>
                    @if($session->status == 'success')
                        <span class="badge badge-success">{{ $session->status }}</span>
                    @elseif ($session->status == 'expect')
                        <span class="badge badge-primary">{{ $session->status }}</span>
                    @elseif ($session->status == 'fail')
                        <span class="badge badge-danger">{{ $session->status }}</span>
                    @elseif ($session->status == 'trash')
                        <span class="badge badge-dark">{{ $session->status }}</span>
                    @endif
                </td>
                <td>{{$session->start}}</td>
                <td>{{$session->end}}</td>
                <td style="text-align: right;">
                    <a class="btn btn-link" href="{{route('admin:sessions.view', $session->id)}}">
                        <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $sessions->links() }}
@endsection
