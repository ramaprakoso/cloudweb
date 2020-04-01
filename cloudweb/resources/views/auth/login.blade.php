<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="keywords" content="tracker">
        <meta name="author" content="Anonim">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config("app.name", "Sharing Session Schedule") }}</title>
        
        <link rel="apple-touch-icon" href="{{url('assets/images/ico/apple-icon-120.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/images/ico/logo.png')}}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/css/forms/icheck/icheck.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/css/forms/icheck/custom.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/components.css' )}}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/core/colors/palette-gradient.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/pages/login-register.css') }}">

        <style>
            body {
                background: url({{url('assets/images/backgrounds/bg-14.jpg')}});
                background-repeat: no-repeat;
                background-size: cover;
            }

            .brand-logo {
                height: 50px;
            }

            .brand-text {
                font-size: 28px;
                display: inline;
                padding-left: 6px;
                font-weight: 500;
                vertical-align: middle;
            }
        </style>

    </head>

    <body class="vertical-layout vertical-overlay-menu 1-column   blank-page" data-open="click" data-menu="vertical-overlay-menu" data-col="1-column">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row mb-1">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 m-0">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form method="POST" action="{{route('login')}}">
                                                @csrf
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                                    <div class="form-control-position">
                                                        <i class="la la-key"></i>
                                                    </div>
                                                </fieldset>
                                                <button type="submit" class="btn btn-info btn-block"><i class="ft-unlock"></i> Password default aja</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script src="{{ url('assets/vendors/js/vendors.min.js') }}"></script>
        <script src="{{ url('assets/vendors/js/forms/icheck/icheck.min.js') }}"></script>
        <script src="{{ url('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
        <script src="{{ url('assets/js/core/app-menu.js') }}"></script>
        <script src="{{ url('assets/js/core/app.js') }}"></script>
        <script src="{{ url('assets/js/scripts/forms/form-login-register.js') }}"></script>
    </body>
</html>
