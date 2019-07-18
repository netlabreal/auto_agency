@extends('site.layout')
@section('meta')
    <title>Прокат и аренда автомобилей в г.Находка. Бизнес Партнер.</title>
@endsection

@section('section_menu')
    @if (@isset($menu))
        @foreach($menu as $k=>$item)
            @if($k==2)
                <li class=""><a class="lab-nav-link active" href="/{{$item['alias']}}">{{$item['title']}}</a></li>
            @else
                <li><a class="lab-nav-link" href="/{{$item['alias']}}">{{$item['title']}}</a></li>
            @endif
        @endforeach
    @endif
@endsection



@section('carusel')
    <div class="owl-carousel owl-theme owl-loaded owl-drag">
        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1529px;"><div class="owl-item active" style="width: 1519px; margin-right: 10px;"><div class="container">
                        <div class="container">
                            <div class="jumbotron-classic-content" style="padding-top: 27px;">
                                <div class="wow-outer" style="color: white;">
                                    <div class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">условия</div>
                                </div>

                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="/">Главная</a></li>
                                    <li><i class="zmdi zmdi-chevron-right"></i></li>
                                    <li class="active">Условия аренды</li>
                                </ul>

                            </div>
                        </div>
                    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
@endsection





@section('content')
    <section class="about_us">
        <!-- ABOUT US -->
        <div class="container">
            <div class="box-form-title">
                <div class="box-form-decor-wrap">

                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 rdopp">
                <div>
                    <p>
                        Компания «Бизнес — Партнер» предлагает услугу — аренда автомобилей в Находке частным лицам и организациям. Вы можете обратиться в пункт проката и арендовать для себя определенный автомобиль, исходя, из собственных предпочтений. Для заказа услуги необходимо связаться с нами, оформить договор аренды, а также внести плату за прокат автомобиля.
                    </p>
                </div>
            </div>


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 rrr">

                <div><i class="zmdi zmdi-car" style="color: #78abf1;"><span>Минимальный возраст заказчика - 22 года</span></i></div>
                <div><i class="zmdi zmdi-car" style="color: #78abf1;"><span>Прописка в любом городе и стране</span></i></div>
                <div><i class="zmdi zmdi-car" style="color: #78abf1;"><span>Стаж вождения — не менее 3 лет</span></i></div>
                <div><i class="zmdi zmdi-car" style="color: #78abf1;"><span>Ограничение суточного пробега по стандартному тарифу — 400 км. При превышении лимита доплата составляет от 5-х рублей за каждый километр пробега</span></i></div>
                <div><i class="zmdi zmdi-car" style="color: #78abf1;"><span>Автомобиль выдается и возвращается с полным баком бензина</span></i></div>
                <div><i class="zmdi zmdi-car" style="color: #78abf1;"><span>Клиент получает и возвращает автомобиль в чистом виде, либо доплачивает за мойку</span></i></div>
            </div>

        </div>




    </section>


@endsection
