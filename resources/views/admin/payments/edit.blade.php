@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin:payments.index')}}">Payments</a>
        </li>
        <li class="breadcrumb-item">
            {{$payment->country->name . " - " . $payment->paymentType->label}}
        </li>
    </ol>
    <!-- Breadcrumbs end -->


    <!-- Form begin -->
    <form action="{{route('admin:payments.update', $payment->id)}}" method="POST" class="form">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
            <label for="amount">Amount</label>
            <input type="text" class="form-control numberInput" id="amount" name="amount" value="{{$payment->amount}}"
                   placeholder="" required>
            @if ($errors->has('amount'))
                <p class="text-danger">{{ $errors->first('amount') }}</p>
            @endif
        </div>

        <div class="form-group text-center mt-5">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('admin:payments.index') }}" class="btn btn-link">Back</a>
        </div>
    </form>
    <!-- Form end -->

@endsection