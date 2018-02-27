@extends('cabinet.layouts.app')


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
            Create
        </li>
    </ol>
    <!-- Breadcrumbs end -->


    <!-- Form begin -->
    <form action="{{route('admin:accounts.store')}}" method="POST" class="form">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <label for="url">Url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{old('url')}}" placeholder="" required>
            @if ($errors->has('url'))
                <p class="text-danger">{{ $errors->first('url') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
            <label for="user">Owner</label>
            <select name="user_id" id="user" class="js-select" style="width: 100%;">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('user_id'))
                <p class="text-danger">{{ $errors->first('user_id') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('viewer_id') ? ' has-error' : '' }}" required>
            <label for="viewer_id">Team Viewer ID</label>
            <input type="text" class="form-control" id="viewer_id" name="viewer_id"
                   value="{{old('viewer_id')}}" placeholder="">
            @if ($errors->has('viewer_id'))
                <p class="text-danger">{{ $errors->first('viewer_id') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('viewer_pass') ? ' has-error' : '' }}" required>
            <label for="viewer_pass">Team Viewer Password</label>
            <input type="text" class="form-control" id="viewer_pass" name="viewer_pass"
                   value="{{old('viewer_pass')}}" placeholder="">
            @if ($errors->has('viewer_pass'))
                <p class="text-danger">{{ $errors->first('viewer_pass') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('schedule') ? ' has-error' : '' }}">
            <label for="schedule">Schedule</label>
            <textarea cols="1000" rows="3" class="form-control" id="schedule" name="schedule" placeholder=""
                      required>{{old('schedule')}}</textarea>
            @if ($errors->has('schedule'))
                <p class="text-danger">{{ $errors->first('schedule') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
            <label for="comment">Comment</label>
            <textarea cols="1000" rows="3" class="form-control" id="comment" name="comment" placeholder=""
                      required>{{old('comment')}}</textarea>
            @if ($errors->has('comment'))
                <p class="text-danger">{{ $errors->first('comment') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status">Status</label>
            <select name="status" id="status" class="js-select" style="width: 100%;">
                @foreach($statuses as $key => $val)
                    <option value="{{$key}}">{{$val}}</option>
                @endforeach
            </select>
            @if ($errors->has('comment'))
                <p class="text-danger">{{ $errors->first('comment') }}</p>
            @endif
        </div>

        <div class="form-group text-center mt-5">
            <button class="btn btn-success">
                Save
            </button>
        </div>
    </form>
    <!-- Form end -->

@endsection
