<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{config('app.name')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="{{url('vendor/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Select2 Bootstrap 4 Style CSS -->
    <link href="{{url('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="bg-dark">

    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src={{url("vendor/jquery/jquery.min.js")}}></script>
    <script src={{url("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <script src="{{url("js/app.js")}}"></script>
    @stack('scripts')

</body>
</html>
