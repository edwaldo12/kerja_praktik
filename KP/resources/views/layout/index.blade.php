<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from adminbsb-sensitive.firebaseapp.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Apr 2019 09:17:01 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/bootstrap/dist/css/bootstrap.css') }}"
        rel="stylesheet" />

    <!-- Animate.css Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Font Awesome Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet" />

    <!-- iCheck Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/iCheck/skins/flat/_all.css') }}"
        rel="stylesheet" />

    <!-- Switchery Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/switchery/dist/switchery.css') }}"
        rel="stylesheet" />

    <!-- Metis Menu Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/metisMenu/dist/metisMenu.css') }}"
        rel="stylesheet" />

    <!-- Jquery Datatables Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/media/css/dataTables.bootstrap.css') }}"
        rel="stylesheet" />

    <!-- Morris.js Chart Css -->
    {{-- <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/morris.js/morris.css') }}" rel="stylesheet" /> --}}

    <!-- C3 Chart Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/c3/c3.css') }}" rel="stylesheet" />

    <!-- Pace Loader Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/pace/themes/white/pace-theme-flash.css') }}"
        rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/css/style.css') }}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/css/themes/allthemes.css') }}" rel="stylesheet" />

    <!-- Demo Purpose Only -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/css/demo/setting-box.css') }}" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/jquery/dist/jquery.min.js') }}"
        type="text/javascript"></script>
</head>

<body>
    <div class="all-content-wrapper">
        <!-- Top Bar -->
        <header>
            <nav class="navbar navbar-default">
                <!-- Search Bar -->
                <div class="search-bar">
                    <div class="search-icon">
                        <i class="material-icons">search</i>
                    </div>
                    <input type="text" placeholder="Start typing...">
                    <div class="close-search js-close-search">
                        <i class="material-icons">close</i>
                    </div>
                </div>
                <!-- #END# Search Bar -->

                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="material-icons">swap_vert</i>
                        </button>
                        <a href="javascript:void(0);" class="left-toggle-left-sidebar js-left-toggle-left-sidebar">
                            <i class="material-icons">menu</i>
                        </a>
                        <!-- Logo -->
                        <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                            <span class="logo-minimized">AS</span>
                            <span class="logo">Admin Sidebar</span>
                        </a>
                        <!-- #END# Logo -->
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="javascript:void(0);" class="toggle-left-sidebar js-toggle-left-sidebar">
                                    <i class="material-icons">menu</i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown notification-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="label-count"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Stok Tersisa</li>
                                    <li class="">
                                        <ul class="menu" id="stockBarang">

                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="{{ url('/products') }}">View All Stocks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Menu -->
                            <li class="dropdown user-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ url('resource/adminbsb/admin_bsb/assets/images/avatars/face2.jpg') }}"
                                        alt="User Avatar" />
                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">
                                        <img src="{{ url('resource/adminbsb/admin_bsb/assets/images/avatars/face2.jpg') }}"
                                            alt="User Avatar" />
                                        <div class="user">
                                            {{ Auth::user()->name }}
                                            <div class="title">Admin Sinar Sanata</div>
                                        </div>
                                    </li>
                                    <li class="footer">
                                        <div class="row clearfix">
                                            <div class="col-xs-12">
                                                <form action="{{ url('/logout') }}">
                                                    @csrf
                                                    <button class="btn btn-default btn-sm btn-block">Log Out</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- #END# User Menu -->
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- #END# Top Bar -->
        <!-- Left Menu -->
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <li class="title">
                        MAIN NAVIGATION
                    </li>
                    <li>
                        <a href="{{ route('dashboard.index') }}">
                            <i class="material-icons">layers</i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="material-icons">layers</i>
                            <span class="nav-label">Pengguna</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customers.index') }}">
                            <i class="material-icons">layers</i>
                            <span class="nav-label">Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}">
                            <i class="material-icons">layers</i>
                            <span class="nav-label">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agendas.index') }}">
                            <i class="material-icons">layers</i>
                            <span class="nav-label">Agenda</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orders.index') }}">
                            <i class="material-icons">layers</i>
                            <span class="nav-label">Pemesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reviews.index') }}">
                            <i class="material-icons">layers</i>
                            <span class="nav-label">Review</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- #END# Left Menu -->

        @yield('content')

    </div>

    <!-- JQuery UI Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/jquery-ui/jquery-ui.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}">
    </script>

    <!-- Pace Loader Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/pace/pace.js') }}"></script>

    <!-- Metis Menu Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/metisMenu/dist/metisMenu.js') }}"></script>

    <!-- Jquery Slimscroll Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}">
    </script>

    <!-- Switchery Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/switchery/dist/switchery.js') }}"></script>

    <!-- iCheck Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/iCheck/icheck.js') }}"></script>

    <!-- Jquery Sparkline Js -->
    <script src=" {{ url('resource/adminbsb/admin_bsb/assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}">
    </script>

    <!-- Morris Chart Js -->

    {{-- <script
        src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/raphael/raphael.js') }}"></script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/morris.js/morris.js') }}"></script> --}}

    <!-- JQuery Datatables Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/media/js/jquery.dataTables.js') }}">
    </script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/media/js/dataTables.bootstrap.js') }}">
    </script>
    <script
        src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/extensions/export/dataTables.buttons.min.js') }}">
    </script>
    <script
        src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/extensions/export/buttons.bootstrap.min.js') }}">
    </script>
    <script
        src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/extensions/export/buttons.flash.min.js') }}">
    </script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/extensions/export/jszip.min.js') }}">
    </script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/extensions/export/pdfmake.min.js') }}">
    </script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/extensions/export/vfs_fonts.js') }}">
    </script>
    <script
        src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/extensions/export/buttons.html5.min.js') }}">
    </script>
    <script
        src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/DataTables/extensions/export/buttons.print.min.js') }}">
    </script>

    <!-- Peity Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/peity/jquery.peity.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/js/admin.js') }}"></script>
    <!-- <script src="{{ url('resource/adminbsb/admin_bsb/assets/js/pages/dashboard/dashboard.js') }}"></script> -->

    <!-- Google Analytics Code -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/js/google-analytics.js') }}"></script>

    <!-- Demo Purpose Only -->
    <!-- <script src="{{ url('resource/adminbsb/admin_bsb/assets/js/demo.js') }}"></script> -->

    <!-- Flot Chart Js -->
    {{-- <script
        src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/flot/jquery.flot.time.js') }}"></script> --}}

    <!-- C3 Chart & D3 Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/d3/d3.js') }}"></script>
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/c3/c3.js') }}"></script>

    <script>
        $(function() {
            $("#data_table").DataTable({
                responsive: true,
                dom: '<"html5buttons"B>lTfgtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });

            $.ajax({
                type: "GET",
                url: "{{ url('getAllProduct') }}",
                success: function(result) {
                    let str = "";
                    for (i = 0; i < result.length; i++) {
                        str += "<li>" +
                            "<a>" +
                            "<div class='menu-info'>" +
                            "<b style='line-height:none'>" +
                            result[i].nama_produk + " :" + result[i].stocks +
                            "</b>" +
                            "</div>" +
                            "</a>" +
                            "</li>";
                    }
                    $('#stockBarang').html(str);
                }
            })
        });

        function formatRupiah(angka) {
            var number_string = angka.replace(/[^,\d]/g, '').toString();
            split = number_string.split(',');
            sisa = split[0].length % 3;
            rupiah = split[0].substr(0, sisa);
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return "Rp. " + rupiah;
        }
    </script>

    @stack('omset_penjualan')

    {{-- @stack('grafik') --}}



</body>
<!-- Mirrored from adminbsb-sensitive.firebaseapp.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Apr 2019 09:18:12 GMT -->

</html>
