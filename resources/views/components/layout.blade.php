<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Start Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="AsaanCredit – Connecting entrepreneurs with investors. Explore funding opportunities, track projects, and grow your business" />
    <meta name="keywords" content="investor, entrepreneur, funding, projects, business" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of Site -->
    <title>Asaan Credit</title>
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.ico')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- font awesome -->
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <!-- Swiper -->
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
    <!-- Magnific -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- Mean menu -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/sass/style.css')}}">

    <style>
        .header__two-top-bar {
            background: #122F47;
            padding: 7px 0;
        }
        .header__two-menu-bar-right .theme-btn3 {
            font-size: 14px;
            line-height: 34px;
            padding: 0 10px;
        }
        .btn5 {
            background: rgb(18, 47, 71);
            border-radius: 3px;
        }
        .page__banner-content ul li {
            color: #BA182C;
        }
    </style>
</head>
<body>
    <x-header/>

    {{$slot}}

    <x-footer/>

    <x-script/>
</body>
</html>
