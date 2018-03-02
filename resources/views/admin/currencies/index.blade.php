@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Currencies
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <header class="mb-4">
        <h1 class="">Currencies List</h1>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
        </tr>
        </thead>
        <tbody>
        @foreach($currencies as $currency)
            <tr>
                <td>{{$currency->id}}</td>
                <td>{{$currency->name}}</td>
                <td>{{$currency->code}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
