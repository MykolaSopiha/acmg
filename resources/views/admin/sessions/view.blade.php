@extends('admin.layouts.app')


@section('content')
    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin:sessions.index')}}">Sessions</a>
        </li>
        <li class="breadcrumb-item">
            #{{ $session->id }}
        </li>
    </ol>
    <!-- Breadcrumbs end -->


    <form class="form">

        <div class="form-group">
            <label for="account">Account ID</label>
            <input type="text" class="form-control" id="account" name="account"
                   value="{{$session->account->profile_id}}" readonly>
        </div>

        <div class="form-group">
            <label for="manager">Manager</label>
            <input type="text" class="form-control" id="manager" name="manager" value="{{$session->manager->name}}"
                   readonly>
        </div>

        <div class="form-group">
            <label for="start">Start</label>
            <input type="text" class="form-control" id="start" name="start" value="{{$session->start}}" readonly>
        </div>

        <div class="form-group">
            <label for="end">End</label>
            <input type="text" class="form-control" id="end" name="end" value="{{$session->end}}" readonly>
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" name="comment" id="comment" cols="30" rows="3" readonly>
                {{ $session->comment }}
            </textarea>
        </div>

        <div class="form-group text-center">
            <a href="{{route('admin:sessions.index')}}" class="btn btn-primary">Back</a>
            <a href="{{route('admin:sessions.edit', $session->id)}}" class="btn btn-warning">Edit</a>
        </div>

    </form>

@endsection
