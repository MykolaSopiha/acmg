<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="{{url('vendor/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Select2 Bootstrap 4 Style CSS -->
    <link href="{{url('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}" rel="stylesheet">
    <!-- DateTimePicker -->
    <link href="{{asset('vendor/jquery-datetimepicker/jquery.datetimepicker.min.css')}}">
    <!-- Custom styles for this template-->
    <link href="{{url('css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<!-- Navigation BEGIN-->
@include('cabinet.layouts.navbar')
<!-- Navigation END-->

<!-- Navigation BEGIN-->
<div class="content-wrapper">
    <div class="container-fluid">
        @yield('content')
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © {{config('app.name')}} 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Уверены, что хотите выйти?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Нажмите книпку "Выход", если вы хотите завершить текущую сессию.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
                    <a class="btn btn-primary" href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src={{url("vendor/jquery/jquery.min.js")}}></script>
    <!-- Bootstrap core JavaScript-->
    <script src={{url("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <!-- Core plugin JavaScript -->
    <script src={{url("js/jquery.easing.min.js")}}></script>
    <!-- RobinHerbots/Inputmask JavaScript -->
    <script src={{url("vendor/inputmask/jquery.inputmask.bundle.min.js")}}></script>
    <!-- Page level plugin JavaScript -->
    <script src={{url("vendor/datatables/js/jquery.dataTables.js")}}></script>
    <script src={{url("vendor/datatables/js/dataTables.bootstrap4.js")}}></script>
    <!-- DateTimePicker -->
    <script src="{{asset('vendor/jquery-datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>
    <!-- Custom scripts for all pages -->
    <script src="{{url("js/sb-admin.min.js")}}"></script>
    <!-- Custom scripts for this site-->
    <script src="{{url("js/app.js")}}"></script>
    <script>
        $('#toggleNavPosition').click(function () {
            $('body').toggleClass('fixed-nav');
            $('nav').toggleClass('fixed-top static-top');
        });

    </script>
    <!-- Toggle between dark and light navbar-->
    <script>
        $('#toggleNavColor').click(function () {
            $('nav').toggleClass('navbar-dark navbar-light');
            $('nav').toggleClass('bg-dark bg-light');
            $('body').toggleClass('bg-dark bg-light');
        });

    </script>
</div>
<!-- Navigation END-->

@stack('scripts')
</body>
</html>
