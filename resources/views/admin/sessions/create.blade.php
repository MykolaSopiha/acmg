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
        <li class="breadcrumb-item active">
            Create
        </li>
    </ol>
    <!-- Breadcrumbs end -->


    <!-- Form begin -->
    <form action="{{route('admin:sessions.store')}}" method="POST" class="form">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('account_id') ? ' has-error' : '' }}">
            <label for="account">Account</label>
            <select name="account_id" class="js-select" id="account" style="width: 100%;">
                <option value=""></option>
                @foreach($accounts as $account)
                    <option value="{{$account->id}}" {{(old('account_id') == $account->id) ? "selected" : ""}}>{{$account->user->name}} - {{$account->url}}</option>
                @endforeach
            </select>
            @if ($errors->has('account_id'))
                <p class="text-danger">{{ $errors->first('account_id') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
            <label for="start">Start</label>
            <input class="form-control" type="datetime-local" id="start" name="start" value="{{old('start')}}" placeholder="" required/>
            @if ($errors->has('start'))
                <p class="text-danger">{{ $errors->first('start') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
            <label for="end">End</label>
            <input class="form-control" type="datetime-local" id="end" name="end" value="{{old('end')}}" placeholder="" required/>
            @if ($errors->has('end'))
                <p class="text-danger">{{ $errors->first('end') }}</p>
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

        <div class="form-group text-center mt-5">
            <button class="btn btn-success">
                Save
            </button>
        </div>
    </form>
    <!-- Form end -->

@endsection


@push('scripts')
    <script>
    </script>
@endpush
