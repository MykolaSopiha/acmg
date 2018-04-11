@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Countries
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <header class="mb-4">
        <h1 class="">Countries List</h1>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Currency</th>
        </tr>
        </thead>
        <tbody>
        @foreach($countries as $country)
            <tr>
                <td>{{$country->id}}</td>
                <td>{{$country->name}}</td>
                <td>{{$country->currency->code}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
