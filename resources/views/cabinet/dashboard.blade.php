@extends('cabinet.layouts.app')


@section('content')
    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            Консоль
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-address-card-o"></i>
                    </div>
                    <div class="mr-5">Аккаунты: {{$accounts}}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('cabinet:accounts.index') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-money"></i>
                    </div>
                    <div class="mr-5">Баланс: {{$balance}}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('cabinet:wallet.index') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-credit-card"></i>
                    </div>
                    <div class="mr-5">Выведено денег: {{$withdraw}}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('cabinet:withdraws.index') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">Рефералы: {{$referals}}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('cabinet:users.index') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
    </div>
@endsection
