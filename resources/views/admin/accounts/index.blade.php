@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Accounts
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <header class="mb-4">
        <h1 class="">Accounts List</h1>
        <a class="text-danger" href="{{route('admin:accounts.trashList')}}">Trash List</a>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User</th>
            <th scope="col" class="text-center">Access</th>
            <th scope="col">Status</th>
            <th scope="col">Manager</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <td>
                    <a href="https://www.facebook.com/profile.php?id={{$account->profile_id}}" target="_blank">
                        {{$account->profile_id}}
                    </a>
                </td>
                <td><a href="{{route('admin:users.view', $account->user->id)}}">{{$account->user->name}}</a></td>
                <td class="text-center">
                    @if ($account->viewer_id != '' && $account->viewer_pass != '')
                        <span class="text-success">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </span>
                    @else
                        <span class="text-secondary" data-toggle="tooltip" data-placement="bottom"
                              title="'Team Viewer ID' and 'Team Viewer Pass' fields are empty!">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </span>
                    @endif
                </td>
                <td>
                    @if ($account->confirmed_at)
                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip"
                                data-placement="bottom"
                                title="{{ "confirmed by ". $account->inspector->name . " at ".$account->confirmed_at }}">
                            confirmed
                        </button>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $statuses[$account->status] }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ($statuses as $key => $val)
                                    <a class="dropdown-item"
                                       href="{{ route('admin:accounts.setStatus', [$account->id, $key]) }}">{{ $val }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </td>
                <td style="vertical-align: middle">
                    @if (is_null($account->manager))
                        <p class="text-muted">nobody</p>
                    @else
                        <a class="btn btn-link" href="{{ route('admin:users.view', $account->manager->id) }}">{{ $account->manager->name }}</a>
                    @endif
                </td>
                <td style="text-align: right;">
                    <a class="btn btn-link" href="{{route('admin:accounts.view', $account->id)}}">
                        <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-link" href="{{route('admin:accounts.edit', $account->id)}}">
                        <i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-link" href="{{route('admin:accounts.delete', $account->id)}}">
                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $accounts->links() }}

    <p class="text-secondary">*TV - Team Viewer</p>

    {{--@include('admin.partials.modals.account_confirmation')--}}

@endsection
