@extends('cabinet.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Консоль</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:accounts.index')}}">Аккаунты</a>
        </li>
        <li class="breadcrumb-item active">
            {{$account->profile_id}}
        </li>
    </ol>
    <!-- Breadcrumbs end -->


    <!-- Form begin -->
    <form action="{{route('cabinet:accounts.update', $account->id)}}" method="POST" class="form">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('profile_id') ? ' has-error' : '' }}">
            <label for="profile_id">ID Аккаунта</label>
            <input type="text" class="form-control" id="profile_id" name="profile_id" value="{{$account->profile_id}}" placeholder=""
                   readonly>
            @if ($errors->has('profile_id'))
                <p class="text-danger">{{ $errors->first('profile_id') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('viewer_id') ? ' has-error' : '' }}" required>
            <label for="viewer_id">Team Viewer ID</label>
            <input type="text" class="form-control" id="viewer_id" name="viewer_id"
                   value="{{$account->viewer_id}}" placeholder="">
            @if ($errors->has('viewer_id'))
                <p class="text-danger">{{ $errors->first('viewer_id') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('viewer_pass') ? ' has-error' : '' }}" required>
            <label for="viewer_pass">Team Viewer Password</label>
            <input type="text" class="form-control" id="viewer_pass" name="viewer_pass"
                   value="{{$account->viewer_pass}}" placeholder="">
            @if ($errors->has('viewer_pass'))
                <p class="text-danger">{{ $errors->first('viewer_pass') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('schedule') ? ' has-error' : '' }}">
            <label for="schedule">Рассписание</label>
            <textarea cols="1000" rows="3" class="form-control" id="schedule" name="schedule" placeholder=""
                      required>{{$account->schedule}}</textarea>
            @if ($errors->has('schedule'))
                <p class="text-danger">{{ $errors->first('schedule') }}</p>
            @endif
        </div>

        <div class="form-group text-center mt-5">
            <button class="btn btn-success">Сохранить</button>
            <a class="btn btn-link" href="{{ route('cabinet:accounts.index') }}">Назад</a>
        </div>
    </form>
    <!-- Form end -->

@endsection
