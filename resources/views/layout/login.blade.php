<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Sistem Informasi Arsip</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('style/') }}assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/chosen/chosen.min.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>


<body class="">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <div class="container">
                        <h3> Sistem Informasi Arsip</h3>
                    </div>
                    <div><br></div>
                    <a href="">
                        <img class="align-content" src="{{ asset('style/images/logo.png') }}" style="width: 50%;" alt="">
                    </a>

                </div>
                <div class="login-form">
                    @if (session('status'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- <form method="POST" action="{{route('login')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user_name" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="user_password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">

                            <label class="pull-right">
                                <a href="/reset">Reset Password?</a>
                            </label>

                        </div>
                        <button type="submit" id="btn-submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                    </form> -->
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">

                        <label class="pull-right">
                            <a href="/reset">Reset Password?</a>
                        </label>

                    </div>
                    <button class=" btn btn-submit btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
    <!-- data table -->
    <script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/datatables-init.js') }}"></script>
    <!-- data table -->

    <script src="{{ asset('style/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('style/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

</body>

</html>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("div.alert").remove();
        }, 2000);
    });
    $(".btn-submit").on("click", function() {
        var user_name = $("#user_name").val();
        var password = $("#user_password").val();
        var token = $("meta[name='csrf-token']").attr("content");
        if (user_name.length == "") {

            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Username Wajib Di isi !'
            });

        } else if (password.length == "") {

            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Password Wajib Di isi !'
            });

        } else {
            $.ajax({

                url: "{{ route('login') }}",
                type: "POST",
                dataType: "JSON",
                cache: false,
                data: {
                    "user_name": user_name,
                    "user_password": password,
                    "_token": token
                },

                success: function(response) {

                    if (response.success) {

                        Swal.fire({
                                type: 'success',
                                title: 'Berhasil Login!',
                                text: 'Please Wait !',
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                            .then(function() {
                                window.location.href = "{{ route('/') }}";
                            });

                    }
                    console.log(response);

                },

                error: function(response) {

                    Swal.fire({
                        type: 'error',
                            title: 'Gagal Login !',
                            text: 'silahkan cek lagi username atau password!'
                    });

                    console.log(response);

                }

            });

        }

    });
</script>