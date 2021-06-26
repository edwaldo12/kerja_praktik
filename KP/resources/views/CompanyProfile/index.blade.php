<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>PT.Sinar Sanata Electronic-Industry</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ url('resource/asset/assets/images/we-know-logo.png') }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ url('resource/assets/css/bootstrap.min.css') }}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ url('resource/assets/css/font-awesome.min.css') }}">

    <!--====== flaticon css ======-->
    <link rel="stylesheet" href="{{ url('resource/assets/css/flaticon.css') }}">

    <!--====== nice select css ======-->
    <link rel="stylesheet" href="{{ url('resource/assets/css/nice-select.css') }}">

    <!--====== animate css ======-->
    <link rel="stylesheet" href="{{ url('resource/assets/css/animate.min.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ url('resource/assets/css/magnific-popup.css') }}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ url('resource/assets/css/slick.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ url('resource/assets/css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ url('resource/assets/css/style.css') }}">

    <script src="{{ url('resource/assets/js/vendor/jquery-3.5.0.js') }}"></script>

</head>

<body>

    <!-- PRELOADER -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- END PRELOADER -->

    <!--====== HEADER PART START ======-->
    <header class="header-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-top">
                            <ul>
                                <li><a href="tel:+62711357111"><i class="flaticon-phone-call"></i> +62
                                        711-357-111</a>
                                </li>
                                <li><a href="#"><i class="flaticon-placeholder"></i> Jln. Padang Selasa No 111</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-header-item d-flex justify-content-between align-items-center">
                            <div class="main-header-menus  d-flex">
                                <div class="header-logo">
                                    <img src="{{ url('foto_company_profile/lampu.jpg') }}" alt="logo">
                                </div>
                                <div class="header-menu d-lg-block">
                                    <ul>
                                        <li>
                                            <a class="" href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about') }}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('product') }}">Product</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('agenda') }}">Our Agenda</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('contact') }}">Contact Us</a>
                                        </li>
                                        @if (empty(session('customer')))
                                            <li>
                                                <a href="{{ route('login.customers') }}">Login</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('get.cart') }}">Cart</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customerLogout') }}">Logout</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.edit') }}">Edit Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.history') }}">History Pemesanan</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--====== HEADER PART ENDS ======-->

    @yield('content')


    <!--====== FOOTER PART START ======-->
    <section class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="footer-about mt-30">
                        <p>
                            PT.Sinar Sanata adalah perusahaan bola lampu terbaik di sumatera selatan
                        </p>
                        <ul>
                            <li><a href="tel:+62711357111">+62 711-357-111</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-list mt-30">
                        <h4 class="title">Company</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('product') }}">Product</a></li>
                            <li><a href="{{ route('agenda') }}">Agenda</a></li>
                            <li><a href="{{ route('contact') }}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-address mt-30">
                        <h3 class="title">Address</h3>
                        <p>Jalan Padang Selasa No.111</p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.381783911697!2d104.72956981529784!3d-2.9913797407077003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75f47f39d907%3A0x2431fd0a722ac7c1!2sJl.%20Padang%20Selasa%20No.111%2C%20Bukit%20Lama%2C%20Kec.%20Ilir%20Bar.%20I%2C%20Kota%20Palembang%2C%20Sumatera%20Selatan%2030134!5e0!3m2!1sen!2sid!4v1607194315060!5m2!1sen!2sid"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                        <span><i class="fa fa-map-marker"></i> Find us on Map</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copyright d-block d-md-flex justify-content-between align-items-center">
                            <p>© Copyright 2020 by Layerdrops.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-pattern">
            <img src="resource/assets/images/footer-pattern.png" alt="" />
        </div>
        <div class="footer-logo">
            <img src="resource/assets/images/footer-logo.png" alt="" />
        </div>
    </section>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== GO TO TOP PART START ======-->

    <div class="go-top-area">
        <div class="go-top-wrap">
            <div class="go-top-btn-wrap">
                <div class="go-top go-top-btn">
                    <i class="fa fa-angle-double-up"></i>
                    <i class="fa fa-angle-double-up"></i>
                </div>
            </div>
        </div>
    </div>

    <!--====== GO TO TOP PART ENDS ======-->

    <!--====== jquery js ======-->
    <script src="{{ url('resource/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ url('resource/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('resource/assets/js/popper.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ url('resource/assets/js/slick.min.js') }}"></script>

    <!--====== odometer js ======-->
    <script src="{{ url('resource/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('resource/assets/js/jquery.waypoints.min.js') }}"></script>

    <!--====== wow js ======-->
    <script src="{{ url('resource/assets/js/wow.js') }}"></script>

    <!--====== nice select js ======-->
    <script src="{{ url('resource/assets/js/jquery.nice-select.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ url('resource/assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ url('resource/assets/js/main.js') }}"></script>


    <script>
        function formatRupiah(total) {
            var number_string = total.replace(/[^,\d]/g, '').toString();
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
    @stack('scripts')


</body>


</html>
