@extends('cabinet.layouts.app')


@section('content')
    <h3>Заявка на вывод денежных средств из системы</h3>

    <!-- Form begin -->
    <form action="{{route('cabinet:withdraws.store')}}" method="POST" class="form">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
            <label for="amount">Объем ({{ Auth::user()->wallet->currency->code }}):</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{Auth::user()->wallet->balance}}" readonly>
            @if ($errors->has('amount'))
                <p class="text-danger">{{ $errors->first('amount') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('card_number') ? ' has-error' : '' }}" required>
            <label for="card_number">Номер карты:</label>
            <input type="text" class="form-control numberInput" id="card_number" name="card_number"
                   value="{{old('card_number')}}" data-inputmask="'mask': '9999 9999 9999 9999'">
            @if ($errors->has('card_number'))
                <p class="text-danger">{{ $errors->first('card_number') }}</p>
            @endif
        </div>

        <div class="form-group text-center mt-5">
            <button class="btn btn-success">
                Сохранить
            </button>
        </div>
    </form>
    <!-- Form end -->
@endsection
