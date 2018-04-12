<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">{{config('app.name')}}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!-- Navigation BEGIN-->
        @include('cabinet.layouts.sidebar')
        <!-- Navigation END-->

        {{--<ul class="navbar-nav ml-auto">--}}
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--<i class="fa fa-question-circle-o" aria-hidden="true"></i>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">--}}
                    {{--<a class="dropdown-item small text-primary" href="{{ route('cabinet:docs.start') }}">Быстрый старт</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item small text-primary" href="{{ route('cabinet:docs.faq') }}">FAQ</a>--}}
                {{--</div>--}}
            {{--</li>--}}
        {{--</ul>--}}

        <ul class="navbar-nav ml-auto d-flex flex-row justify-content-around">
            <li class="nav-item">
                <a class="nav-link" href="{{route('cabinet:user.view')}}">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Профиль
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>&nbsp;Выход
                </a>
            </li>
        </ul>
    </div>
</nav>
