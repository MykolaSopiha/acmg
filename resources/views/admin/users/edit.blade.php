@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin:users.index')}}">Users</a>
        </li>
        <li class="breadcrumb-item">
            {{$user->name}}
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <form action="{{route('admin:users.update', $user->id)}}" method="post" class="form">

        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"
                   placeholder="Enter email">
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Nickname</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                   placeholder="Enter your nickname">
            @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->full_name}}"
                   placeholder="Enter your full name">
            @if ($errors->has('full_name'))
                <p class="text-danger">{{ $errors->first('full_name') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}"
                   placeholder="Enter your phone number">
            @if ($errors->has('phone'))
                <p class="text-danger">{{ $errors->first('phone') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('skype') ? ' has-error' : '' }}">
            <label for="skype">Skype</label>
            <input type="text" class="form-control" id="skype" name="skype" value="{{$user->skype}}"
                   placeholder="Enter your Skype nickname">
            @if ($errors->has('skype'))
                <p class="text-danger">{{ $errors->first('skype') }}</p>
            @endif
        </div>

        <div class="form-group">
            <p>Referal Key: <span class="badge badge-dark">{{$user->referer_key}}</span></p>
        </div>

        @if ($user->parent_id)
            <div class="form-group">
                <p>Patron: <a class="badge badge-info" href="{{ route('admin:users.view', $user->getParent()->id) }}">{{$user->getParent()->name}}</a></p>
            </div>
        @endif

        <div class="form-group">Set role:&nbsp;
            <div class="btn-group">
                @if ($user->hasRole('admin'))
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </button>
                @elseif ($user->hasRole('manager'))
                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manager
                    </button>
                @else
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User
                    </button>
                @endif
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin:users.makeAdmin', $user->id) }}">Admin</a>
                    <a class="dropdown-item" href="{{ route('admin:users.makeManager', $user->id) }}">Manager</a>
                    <a class="dropdown-item" href="{{ route('admin:users.makeUser', $user->id) }}">User</a>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{route('admin:users.delete', $user->id)}}" class="btn btn-danger">Delete</a>
        </div>

        <div class="form-group mt-5">
            <div class="alert alert-light">
                *We'll never share your personal info with anyone else.
            </div>
        </div>

    </form>

@endsection
