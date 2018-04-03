<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('manager:dashboard') }}">{{config('app.name')}}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!-- Navigation BEGIN-->
{{--        @include('manager.layouts.sidebar')--}}
        <!-- Navigation END-->

        <ul class="navbar-nav ml-auto">
            @if (count(Auth::user()->unreadNotifications) > 0)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="d-lg-none">Alerts <span class="badge badge-pill badge-warning">{{count(Auth::user()->unreadNotifications)}} New</span></span>
                        <span class="indicator text-warning d-none d-lg-block"><i class="fa fa-fw fa-circle"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">New Alerts:</h6>
                        <div class="dropdown-divider"></div>
                        @foreach(Auth::user()->unreadNotifications as $notification)
                            @include('admin.partials.notifications.dropdown.' . snake_case(class_basename($notification->type)))
                            <div class="dropdown-divider"></div>
                        @endforeach
                        <a class="dropdown-item small text-info" href="{{route('admin:notifications.index')}}">View all alerts</a>
                    </div>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsEmpty" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="d-lg-none">
                            Notifications
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsEmpty">
                        <h6 class="dropdown-header">No Alerts:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item mt-3 mb-3" href="#">
                            <div class="dropdown-message small">You haven't any new notifications.</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small text-info" href="{{route('admin:notifications.index')}}">View previous alerts</a>
                    </div>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav d-flex flex-row justify-content-around">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin:user.view')}}">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>&nbsp;Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
