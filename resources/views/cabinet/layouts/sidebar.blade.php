<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('cabinet:accounts.index')}}">
            <i class="fa fa-fw fa-address-card-o"></i>
            <span class="nav-link-text">Аккаунты</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('cabinet:wallet.index')}}">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">Баланс</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('cabinet:withdraws.index')}}">
            <i class="fa fa-fw fa-credit-card"></i>
            <span class="nav-link-text">Вывод денег</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ route('cabinet:users.index') }}">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Рефералы</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-question-circle"></i>
            <span class="nav-link-text">Справка</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
                <a href="{{route('cabinet:docs.start')}}">Quick Start</a>
            </li>
            <li>
                <a href="{{route('cabinet:docs.faq')}}">FAQ</a>
            </li>
        </ul>
    </li>
</ul>
<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>
