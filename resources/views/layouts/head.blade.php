<!doctype html>
<html lang="en">
<head>
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

    @if(Route::currentRouteName() == 'addchapter' || Route::currentRouteName() == 'editbook')
        <script src="{{asset('packages/sleepingowl/ckeditor/ckeditor.js')}}" type="text/javascript" charset="utf-8"></script>
    @endif

    <title>Bookstoria.net | @if(isset($title) && !empty($title)) {{$title}} @else Читайте с нами! @endif</title>
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
</head>