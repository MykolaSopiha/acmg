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
            <input type="text" class="form-control" id="profile_id" name="profile_id" value="{{$account->profile_id}}"
                   placeholder=""
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

        @foreach($account->timetable as $timetable)
            <div class="form-group{{ $errors->has('session_start.' . $timetable->id) ? ' has-error' : '' }}">
                <div class="d-flex justify-content-between">
                    <label for="session_start[{{ $timetable->id }}]">
                        Начало сессии #{{ $timetable->id - $account->timetable[0]->id + 1 }}
                        @if ($timetable->isFirst())
                            (с <strong>{{ config('accounts.sessions.first.start') }}</strong> до
                            <strong>{{ config('accounts.sessions.first.end') }}</strong>)
                        @elseif($timetable->isSecond())
                            (с <strong>{{ config('accounts.sessions.second.start') }}</strong> до
                            <strong>{{ config('accounts.sessions.second.end') }}</strong>)
                        @endif
                    </label>

                    @if($timetable->created_at != $timetable->updated_at)
                        <span class="text-success">
                            лимит изменений: {{ config('accounts.user_change_limit') - $timetable->user_changes }}
                        </span>
                    @endif
                </div>

                <input type="time" class="form-control" id="session_start[{{ $timetable->id }}]"
                       name="session_start[{{ $timetable->id }}]" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}"
                       value="{{ $timetable->start_time }}" placeholder="00:00"
                       {{(config('accounts.user_change_limit') <= $timetable->user_changes) ? "readonly" : ""}}>
                @if ($errors->has('session_start.' . $timetable->id))
                    <p class="text-danger">{{ $errors->first('session_start.' . $timetable->id) }}</p>
                @endif
            </div>
        @endforeach

        <div class="form-group text-center mt-5">
            <button class="btn btn-success">Сохранить</button>
            <a class="btn btn-link" href="{{ route('cabinet:accounts.index') }}">Назад</a>
        </div>
    </form>
    <!-- Form end -->

@endsection