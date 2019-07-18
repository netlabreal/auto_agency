@extends('site.layout')
@section('meta')
    <title>Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.</title>
@endsection

@section('section_menu')
    @if (@isset($menu))
        @foreach($menu as $k=>$item)
                <li><a class="lab-nav-link" href="/{{$item['alias']}}">{{$item['title']}}</a></li>
        @endforeach
    @endif
@endsection



@section('carusel')
    <div class="owl-carousel owl-theme owl-loaded owl-drag">
        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1529px;"><div class="owl-item active" style="width: 1519px; margin-right: 10px;"><div class="container">
                        <div class="container">
                            <div class="jumbotron-classic-content" style="padding-top: 27px;">
                                <div class="wow-outer" style="color: white;">
                                    <div class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">новости</div>
                                </div>

                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="/">Главная</a></li>
                                    <li><i class="zmdi zmdi-chevron-right"></i></li>
                                    <li class="active">Новости</li>
                                </ul>




                            </div>
                        </div>
                    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
@endsection





@section('content')
    <div class="row-20" style="min-height: 400px;">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <span class="r_span" id="prokat">{{$n->name}}</span>
                <p style="font-family: txt5;font-size: 20px;">
                    <img class="thumbnail-ruby" src="http://192.168.228.135/assets/img/arend-real.jpg" alt="" width="300" height="300" style="float: left; margin: 0 17px 17px 0;">
                    {{$n->opisanie}}
                </p>

            </div>
        </div>
    </div>
@endsection
