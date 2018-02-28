@extends('cabinet.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Консоль</a>
        </li>
        <li class="breadcrumb-item active">
            Аккаунты
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <section class="mb-3 border-bottom">
        <header class="mb-4">
            <h1>Мои аккаунты</h1>
            <a class="text-link" href="{{route('cabinet:accounts.create')}}">Добавить новый аккаунт</a>
        </header>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Url</th>
                <th scope="col">TV ID*</th>
                <th scope="col">TV Pass*</th>
                <th scope="col">Рассписание</th>
                <th scope="col">Статус</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{$account->user->name}}</td>
                    <td>{{$account->viewer_id}}</td>
                    <td>{{$account->viewer_pass}}</td>
                    <td>{{$account->schedule}}</td>
                    <td>{{$statuses[$account->status]}}</td>
                    <td style="text-align: right;">
                        <a class="btn btn-link" href="{{route('cabinet:accounts.edit', $account->id)}}">
                            <i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-link" href="{{route('cabinet:accounts.delete', $account->id)}}">
                            <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

    <p class="text-secondary">*TV - Team Viewer</p>

@endsection
