<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warung Madura | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('templates/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('templates/dist/css/adminlte.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Warung</b>MADURA</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan masuk</p>
                <form>
                    <div class="mb-3 col-12">
                        <a id="btnLogin" class="btn btn-primary btn-block">Login</a>
                    </div>
                </form>
                <script>
                    document.getElementById('btnLogin').addEventListener('click', function (event) {
                        event.preventDefault(); // Mencegah halaman berubah
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Anda berhasil login!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect ke halaman dashboard
                                window.location.href = '/dashboard';
                            }
                        });
                    });
                </script>
            </div>
        </div>
</body>

</html>
