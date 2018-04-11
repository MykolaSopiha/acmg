@extends('manager.layouts.app')


@section('content')
    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('manager:dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('manager:user.view') }}">Profile</a>
        </li>
        <li class="breadcrumb-item active">
            Reset Password
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <form action="{{route('manager:password.save')}}" method="post" class="form">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
            <label for="old_password">Old password</label>
            <input type="password" class="form-control" id="old_password" name="old_password">
            @if ($errors->has('old_password'))
                <p class="text-danger">{{ $errors->first('old_password') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">New password</label>
            <input type="password" class="form-control" id="password" name="password">
            @if ($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
                <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('manager:user.view') }}" class="btn btn-link">Back</a>
        </div>

    </form>
@endsection
