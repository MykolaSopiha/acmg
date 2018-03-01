<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('admin:dashboard')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
        <a class="nav-link" href="{{route('admin:users.index')}}">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">Users</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="{{route('admin:accounts.index')}}">
            <i class="fa fa-address-card-o" aria-hidden="true"></i>
            <span class="nav-link-text">Accounts</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="{{route('admin:sessions.index')}}">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <span class="nav-link-text">Sessions</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="{{route('admin:payments.index')}}">
            <i class="fa fa-money" aria-hidden="true"></i>
            <span class="nav-link-text">Payments</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="{{route('admin:withdrawals.index')}}">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <span class="nav-link-text">Withdraw</span>
        </a>
    </li>

</ul>
<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>
