<!doctype html>
<html lang="en">
<head>

    <title>Bookstorya.com | @if(isset($title) && !empty($title)) {{$title}} @else Читайте с нами! @endif</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120375146-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120375146-2');
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-grid.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-reboot.css')}}"/>
    <!-- Custom style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}"/>
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gabriela" rel="stylesheet">
    <!-- карусель -->
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{asset('slick/slick.js')}}" type="text/javascript" charset="utf-8"></script>

    @if(Route::currentRouteName() == 'addchapter' || Route::currentRouteName() == 'editbook' || Route::currentRouteName() == 'home' || Route::currentRouteName() == 'edittbook')
        <script src="{{asset('packages/sleepingowl/ckeditor/ckeditor.js')}}" type="text/javascript" charset="utf-8"></script>
    @endif

    <style type="text/css">
        html, body {
            margin: 0;
            padding: 0;
        }

        *{
            box-sizing: border-box;
        }

        .slick-slider {
            width: 90%;
            margin: 0px auto;
        }
        @media (max-width: 1000px) {
            .slick-slider {
                width: 80%;
                margin: 0px auto;
            }
        }

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }


        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
        }

        .slick-active {
            opacity: 1;
        }

        .slick-current {
            opacity: 1;
        }
    </style>
    <script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?156",t.onload=function(){VK.Retargeting.Init("VK-RTRG-257112-dvjXT"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-257112-dvjXT" style="position:fixed; left:-999px;" alt=""/></noscript>

    {{--<script type="text/javascript" src="{{asset('js/pagination.js?v=1.1')}}"></script>--}}

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>