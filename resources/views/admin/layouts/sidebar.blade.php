<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('admin:dashboard')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('admin:accounts.index')}}">
            <i class="fa fa-address-card-o"></i>
            <span class="nav-link-text">Accounts</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
        <a class="nav-link" href="{{route('admin:countries.index')}}">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="nav-link-text">Countries</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="{{route('admin:currencies.index')}}">
            <i class="fa fa-usd" aria-hidden="true"></i>
            <span class="nav-link-text">Currencies</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link active" href="{{route('admin:payments.index')}}">
            <i class="fa fa-money" aria-hidden="true"></i>
            <span class="nav-link-text">Payments</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="{{route('admin:deposits.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#868e96" width="1em" height="1em" viewBox="0 0 511.999 511.999">
                <path d="M468.549 79.082h-16.923l-26.2-73.531-206.36 73.531H43.45C19.492 79.082 0 98.574 0 122.532v340.464c0 23.959 19.492 43.451 43.45 43.451h425.099c23.959 0 43.45-19.492 43.45-43.451V122.532c.001-23.958-19.491-43.45-43.45-43.45zm-61.567-34.668l12.353 34.669H309.688l97.294-34.669zm74.601 418.583c0 7.187-5.847 13.034-13.033 13.034H43.45c-7.187 0-13.033-5.847-13.033-13.034V122.532c0-7.187 5.847-13.033 13.033-13.033h425.099c7.187 0 13.033 5.847 13.033 13.033v105.001H335.367c-23.959 0-43.45 19.492-43.45 43.451v43.562c0 23.959 19.492 43.45 43.45 43.45h146.216v105.001zm0-135.418H335.367c-7.187 0-13.033-5.847-13.033-13.033v-43.562c0-7.187 5.847-13.034 13.033-13.034h146.216v69.629z"/>
                <circle cx="357.342" cy="292.765" r="20.094"/>
            </svg>
            <span class="nav-link-text">Deposits</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="{{route('admin:sessions.index')}}">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <span class="nav-link-text">Sessions</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="{{route('admin:users.index')}}">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">Users</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="{{route('admin:withdraws.index')}}">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <span class="nav-link-text">Withdraws</span>
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
