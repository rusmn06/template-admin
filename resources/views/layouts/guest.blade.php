<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Guest') - Admin Project</title>

    <!-- Font Awesome -->
    <link href="{{ asset('assets/sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- SB Admin 2 base styles -->
    <link href="{{ asset('assets/sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom theme -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body class="auth-page">

    <div class="auth-container">
    @yield('content')
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/sb-admin-2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>