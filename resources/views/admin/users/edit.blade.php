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

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Save</button>
            @if ($user->hasRole('admin'))
                <a href="{{route('admin:users.detachAdmin', $user->id)}}" class="btn btn-dark">Make User</a>
            @else
                <a href="{{route('admin:users.attachAdmin', $user->id)}}" class="btn btn-primary">Make Admin</a>
            @endif
            <a href="{{route('admin:users.delete', $user->id)}}" class="btn btn-danger">Delete</a>
        </div>

        <div class="form-group mt-5">
            <div class="alert alert-light">
                *We'll never share your personal info with anyone else.
            </div>
        </div>

    </form>

@endsection
