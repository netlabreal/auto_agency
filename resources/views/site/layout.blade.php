<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href={{asset('assets/css/m.css')}}?v=1>
    <link rel="stylesheet" href={{asset('assets/css/media.css')}}?v=2>
    <link rel="stylesheet" href={{asset('assets/css/owl.carousel.min.css')}}>
    <link rel="stylesheet" href={{asset('assets/css/owl.theme.default.min.css')}}>
    <link rel="stylesheet" href={{asset('assets/css/bootstrap-slider.css')}}>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.">
    <meta name="keywords" content="Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.">
    @yield('meta')

</head>
<body>

<div class="page">
    @include('site.header')
    @yield('content')
    @include('site.footer')

</div>
<!--++++++++++++++++++++++++++++++++++++++++++-->
<script type="text/javascript" src={{asset('assets/js/jquery-2.2.4.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/bootstrap.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/owl.carousel.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/bootstrap-slider.js')}}></script>


<script type="text/javascript" src={{asset('assets/js/moment-with-locales.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/bootstrap-datetimepicker.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/sweetalert2.all.min.js')}}></script>
<!--++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 60) {
            $('.navbar').addClass('navbar-fixed-top');
            $(".navbar").css("box-shadow", "0 5px 10px 0px rgba(20, 20, 28, 0.3)");
            //$("#bs-example-navbar-collapse-1").css("background", "rgb(35, 36, 38)");
            $('#toTop').fadeIn();
        }
        if ($(this).scrollTop() < 60) {
            $('.navbar').removeClass('navbar-fixed-top')
            $(".navbar").css("box-shadow", "");

            $('#toTop').fadeOut();

        }
    });

    $(document).ready(function() {
        $(".navbar-toggle").click(function () {
            if ($("#t-button").hasClass("zmdi-view-toc")) {
                $("#t-button").removeClass("zmdi-view-toc");
                $("#t-button").addClass("zmdi-close-circle-o");
            }
            else {
                $("#t-button").removeClass("zmdi-close-circle-o");
                $("#t-button").addClass("zmdi-view-toc");
            }
        });
    });
</script>
@yield('js')
</body>
</html>