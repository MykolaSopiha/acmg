@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin:accounts.index')}}">Accounts</a>
        </li>
        <li class="breadcrumb-item active">
            {{$account->id}}
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <!-- Form begin -->
    <form action="{{route('admin:accounts.update', $account->id)}}" method="POST" class="form">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('profile_id') ? ' has-error' : '' }}">
            <label for="profile_id">ID</label>
            <input type="text" class="form-control" id="profile_id" name="profile_id" value="{{$account->profile_id}}"
                   placeholder=""
                   required>
            @if ($errors->has('profile_id'))
                <p class="text-danger">{{ $errors->first('profile_id') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
            <label for="user">Owner</label>
            <select name="user_id" id="user" class="js-select" style="width: 100%;">
                @foreach($users as $user)
                    <option value="{{$user->id}}" {{($user->id == $account->user_id) ? "selected" : ""}}>{{$user->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('user_id'))
                <p class="text-danger">{{ $errors->first('user_id') }}</p>
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
            <label for="schedule">Schedule</label>
            <textarea cols="1000" rows="3" class="form-control" id="schedule" name="schedule" placeholder=""
                      required>{{$account->schedule}}</textarea>
            @if ($errors->has('schedule'))
                <p class="text-danger">{{ $errors->first('schedule') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
            <label for="comment">Comment</label>
            <textarea cols="1000" rows="3" class="form-control" id="comment" name="comment"
                      placeholder="">{{$account->comment}}</textarea>
            @if ($errors->has('comment'))
                <p class="text-danger">{{ $errors->first('comment') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status">Status</label>
            @if ($account->isConfirmed())
                <div class="form-group">
                    confirmed by
                    <a href="{{ route('admin:users.view', $account->confirmed_by) }}">{{ $account->inspector->name }}</a>
                    at {{ $account->confirmed_at }}
                </div>
            @else
                <select name="status" id="status" class="js-select" style="width: 100%;">
                    @foreach($statuses as $key => $val)
                        <option value="{{$key}}" {{($key == $account->status) ? "selected" : ""}}>{{$val}}</option>
                    @endforeach
                </select>
                @if ($errors->has('comment'))
                    <p class="text-danger">{{ $errors->first('comment') }}</p>
                @endif
            @endif
        </div>

        <div class="form-group text-center mt-5">
            <a href="{{ route('admin:accounts.trashList') }}" class="btn btn-primary">Back</a>
            <a href="#" class="btn btn-success">Restore</a>
        </div>
    </form>
    <!-- Form end -->

@endsection
