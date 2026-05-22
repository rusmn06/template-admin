<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
@include('partials.header') <!-- <head> & CSS -->

<body id="page-top">
    <div id="wrapper">

        @auth
        <!-- Sidebar dipanggil di sini, tanpa syarat role -->
        @include('partials.sidebar')
        @endauth

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @auth
                @include('partials.topbar')
                @endauth

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('partials.footer')
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf <!-- CSRF Token Diletakkan Di Sini -->
                        <button type="submit" class="btn btn-primary">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/sb-admin-2/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/sb-admin-2/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/sb-admin-2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/sb-admin-2/js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>