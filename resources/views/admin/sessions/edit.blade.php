@extends('admin.layouts.app')


@section('content')
    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:sessions.index')}}">Sessions</a>
        </li>
        <li class="breadcrumb-item">
            id
        </li>
    </ol>
    <!-- Breadcrumbs end -->
@endsection
