@extends('cabinet.layouts.app')


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

    <form class="form">

        {!! csrf_field() !!}

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"
                   placeholder="Enter email" readonly>
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="name">Nickname</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                   placeholder="Enter your nickname" readonly>
            @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->full_name}}"
                   placeholder="Enter your full name" readonly>
            @if ($errors->has('full_name'))
                <p class="text-danger">{{ $errors->first('full_name') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}"
                   placeholder="Enter your phone number" readonly>
            @if ($errors->has('phone'))
                <p class="text-danger">{{ $errors->first('phone') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="skype">Skype</label>
            <input type="text" class="form-control" id="skype" name="skype" value="{{$user->skype}}"
                   placeholder="Enter your Skype nickname" readonly>
            @if ($errors->has('skype'))
                <p class="text-danger">{{ $errors->first('skype') }}</p>
            @endif
        </div>

        <div class="form-group">
            <p>Referal Key: <span class="badge badge-dark">{{$user->referer_key}}</span></p>
        </div>

        <div class="form-group text-center">
            <a href="{{route('admin:users.index')}}" class="btn btn-primary">Back</a>
            <a href="{{route('admin:users.delete', $user->id)}}" class="btn btn-danger">Delete</a>
        </div>

        <div class="form-group mt-5">
            <div class="alert alert-light">
                *We'll never share your personal info with anyone else.
            </div>
        </div>

    </form>

@endsection
