@extends('cabinet.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Консоль</a>
        </li>
        <li class="breadcrumb-item active">
            Рефералы
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <h1 class="mb-3">Мои рефералы</h1>

    <div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
            {{--<th scope="col">#ID</th>--}}
            <th scope="col">Никнейм</th>
            <th scope="col">Email</th>
            <th scope="col">Телефон</th>
        </tr>
        </thead>
        <tbody>
        @foreach($referals as $user)
            <tr>
                {{--<td>{{$user->id}}</td>--}}
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                {{--<td style="text-align: right;">--}}
                    {{--<a class="btn btn-link" href="{{route('admin:users.accounts', $user->id)}}">--}}
                        {{--<i class="fa fa-money fa-lg" aria-hidden="true"></i>--}}
                    {{--</a>--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--<a class="btn btn-link" href="{{route('admin:users.edit', $user->id)}}">--}}
                        {{--<i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i>--}}
                    {{--</a>--}}
                    {{--<a class="btn btn-link" href="{{route('admin:users.delete', $user->id)}}">--}}
                        {{--<i class="fa fa-trash fa-lg" aria-hidden="true"></i>--}}
                    {{--</a>--}}
                {{--</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection
