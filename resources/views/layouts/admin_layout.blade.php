<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Аренда авто</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset('assets/css/main.css')}}?v=11>
    <link rel="stylesheet" href={{asset('assets/css/contents.css')}}?v=1>
    <link rel="stylesheet" href={{asset('assets/css/bootstrap-table.css')}}?v=1>

    <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="    margin-left: 0px;">

{{--<div class="page">--}}
{{--    <header>--}}
{{--        @yield('header')--}}

{{--        @if(count($errors)>0)--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach($errors->all() as $error)--}}
{{--                        <li>{{$error}}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        @if(session('status'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ sesion('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--    </header>--}}
{{--    @yield('content')--}}
{{--    @yield('footer')--}}

{{--</div>--}}


<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>    <div class="app-header__content">
            <div class="app-header-left">
            </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                        <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    {{Auth::user()['name']}}
                                </div>
                                <div class="widget-subheading">
                                    {{Auth::user()['email']}}
                                </div>
                            </div>
                            <div class="widget-content-right header-user-info ml-3">
                                <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                    <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>        </div>
        </div>
    </div>

    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <div class="app-main">
        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>    <div class="scrollbar-sidebar ps ps--active-y">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu metismenu">
                        <li class="app-sidebar__heading">Данные</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Справочники
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul class="mm-collapse">
                                <li>
                                    <a href="{{route('auto_all')}}">
                                        <i class="metismenu-icon"></i>
                                        Автомобили
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-dropdowns.html">
                                        <i class="metismenu-icon">
                                        </i>Класс автомобиля
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px; height: 234px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 80px;"></div></div></div>
        </div>
        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="app-main__outer">
            <div class="app-main__inner" style="padding-top: 0px;">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                </i>
                            </div>
                            <div>Администрирование
                                @yield('title')
                            </div>
                        </div>
                        <!-- ------------------------------------------------>
{{--                        <div class="page-title-actions">--}}
{{--                            <div class="panel-body">--}}
{{--                                @if (session('status'))--}}
{{--                                    <div class="alert alert-success">--}}
{{--                                        {{ session('status') }}--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                    @if ($errors->any())--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            <ul>--}}
{{--                                                @foreach ($errors->all() as $error)--}}
{{--                                                    <li>{{ $error }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- ------------------------------------------------>



                    </div>
                </div>


                @if (session('status'))
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                            <div class="widget-content-wrapper text-white">
                                {{ session('status') }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if ($errors->any())
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')


            </div>


            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        <div class="app-footer-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Footer Link 1
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Footer Link 2
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="app-footer-right">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Footer Link 3
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <div class="badge badge-success mr-1 ml-0">
                                            <small>NEW</small>
                                        </div>
                                        Footer Link 4
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    </div>



</div>

<!--++++++++++++++++++++++++++++++++++++++++++-->
<script type="text/javascript" src={{asset('assets/js/jquery-2.2.4.min.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/main.js')}}></script>
<script type="text/javascript" src={{asset('assets/js/config.js')}}></script>

<!--++++++++++++++++++++++++++++++++++++++++++-->
@yield('js')
</body>
</html>

@yield('modal')
