<html lang="en">

<!-- Mirrored from adminbsb-sensitive.firebaseapp.com/pages/examples/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Apr 2019 09:20:45 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT. Sinar Sanata</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ url('resource/adminbsb/admin_bsb/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" />

    <!-- Bootstrap Core Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/bootstrap/dist/css/bootstrap.css') }}"
        rel="stylesheet" />

    <!-- Font Awesome Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet" />

    <!-- iCheck Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/plugins/iCheck/skins/square/_all.css') }}"
        rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ url('resource/adminbsb/admin_bsb/assets/css/style.css') }}" rel="stylesheet" />
</head>

<body class="sign-in-page">
    <div class="signin-form-area">
        <h1>PT. Sinar-Sanata</h1>
        <div class=" signin-top-info">Sign in to start your session</div>
        <div class="row padding-15">
            <div class="col-sm-2 col-md-2 col-lg-4"></div>
            <div class="col-sm-8 col-md-8 col-lg-4">
                <form id="frmSignin" method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus required />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="Password"
                            required class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" />
                        @error('password')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck m-l--20" {{ old('remember') ? 'checked' : '' }}>
                                <label><input type="checkbox" for="remember"> {{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit"
                                class="btn btn-success btn-block btn-flat">{{ __('Login') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-4"></div>
        </div>
    </div>
    <div class="signin-right-image">
        <div class="background-layer"></div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/bootstrap/dist/js/bootstrap.js') }}"></script>

    <!-- iCheck Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/iCheck/icheck.js') }}"></script>

    <!-- Jquery Validation Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/plugins/jquery-validation/dist/jquery.validate.js') }}">
    </script>

    <!-- Custom Js -->
    <script src="{{ url('resource/adminbsb/admin_bsb/assets/js/pages/examples/signin.js') }}"></script>

</body>

<!-- Mirrored from adminbsb-sensitive.firebaseapp.com/pages/examples/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Apr 2019 09:20:46 GMT -->

</html>
