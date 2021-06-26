<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Halaman Login</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ url('resource/assets/images/we-know-logo.png') }}" type="image/png">

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

    <!--====== BANNER 3 PART START ======-->

    <div class="banner-slide-3">
        <div class="banner-3-area bg_cover d-flex align-items-center"
            style="background-image: url(resource/assets/images/banner-base.png);">
            <div class="banner-line">
                <img src="{{ url('resource/assets/images/banner-line.png') }}" alt="line">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="margin-left:auto;margin-right:auto;">
                        <form action="{{ route('userLogin') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">

                                    @if (session('Status'))
                                        <div class="alert alert-success">
                                            {{ session('Status') }}
                                        </div>
                                    @endif
                                    <p style="text-align:center">
                                        Silahkan Login
                                    </p>
                                    <br>
                                    <p>Username : </p>
                                    <input type="text" class="form-control" name="username">
                                    @if (session('login') === false)
                                        <small class="text-danger">Username / Password Salah</small>
                                    @endif
                                    <small class="text-danger">{{ $errors->first('username') }}</small>
                                    <p style="margin-top:10px">Password : </p>
                                    <input type="password" class="form-control" name="password">
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                    <div style="margin-top:15px">
                                        <button type="submit" style="width: 100%"
                                            class="btn btn-sm btn-info">Login</button>
                                        <a href="{{ route('customer.create') }}"
                                            style="color:red;margin-top:15px;font-size:14px">
                                            Belum punya akun?
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="banner-dot">
                <img src="{{ url('resource/assets/images/banner-dot.png') }}" alt="line">
            </div>
        </div>
    </div>

    <!--====== BANNER 3 PART ENDS ======-->


    <!--====== jquery js ======-->
    <script src="{{ url('resource/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ url('resource/assets/js/vendor/jquery-3.5.0.js') }}"></script>

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


</body>

</html>
