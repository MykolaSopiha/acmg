@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
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
    <form class="form">

        <div class="form-group">
            <label for="profile_id">ID</label>
            <input type="text" id="profile_id" class="form-control" value="{{$account->profile_id}}" readonly>
        </div>

        <div class="form-group">
            <label for="user">Owner</label>
            <input type="text" id="user" class="form-control" value="{{$account->user->name}}" placeholder="Account User" readonly>
        </div>

        <div class="form-group{{ $errors->has('viewer_id') ? ' has-error' : '' }}">
            <label for="viewer_id">Team Viewer ID</label>
            <input type="text" id="viewer_id" class="form-control" value="{{$account->viewer_id}}" readonly>
        </div>

        <div class="form-group{{ $errors->has('viewer_pass') ? ' has-error' : '' }}" >
            <label for="viewer_pass">Team Viewer Password</label>
            <input type="text" id="viewer_pass" class="form-control" value="{{$account->viewer_pass}}" readonly>
        </div>

        <div class="form-group{{ $errors->has('schedule') ? ' has-error' : '' }}">
            <label for="schedule">Schedule</label>
            <textarea cols="1000" rows="3" class="form-control" id="schedule" readonly>{{$account->schedule}}</textarea>
        </div>

        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
            <label for="comment">Comment</label>
            <textarea cols="1000" rows="3" class="form-control" id="comment" readonly>{{$account->comment}}</textarea>
        </div>

        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status">Status</label>
            <input type="text" id="status" class="form-control" value="{{$statuses[$account->status]}}" readonly>
        </div>

        @if ($account->isConfirmed())
            <div class="form-group">
                confirmed by
                <a href="{{ route('admin:users.view', $account->confirmed_by) }}">{{ $account->inspector->name }}</a>
                at {{ $account->confirmed_at }}
            </div>
        @endif

        <div class="form-group text-center mt-5">
            <button class="btn btn-success">Save</button>
            <a href="{{route('admin:accounts.edit', $account->id)}}" class="btn btn-warning">Edit</a>
            @if (!$account->isConfirmed())
                <a href="{{route('admin:accounts.confirm', $account->id)}}" class="btn btn-primary">Confirm</a>
            @endif
        </div>
    </form>
    <!-- Form end -->

@endsection
