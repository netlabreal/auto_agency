<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Аренда авто</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href={{asset('assets/css/m.css')}}?v=11131>
    <link rel="stylesheet" href={{asset('assets/css/media.css')}}>

    <link rel="stylesheet" href={{asset('assets/css/bootstrap-table.css')}}>
    <link rel="stylesheet" href={{asset('assets/css/bootstrap-slider.css')}}>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

<div class="page">
    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}
    <section header>
        <!--PRELOADER-->
        <div class="page-loader loaded" style="display: none;">
            <div class="brand-name"><img src="{{asset('assets/img/logo-default.png')}}" alt="" width="177" height="41">
            </div>
            <div class="page-loader-body">
                <div class="cssload-jumping"><span></span><span></span><span></span><span></span><span></span></div>
            </div>
        </div>

        <!-- MENU -->
        <header>
            <nav class="navbar" style="height: 60px!important; margin-bottom: 0px!important;background-color:white; ">
                <div class="container" style="transition: all 0.9s; padding-top: 5px;">
                    <!-- Brand и toggle сгруппированы для лучшего отображения на мобильных дисплеях -->
                    <div class="navbar-header " style="width: 100%">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <i class="zmdi zmdi-view-toc " id="t-button" style="font-size: 46px; color: black;"></i>
                        </button>

                        <div id="logo_out" style="display: block;">
                            <a href="/" class="standard-logo">
                                <img class="img-responsive media-logo" src="{{asset('assets/img/logo-default.png')}}" style="padding-left: 25px;padding-top: 5px;">
                            </a>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="width: 100%">
                            <div class="rd-navbar-nav-wrap left-nav1" style="font-weight: bold;">
                                <ul class="nav navbar-nav navbar-left" style="margin-right: 140;">
                                    <li><a class="lab-nav-link active" href="{{route('auto_all')}}">Автомобили</a></li>
                                    <li><a class="lab-nav-link active" href="{{route('dop_uslugy')}}">Доп</a></li>
                                    <li><a class="lab-nav-link active" href="{{route('news')}}">Новости</a></li>


                                </ul>
                            </div>

                            <div class="rd-navbar-nav-wrap toggle-original-elements">
                                <div id="logo_in" style="display: block;">
                                    <a href="/" class="standard-logo"><img class="img-responsive media-logo" src="{{asset('assets/img/logo-default.png')}}" style="padding-left: 25px;padding-top: 5px;"></a>
                                </div>
                            </div>


                            <div class="rd-navbar-nav-wrap-right">
                                <ul class="nav navbar-nav">


                                </ul>
                            </div>

                        </div>

                    </div>

                </div>
            </nav>

        </header>
    </section>
    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}


    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}
    <section content style="min-height: 800px; margin-top: 25px;    margin-bottom: 25px;">
        <div class="container" >
            <div class="row row-20" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);">

                @yield('content')


            </div>
        </div>


    </section>
    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}


    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}
    <section class="footer" style="min-height: 30px!important;">
        <div class="container">
            <hr>
        </div>

        <div class="footer-advanced-aside">
            <div class="container">
                <span style="float: left">©&nbsp;</span>
                <span style="float: left; padding-right: 3px;" class="copyright-year">{{ date('Y') }} </span><span>&nbsp;</span>

                <span style="float: left"> Все права защищены.</span><span>&nbsp;</span>
                <span style="float: right"><a href="http://designedbylab.ru">Разработано designedbylab.ru</a></span>
            </div>
        </div>
    </section>
    {{--    +++++++++++++++++++++++++++++++++++++++++++++++--}}

</div>
<!--++++++++++++++++++++++++++++++++++++++++++-->
<script type="text/javascript" src={{asset('assets/js/jquery-2.2.4.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/bootstrap.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/owl.carousel.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/bootstrap-table.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/sweetalert2.all.min.js')}}></script>
<!--++++++++++++++++++++++++++++++++++++++++++-->
<script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 60) {
            $('.navbar').addClass('navbar-fixed-top');
            $(".navbar").css("box-shadow", "0 5px 10px 0px rgba(20, 20, 28, 0.3)");
            $('#toTop').fadeIn();

        }
        if ($(this).scrollTop() < 60) {
            $('.navbar').removeClass('navbar-fixed-top')
            $(".navbar").css("box-shadow", "");

            $('#toTop').fadeOut();
        }
    });


</script>
@yield('js')
</body>
</html>
