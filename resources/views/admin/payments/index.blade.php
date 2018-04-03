@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Payments
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <header class="mb-4">
        <h1 class="">Payments List</h1>
{{--        <a class="text-link" href="{{route('admin:payments.create')}}">Add New Payments & Country</a>--}}
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Country</th>
            <th scope="col">Amount</th>
            <th scope="col">Type</th>
            <th scope="col">Label</th>
            <th scope="col">Description</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{$payment->id}}</td>
                <td>{{$payment->country->name}}</td>
                <td>{{$payment->amount}}&nbsp;{{$payment->country->currency->symbol}}</td>
                <td>{{$payment->paymentType->name}}</td>
                <td>{{$payment->paymentType->label}}</td>
                <td>{{$payment->paymentType->description}}</td>
                <td>
                    <a class="btn btn-link" href="{{ route('admin:payments.edit', $payment->id) }}">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
