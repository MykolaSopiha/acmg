@extends('manager.layouts.app')


@section('content')
    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('manager:dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    <!-- Breadcrumbs end -->

    <form action="{{route('manager:user.update')}}" method="post" class="form">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"
                   placeholder="Адрес электронной почты">
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Nickname</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                   placeholder="Ваш никнейм на сайте">
            @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
            <label for="full_name">Full name*</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->full_name}}"
                   placeholder="Введите Ваше полное имя">
            @if ($errors->has('full_name'))
                <p class="text-danger">{{ $errors->first('full_name') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone">Phone*</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}"
                   placeholder="Контактный номер телефона">
            @if ($errors->has('phone'))
                <p class="text-danger">{{ $errors->first('phone') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('skype') ? ' has-error' : '' }}">
            <label for="skype">Skype*</label>
            <input type="text" class="form-control" id="skype" name="skype" value="{{$user->skype}}"
                   placeholder="Ваш никнейм в Skype">
            @if ($errors->has('skype'))
                <p class="text-danger">{{ $errors->first('skype') }}</p>
            @endif
        </div>

        <div class="form-group">
            <p>Referal key: <span class="badge badge-dark">{{Auth::user()->referer_key}}</span></p>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('manager:password.change') }}" class="btn btn-link">Reset password</a>
        </div>

        <div class="form-group mt-5">
            <div class="alert alert-light">
                *Not necessary<br>
                **We don't share your personal info with any other persons.
            </div>
        </div>

    </form>
@endsection
