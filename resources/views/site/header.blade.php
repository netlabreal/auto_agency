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
    <header class="{{(Request::is('/')?'page-header up-section':'up-section-about')}}">
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

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="rd-navbar-nav-wrap left-nav">
                            <ul class="nav navbar-nav navbar-left" style="margin-right: 140;">
                                @yield('section_menu')

                            </ul>
                        </div>

                        <div class="rd-navbar-nav-wrap toggle-original-elements">
                            <div id="logo_in" style="display: block;">
                                <a href="/" class="standard-logo"><img class="img-responsive media-logo" src="{{asset('assets/img/logo-default.png')}}" style="padding-left: 25px;padding-top: 5px;"></a>
                            </div>
                        </div>


                        <div class="rd-navbar-nav-wrap-right">
                            <ul class="nav navbar-nav">
                                <li style="padding-top: 12px; font-family: txt1; font-size: 20px; color: darkblue;">
                                    <i class="zmdi zmdi-phone" style="padding-right: 5px;color: #78abf1;"></i>
                                    <div class="he-text" style="float:right;color: #78abf1;">
                                        <span>(4236)79-80-80</span>
                                    </div>
                                </li>

                                <li style="padding-top: 5px; font-family: txt1">
                                    <button type="button" class="btn button-black" id="up_button" onclick='location.href="/zakaz"'>Заказать авто</button>


                                </li>

                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </nav>

        <!-- ++++++++++++++++++++++++++++++++++ -->
        @yield('carusel')
        <!-- ++++++++++++++++++++++++++++++++++ -->


    </header>



</section>
