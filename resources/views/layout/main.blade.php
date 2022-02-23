<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Arsip</title>
    <link href="{{ asset('style/images/logo.png') }}" rel="icon" type="image/png">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/chosen/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/widgets.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="{{ asset('style/assets/ckeditor/ckeditor.js')}}"></script>
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
    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>




</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/"><img src="{{ asset('style/images/logo.png') }}" style="height: 100px; padding: 10px;" alt="Logo"></a>
                <a class="navbar-brand hidden" href="/"><img src="{{ asset('style/images/logo.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/"> <i class="menu-icon fa fa-desktop"></i>HOME </a>
                    </li>
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                    @php
                    $role = Session::get('user_role');
                    if($role == "Admin"){
                    @endphp
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-sitemap"></i>Prodi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-menu-alt"></i><a href="{{route('prodi.index')}}">List Prodi</a></li>
                            <li><i class="fa fa-trash"></i><a href="{{route('prodi.trash')}}">Unactived Prodi</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-user"></i>Dosen</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-menu-alt"></i><a href="{{route('dosen.index')}}">List Dosen</a></li>
                            <li><i class="fa fa-trash"></i><a href="{{route('dosen.trash')}}">Unactived Dosen</a></li>
                        </ul>
                    </li>
                    @php
                    }
                    @endphp
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-folder"></i>Surat</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-download"></i><a href="/surat-masuk">Surat Masuk</a></li>
                            <li><i class="fa fa-upload"></i><a href="{{route('sk.index')}}">Surat Keluar</a></li>
                        </ul>
                    </li>

                    @php
                    $role = Session::get('user_role');
                    if($role == "Admin"){
                    @endphp

                    <h3 class="menu-title" style="padding-top: 200px;">Setting</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-gears"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="{{route('user.index')}}">List Users</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="{{route('user.trash')}}">Unactived Users</a></li>
                        </ul>
                    </li>
                    @php
                    }
                    @endphp


                </ul>

            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">

                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>


                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/people.png') }}" alt="User Avatar">
                        </a>
                        @php
                        $nama = Session::get('user_pengguna');
                        @endphp
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><i class="fa fa-user"></i> Welcome, @php echo($nama) @endphp</h1>
                            </div>
                        </div>

                        <div class="user-menu dropdown-menu">
                            @php
                            $id = Session::get('id');
                            {

                            @endphp
                            <a class="nav-link" data-toggle="modal" href="#modalPass{{$id}}"><i class="fa fa -cog"></i>Ubah Password</a>
                            @php
                            }
                            @endphp
                            <a id="btn-submit" class="nav-link" href="/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>
        <div class="modal fade " id="modalPass{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modalPass" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header clearfix ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5 class="p-b-5"><span class="semi-bold">Ubah Password</span></h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('UserController@updatePassword',$id)}}" method="POST">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col">
                                    <div class="form-group" hidden>
                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                        <input class="form-control" name="id" value="{{$id}}">
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Password Baru</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <!-- <small class="form-text text-muted">ex. 42321</small> -->
                                    </div>
                                </div>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                        <button type="submit" class="btn btn-sm btn-info">Ubah Password</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

                    </div>
                    </form>
                </div>
                <!-- </div> -->


            </div>
        </div>

        @yield('konten')

    </div>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/widgets.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();

            setTimeout(function() {
                $("div.alert").remove();
            }, 2000);

        });
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Data yang anda cari tidak ditemukan",
                width: "100%"
            });
        });
        var konten = document.getElementById("konten");
        CKEDITOR.replace(konten, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
</body>

</html>