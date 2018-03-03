@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            My Notifications
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    @foreach($notifications as $notification)
        @include('admin.partials.notifications.page.' . snake_case(class_basename($notification->type)))
    @endforeach

@endsection
